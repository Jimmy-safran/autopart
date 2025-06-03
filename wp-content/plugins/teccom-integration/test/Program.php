<?php

// Raw inner XML for FunctionCallRequest (including CDATA-wrapped AvaReq)
$functionCallRequest = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<FunctionCallRequest xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                     xmlns:xsd="http://www.w3.org/2001/XMLSchema"
                     xmlns="teccom.de/TecCom.OpenMessaging.DTO.FunctionCallRequest">
  <Timestamp>
    <DateString>2025-05-28T08:42:19</DateString>
    <TimeBase>localtime</TimeBase>
    <Format>iso8601</Format>
  </Timestamp>
  <Authentication>
    <User>7082000084057</User>
    <Password>e2Y8ZpJn</Password>
    <Language>en</Language>
  </Authentication>
  <RequestedFunction>
    <FunctionID>Order_SubmitInquiry</FunctionID>
    <ParameterList>
      <ParameterData>
        <ParameterValue><![CDATA[<?xml version="1.0" encoding="utf-8"?>
<AvaReq xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xmlns:xsd="http://www.w3.org/2001/XMLSchema"
        version="5.0">
  <Head>
    <IssueDate>2025-05-28T08:42:19.7413697-07:00</IssueDate>
    <AvaReqOptions>
      <Type>Exact</Type>
      <PriceInfo>true</PriceInfo>
    </AvaReqOptions>
    <SellerParty>
      <Number>golda</Number>
    </SellerParty>
    <BuyerParty>
      <Number>4768</Number>
    </BuyerParty>
    <ProcessingInstructions>
      <DispatchMode>Road-Express</DispatchMode>
    </ProcessingInstructions>
  </Head>
  <Line>
    <Number>1</Number>
    <Quantity>
      <UoM>PCE</UoM>
      <Value>1</Value>
    </Quantity>
    <ProductId>
      <ProductNumber>0810</ProductNumber>
    </ProductId>
    <ProductChangeAllowed>true</ProductChangeAllowed>
  </Line>
</AvaReq>]]></ParameterValue>
        <ParameterType>Inquiry</ParameterType>
      </ParameterData>
    </ParameterList>
  </RequestedFunction>
</FunctionCallRequest>
XML;

// Create the SOAP client
$options = [
  'trace' => 1,
  'exceptions' => true,
  'cache_wsdl' => WSDL_CACHE_NONE,
];

$wsdl = 'https://iam.teccom.de/tecdirect/tomdirect.asmx?WSDL';

try {
  $client = new SoapClient($wsdl, $options);

  $params = [
      'RequestElement' => $functionCallRequest
  ];

  $response = $client->__soapCall('ProcessRequest', [$params]);

  echo "=== SOAP Response Object ===\n";
  print_r($response);

  // FIXED: Get the raw XML string
  $outerXml = $response->ProcessRequestResult;

  echo "\n\n=== Raw TecCom Response XML ===\n";
  echo $outerXml;

  // Load outer XML (FunctionCallResponse)
  $outerXml = str_replace(
    'xmlns="teccom.de/TecCom.OpenMessaging.DTO.FunctionCallResponse"',
    'xmlns="https://teccom.de/TecCom.OpenMessaging.DTO.FunctionCallResponse"',
    $outerXml
);
  $outer = simplexml_load_string($outerXml);
  if (!$outer) {
      throw new Exception("Failed to parse outer FunctionCallResponse XML.");
  }

  // Register default namespace if needed
  $ns = $outer->getNamespaces(true);
  if (isset($ns[''])) {
      $outer->registerXPathNamespace('ns', $ns['']);
  }

  // Extract ParameterValue from outer XML
  $paramValueNodes = $outer->xpath('//ns:ParameterValue');
  if (!$paramValueNodes || !isset($paramValueNodes[0])) {
      throw new Exception("ParameterValue not found.");
  }

  // Decode inner XML from escaped string
  $innerEncoded = (string)$paramValueNodes[0];
  $innerXml = html_entity_decode($innerEncoded, ENT_QUOTES | ENT_XML1);

  echo "\n\n=== Decoded Inner AvaRsp XML ===\n";
  echo $innerXml;

  // Now parse AvaRsp
  $avaRsp = simplexml_load_string($innerXml);
  if (!$avaRsp) {
      throw new Exception("Failed to parse AvaRsp XML.");
  }

  echo "\n\n=== Parsed AvaRsp Line Items ===\n";

  $totalRequested = 0;
  $totalConfirmed = 0;

  foreach ($avaRsp->Line as $line) {
      $productNumber = (string)$line->ProductId->ProductNumber;
      $requestedQty = (int)$line->TotalQuantity->Requested->Value;
      $confirmedQty = (int)$line->TotalQuantity->Confirmed->Value;

      $totalRequested += $requestedQty;
      $totalConfirmed += $confirmedQty;

      echo "  Product: {$productNumber}\n";
      echo "  Requested: {$requestedQty}\n";
      echo "  Confirmed: {$confirmedQty}\n\n";
  }

  echo "=== Totals ===\n";
  echo "Total Requested: {$totalRequested}\n";
  echo "Total Confirmed: {$totalConfirmed}\n";

} catch (SoapFault $fault) {
  echo "SOAP Fault:\n";
  echo "Code: {$fault->faultcode}\n";
  echo "String: {$fault->faultstring}\n";
  echo "\n\n=== Raw SOAP Request ===\n";
  echo $client->__getLastRequest();
} catch (Exception $e) {
  echo "Error: " . $e->getMessage() . "\n";
}