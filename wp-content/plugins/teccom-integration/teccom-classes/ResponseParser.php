<?php

class ResponseParser {
    public static function parse( string $soapResponse, $serializer ) {
        $soapXml = simplexml_load_string( $soapResponse );
        $soapXml->registerXPathNamespace( 'soap', 'http://schemas.xmlsoap.org/soap/envelope/' );
        $soapXml->registerXPathNamespace( 'w', 'http://www.teccom-eu.net/wsdl' );

        $nodes = $soapXml->xpath( '//soap:Body/w:ProcessRequestResponse/w:ProcessRequestResult' );
        if ( !$nodes || !isset( $nodes[ 0 ] ) ) {
            return 'No ProcessRequestResult found.';
        }
        $innerXml = htmlspecialchars_decode( ( string ) $nodes[ 0 ] );
        $innerXml = preg_replace( '/<\?xml.*?\?>/U', '', $innerXml );

        $fcResponse = $serializer->deserialize( $innerXml, \TecCom\Order\FunctionCallResponse\FunctionCallResponse::class, 'xml' );
        $status = $fcResponse->getStatus();

        if ( !$status || $status->getCode() !== '99' ) {
            $msg = $status ? $status->getValue() : 'Unknown error';
            return "Request failed: $msg";
        }

        return $innerXml;
    }

    public static function extractAvaRsp( string $functionXml ) {
        $functionXml = str_replace(
            'xmlns="teccom.de/TecCom.OpenMessaging.DTO.FunctionCallResponse"',
            'xmlns="http://teccom.de/TecCom.OpenMessaging.DTO.FunctionCallResponse"',
            $functionXml
        );

        $fcrXml = simplexml_load_string( $functionXml );
        $fcrXml->registerXPathNamespace( 'fc', 'http://teccom.de/TecCom.OpenMessaging.DTO.FunctionCallResponse' );

        $paramValueNodes = $fcrXml->xpath( '//fc:OriginatingFunction/fc:ParameterList/fc:ParameterData/fc:ParameterValue' );
        if ( !$paramValueNodes || !isset( $paramValueNodes[ 0 ] ) ) {
            return 'No <ParameterValue> found.';
        }

        $node = $paramValueNodes[ 0 ];
        $dom = new \DOMDocument();
        $dom->loadXML( $node->asXML() );

        $responseDocument = '';
        foreach ( $dom->documentElement->childNodes as $child ) {
            $responseDocument .= $dom->saveXML( $child );
        }

        return trim( preg_replace( [
            '/<\?xml.*?\?>/U',
            '/\sxmlns(:\w+)?="[^"]*"/i',
            '/<(\/?)(xsi:|xsd:)?/'
        ], [ '', '', '<$1' ], htmlspecialchars_decode( $responseDocument ) ) );
    }

