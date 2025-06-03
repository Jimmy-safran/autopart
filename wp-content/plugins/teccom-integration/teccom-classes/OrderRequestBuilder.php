<?php
// TecCom/OrderRequestBuilder.php

use SebastianBergmann\Type\MixedType;
use TecCom\Order\TXML5\AddressType;
use TecCom\Order\TXML5\Order;
use TecCom\Order\TXML5\Order\OrderAType\HeadAType as OrdHead;
use TecCom\Order\TXML5\Order\OrderAType\HeadAType\ReferenceAType as Reference;
use TecCom\Order\TXML5\Order\OrderAType\LineAType as OrdLine;
use TecCom\Order\TXML5\OrderProcessingInstructionsType;
use TecCom\Order\TXML5\PartyType1Type as Party;
use TecCom\Order\TXML5\CurrencyType as Currency;
use TecCom\Order\TXML5\ProcessingInstructionsType;
use TecCom\Order\TXML5\QuantityType;
use TecCom\Order\TXML5\QuantityDetailType;
use TecCom\Order\TXML5\ProductIdChoiceType;
use TecCom\Order\TXML5\ItemProcessingType;
use TecCom\Order\TXML5\AdditionalPartyType;


class OrderRequestBuilder
{
    
    public static function build(array $input): Order
    {
        //---------------------------------------------------
        // 1) Create top‐level OrdReq and set version
        //---------------------------------------------------
        $ordReq = new Order();
        
        
        $ordReq->setVersion('5.0');

        //---------------------------------------------------
        // 2) Build <Head> block
        //---------------------------------------------------
        $head = new OrdHead();

        // <OrderType>
        $head->setOrderType($input['order_type'] ?? 'Standard'); // Default to 'Standard' if not provided
        // <DocumentNumber>
        $head->setDocumentNumber($input['document_number']);

        // <IssueDate>
        $dt = new \DateTime();
        $head->setIssueDate($dt);


        // <SellerParty>
        $seller = new Party();
        $seller->setNumber($input['seller_number']);
        $head->setSellerParty($seller);

        // <BuyerParty>
        $buyer = new Party();
        $buyer->setNumber($input['buyer_number']);
        $head->setBuyerParty($buyer);

        $additionalParty = new AdditionalPartyType();
        $additionalParty->setQualifier($input['additional_party_qualifier'] ?? 'ThirdParty'); // Default to 'Consignee' if not provided
        $address = new AddressType();
        $address->setName1($input['shipping_address_name1']);
        $address->setStreet1($input['shipping_address_street1']);
        $address->setCity($input['shipping_address_city']);
        $address->setPostalCode($input['shipping_address_postal_code']);
        $address->setCountryCode($input['shipping_address_country_code']);
        $additionalParty->setAddress($address);
        $head->setAdditionalParty([$additionalParty]);

        // <Currency>
        // $currency = new Currency();
        // $currency->setRequest($input['currency']); 
        // $head->setCurrency($currency);

        // <ProcessingInstructions>
        $proc = new OrderProcessingInstructionsType();
        $proc->setDispatchMode($input['dispatch_mode']);
        $proc->setBacklog((bool) $input['backlog']);
        $proc->setCompleteDelivery((bool) $input['complete_delivery']);
        $proc->setCompleteShipment((bool) $input['complete_shipment']);
        $head->setProcessingInstructions($proc);

        $ordReq->setHead($head);

        //---------------------------------------------------
        // 3) Build each <Line> block
        //---------------------------------------------------
        $allLines = [];
        foreach ($input['lines'] as $key => $lineData) {
            $line = new OrdLine();

            // <Number>
            $line->setNumber($key + 1);

            // <Quantity>
            $quantity = new QuantityType();
            $quantity->setUoM($lineData['uom']);
            $quantity->setValue($lineData['quantity']);

            $line->setQuantity($quantity);

            // <ProductId>
            $productId = new ProductIdChoiceType();
            $productId->setProductNumber($lineData['product_number']);
            $line->setProductId($productId);

            // <ItemProcess>
            $processingType = new ItemProcessingType();
            $processingType->setSuccessor($lineData['successor'] ?? false);
            $processingType->setSubstitution($lineData['substitution'] ?? false);
            $processingType->setExchangePart($lineData['exchange_part'] ?? false);

            $line->setItemProcessing($processingType);

            $allLines[] = $line;
        }

        // Attach all <Line> elements
        $ordReq->setLine($allLines);

        return $ordReq;
    }
}