    public static function extractOrderResponse( string $functionXml )
    {
        // 1 ) Load entire SOAP response
        $xml = @simplexml_load_string( $functionXml );
        if ( !$xml ) {
            return 'Error: Invalid SOAP response XML.';
        }

        // 2 ) Register default namespace ( FunctionCallResponse has xmlns = 'teccom.de/TecCom.OpenMessaging.DTO.FunctionCallResponse' )
        $nsUri = ( string )$xml->getNamespaces( false )[ '' ] ?? null;
        if ( $nsUri ) {
            $xml->registerXPathNamespace( 'f', $nsUri );
        }

        // 3 ) Find <ParameterValue> under any path, ignoring outer default namespace
        $paramNodes = $xml->xpath( '//*[local-name()="ParameterValue"]' );
        if ( !$paramNodes || !isset( $paramNodes[ 0 ] ) ) {
            return 'Error: <ParameterValue> element not found.';
        }
        $paramValueNode = $paramNodes[ 0 ];

        // 4 ) Convert <ParameterValue> node back to XML ( so we can parse its children )
        $paramXml = $paramValueNode->asXML();
        if ( !$paramXml ) {
            return 'Error: Unable to serialize <ParameterValue> node.';
        }

        // 5 ) Load just the <ParameterValue> XML fragment
        $inner = @simplexml_load_string( $paramXml );
        if ( !$inner ) {
            return 'Error: Invalid <ParameterValue> XML.';
        }

        // 6 ) Find <OrdRsp> anywhere under <ParameterValue> ( OrdRsp has no namespace )
        $ordNodes = $inner->xpath( '//*[local-name()="OrdRsp"]' );
        if ( !$ordNodes || !isset( $ordNodes[ 0 ] ) ) {
            return 'Error: <OrdRsp> element not found.';
        }
        $ordRsp = $ordNodes[ 0 ];

        //
        // ─── Extract the HEAD section ───────────────────────────────────────────────
        //
        $headArr = [
            'document_number'    => null,
            'issue_date'         => null,
            'seller_party'       => [],
            'buyer_party'        => [],
            'additional_parties' => [], // will be an array of qualifiers + address‐blocks
        ];

        // 6.1 ) <Head> node
        $headNodes = $ordRsp->xpath( './*[local-name()="Head"]' );
        if ( $headNodes && isset( $headNodes[ 0 ] ) ) {
            $headNode = $headNodes[ 0 ];

            // 6.1.1 ) DocumentNumber
            $docNoNodes = $headNode->xpath( './*[local-name()="DocumentNumber"]' );
            if ( $docNoNodes && isset( $docNoNodes[ 0 ] ) ) {
                $headArr[ 'document_number' ] = ( string )$docNoNodes[ 0 ];
            }

            // 6.1.2 ) IssueDate
            $issueDateNodes = $headNode->xpath( './*[local-name()="IssueDate"]' );
            if ( $issueDateNodes && isset( $issueDateNodes[ 0 ] ) ) {
                $headArr[ 'issue_date' ] = ( string )$issueDateNodes[ 0 ];
            }

            //
            // 6.1.3 ) SellerParty → we’ll grab Number + Address sub‐fields if present
            //
            $sellerArr = [
                'number'  => null,
                'address' => [], // street/city/postalcode/country/etc.
            ];
            $sellerNodes = $headNode->xpath( './*[local-name()="SellerParty"]' );
            if ( $sellerNodes && isset( $sellerNodes[ 0 ] ) ) {
                $sp = $sellerNodes[ 0 ];

                // SellerParty/Number
                $numNodes = $sp->xpath( './*[local-name()="Number"]' );
                if ( $numNodes && isset( $numNodes[ 0 ] ) ) {
                    $sellerArr[ 'number' ] = ( string )$numNodes[ 0 ];
                }

                // SellerParty/Address
                $addrNodes = $sp->xpath( './*[local-name()="Address"]' );
                if ( $addrNodes && isset( $addrNodes[ 0 ] ) ) {
                    $addr = $addrNodes[ 0 ];

                    // Normalize all child‐nodes of Address into an associative sub‐array
                    foreach ( $addr->children() as $child ) {
                        $tagName = $child->getName();
                        $sellerArr[ 'address' ][ $tagName ] = ( string )$child;
                    }
                }
            }
            $headArr[ 'seller_party' ] = $sellerArr;

            //
            // 6.1.4 ) BuyerParty → grab Number + Address sub‐fields
            //
            $buyerArr = [
                'number'  => null,
                'address' => [],
            ];
            $buyerNodes = $headNode->xpath( './*[local-name()="BuyerParty"]' );
            if ( $buyerNodes && isset( $buyerNodes[ 0 ] ) ) {
                $bp = $buyerNodes[ 0 ];

                // BuyerParty/Number
                $numNodes = $bp->xpath( './*[local-name()="Number"]' );
                if ( $numNodes && isset( $numNodes[ 0 ] ) ) {
                    $buyerArr[ 'number' ] = ( string )$numNodes[ 0 ];
                }

                // BuyerParty/Address
                $addrNodes = $bp->xpath( './*[local-name()="Address"]' );
                if ( $addrNodes && isset( $addrNodes[ 0 ] ) ) {
                    $addr = $addrNodes[ 0 ];
                    foreach ( $addr->children() as $child ) {
                        $tagName = $child->getName();
                        $buyerArr[ 'address' ][ $tagName ] = ( string )$child;
                    }
                }
            }
            $headArr[ 'buyer_party' ] = $buyerArr;

            //
            // 6.1.5 ) AdditionalParty → there may be multiple. For each, grab Qualifier + Address
            //
            $additionalParties = [];
            $addNodes = $headNode->xpath( './*[local-name()="AdditionalParty"]' );
            if ( $addNodes ) {
                foreach ( $addNodes as $addNode ) {
                    $one = [
                        'qualifier' => null,
                        'address'   => [],
                    ];

                    // Qualifier
                    $qualNodes = $addNode->xpath( './*[local-name()="Qualifier"]' );
                    if ( $qualNodes && isset( $qualNodes[ 0 ] ) ) {
                        $one[ 'qualifier' ] = ( string )$qualNodes[ 0 ];
                    }

                    // Address ( if present )
                    $addrNodes = $addNode->xpath( './*[local-name()="Address"]' );
                    if ( $addrNodes && isset( $addrNodes[ 0 ] ) ) {
                        $addr = $addrNodes[ 0 ];
                        foreach ( $addr->children() as $child ) {
                            $tagName           = $child->getName();
                            $one[ 'address' ][ $tagName ] = ( string )$child;
                        }
                    }

                    $additionalParties[] = $one;
                }
            }
            $headArr[ 'additional_parties' ] = $additionalParties;
        }

        //
        // ─── Extract the LINE‐ITEMS ───────────────────────────────────────────────────
        //
        $linesOut = [];
        $lineNodes = $ordRsp->xpath( './*[local-name()="Line"]' );
        if ( $lineNodes ) {
            foreach ( $lineNodes as $lineElem ) {
                // 7.1 ) Requested Quantity → <TotalQuantity><Requested><Value>
                $requested = null;
                $reqNodes = $lineElem->xpath( './/*[local-name()="TotalQuantity"]/*[local-name()="Requested"]/*[local-name()="Value"]' );
                if ( $reqNodes && isset( $reqNodes[ 0 ] ) ) {
                    $requested = ( string )$reqNodes[ 0 ];
                }

                // 7.2 ) Confirmed Quantity → <TotalQuantity><Confirmed><Value>
                $confirmed = null;
                $confNodes = $lineElem->xpath( './/*[local-name()="TotalQuantity"]/*[local-name()="Confirmed"]/*[local-name()="Value"]' );
                if ( $confNodes && isset( $confNodes[ 0 ] ) ) {
                    $confirmed = ( string )$confNodes[ 0 ];
                }

                // 7.3 ) Product Number → <ProductId><ProductNumber>
                $productNo = null;
                $prodNodes = $lineElem->xpath( './/*[local-name()="ProductId"]/*[local-name()="ProductNumber"]' );
                if ( $prodNodes && isset( $prodNodes[ 0 ] ) ) {
                    $productNo = ( string )$prodNodes[ 0 ];
                }

                // 7.4 ) Net Price → <Price><NetPrice>
                $netPrice = null;
                $priceNodes = $lineElem->xpath( './/*[local-name()="Price"]/*[local-name()="NetPrice"]' );
                if ( $priceNodes && isset( $priceNodes[ 0 ] ) ) {
                    $netPrice = ( string )$priceNodes[ 0 ];
                }

                $linesOut[] = [
                    'requested_quantity' => $requested,
                    'confirmed_quantity' => $confirmed,
                    'product_number'     => $productNo,
                    'net_price'          => $netPrice,
                ];
            }
        }

        //
        // ─── RETURN a combined array with head + lines ────────────────────────────────
        //
        return [
            'head'  => $headArr,
            'lines' => $linesOut,
        ];
    }
}
