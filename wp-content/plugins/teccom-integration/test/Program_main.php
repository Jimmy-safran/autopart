<?php
declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/bootstrap.php';

use TecCom\Order\FunctionCallRequest\FunctionCallRequest;
use TecCom\Order\FunctionCallRequest\DTODateTimeType;
use TecCom\Order\FunctionCallRequest\AuthenticationDataType;
use TecCom\Order\FunctionCallRequest\ParameterDataType;
use TecCom\Order\FunctionCallRequest\ServiceDataType;

use TecCom\Order\FunctionCallResponse\FunctionCallResponse;

use TecCom\Order\TXML5\AvaReq;
use TecCom\Order\TXML5\AvaReq\AvaReqAType\HeadAType as AvaHead;
use TecCom\Order\TXML5\AvaReq\AvaReqAType\LineAType as AvaLine;
use TecCom\Order\TXML5\AvaReq\AvaReqAType\HeadAType\AvaReqOptionsAType as AvaReqOptions;
use TecCom\Order\TXML5\PartyType1Type as Party;
use TecCom\Order\TXML5\ProcessingInstructionsType;
use TecCom\Order\TXML5\QuantityType;
use TecCom\Order\TXML5\ProductIdChoiceType;

use TecCom\Order\TXML5\AvaRsp;

// ------------------------
// INPUT: Dynamic Settings
// ------------------------
$input = [
    // AvaReq Options
    'ava_version'          => '5.0',
    'ava_type'             => 'Exact',
    'price_info'           => true,
    'product_change'       => true,

    // Header Parties
    'seller_number'        => 'golda',
    'buyer_number'         => '4768',

    // Dispatch
    'dispatch_mode'        => 'Road-Express',

    // Product Line
    'product_number'       => '0810',
    'requested_qty'        => 1.0,
    'requested_uom'        => 'PCE',

    // Auth & Meta
    'user'                 => '7082000084057',
    'password'             => 'e2Y8ZpJn',
    'language'             => 'en',
    'timestamp_format'     => 'iso8601',
    'timestamp_time_base' => 'localtime',

    // SOAP
    'soap_endpoint'        => 'https://iam.teccom.de/tecdirect/tomdirect.asmx',
    'soap_action'          => 'http://www.teccom-eu.net/wsdl/ProcessRequest',
    'soap_uri'             => 'http://www.teccom-eu.net/wsdl',
];

// ------------------------
// Build AvaReq (TXML5)
// ------------------------
$avaReq = new AvaReq();
$avaReq->setVersion($input['ava_version']);

$head = new AvaHead();
$head->setIssueDate(new \DateTime());

$options = new AvaReqOptions();
$options->setType($input['ava_type']);
$options->setPriceInfo((bool) $input['price_info']);
$head->setAvaReqOptions($options);

$seller = new Party();
$seller->setNumber($input['seller_number']);
$head->setSellerParty($seller);

$buyer = new Party();
$buyer->setNumber($input['buyer_number']);
$head->setBuyerParty($buyer);

$processing = new ProcessingInstructionsType();
$processing->setDispatchMode($input['dispatch_mode']);
$head->setProcessingInstructions($processing);

$avaReq->setHead($head);

// Line Item
$line = new AvaLine();
$line->setNumber(1);

$quantity = new QuantityType();
$quantity->setValue((float) $input['requested_qty']);
$quantity->setUoM($input['requested_uom']);
$line->setQuantity($quantity);

$productId = new ProductIdChoiceType();
$productId->setProductNumber($input['product_number']);
$line->setProductID($productId);

$line->setProductChangeAllowed((bool) $input['product_change']);
$avaReq->setLine([$line]);

// ------------------------
// Serialize AvaReq to XML
// ------------------------
$avaReqXml = $serializer->serialize($avaReq, 'xml');

// ------------------------
// Build FunctionCallRequest
// ------------------------
$fcReq = new FunctionCallRequest();

$ts = new DTODateTimeType();
$ts->setDateString(date('Y-m-d\TH:i:s'));
$ts->setFormat($input['timestamp_format']);
$ts->setTimeBase($input['timestamp_time_base']);
$fcReq->setTimestamp($ts);

$auth = new AuthenticationDataType();
$auth->setUser($input['user']);
$auth->setPassword($input['password']);
$auth->setLanguage($input['language']);
$fcReq->setAuthentication($auth);

$svc = new ServiceDataType();
$svc->setFunctionID("Order_SubmitInquiry");

$param = new ParameterDataType();
$param->setParameterValue($avaReqXml);
$param->setParameterType("Inquiry");

$svc->setParameterList([$param]);
$fcReq->setRequestedFunction($svc);

// ------------------------
// Serialize FunctionCallRequest
// ------------------------
$functionCallRequestXml = htmlspecialchars(
    $serializer->serialize($fcReq, 'xml'),
    ENT_NOQUOTES
);

// ------------------------
// SOAP Envelope
// ------------------------
$soapEnvelope = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Body>
    <ProcessRequest xmlns="http://www.teccom-eu.net/wsdl">
      <RequestElement>{$functionCallRequestXml}</RequestElement>
    </ProcessRequest>
  </s:Body>
</s:Envelope>
XML;

// ------------------------
// Send SOAP Request
// ------------------------
$client = new \SoapClient(null, [
    'location'   => $input['soap_endpoint'],
    'uri'        => $input['soap_uri'],
    'trace'      => 1,
    'exceptions' => 1,
]);

try {
    $response = $client->__doRequest(
        $soapEnvelope,
        $input['soap_endpoint'],
        $input['soap_action'],
        SOAP_1_1
    );
} catch (\Exception $e) {
    exit("SOAP Error: " . $e->getMessage());
}

// ------------------------
// Parse SOAP Response
// ------------------------
libxml_use_internal_errors(true);
$soapXml = simplexml_load_string($response);
$soapXml->registerXPathNamespace('soap', 'http://schemas.xmlsoap.org/soap/envelope/');
$soapXml->registerXPathNamespace('w', 'http://www.teccom-eu.net/wsdl');

$nodes = $soapXml->xpath('//soap:Body/w:ProcessRequestResponse/w:ProcessRequestResult');
if (!$nodes || !isset($nodes[0])) {
    exit("No ProcessRequestResult found in SOAP response.");
}

$innerXml = htmlspecialchars_decode((string) $nodes[0]);
$innerXml = preg_replace('/<\?xml.*?\?>/U', '', $innerXml);
$innerXml = trim($innerXml);

$fcResponse = $serializer->deserialize($innerXml, FunctionCallResponse::class, 'xml');

$status = $fcResponse->getStatus();
if (!$status || $status->getCode() !== '99') {
    $msg = $status ? $status->getValue() : 'Unknown error';
    exit("Request failed: $msg");
}

// ------------------------
// Extract <ParameterValue>
// ------------------------
$fcrXml = simplexml_load_string($innerXml);
$fcrXml->registerXPathNamespace('fc', 'teccom.de/TecCom.OpenMessaging.DTO.FunctionCallResponse');

$paramValueNodes = $fcrXml->xpath('//fc:OriginatingFunction/fc:ParameterList/fc:ParameterData/fc:ParameterValue');
if (!$paramValueNodes) {
    exit("No <ParameterValue> found.");
}

$node = $paramValueNodes[0];
$dom = new \DOMDocument();
$dom->loadXML($node->asXML());

$responseDocument = '';
foreach ($dom->documentElement->childNodes as $child) {
    $responseDocument .= $dom->saveXML($child);
}

$avaRspXml = htmlspecialchars_decode($responseDocument);
$avaRspXml = preg_replace('/<\?xml.*?\?>/U', '', $avaRspXml);
$avaRspXml = preg_replace('/\sxmlns(:\w+)?="[^"]*"/i', '', $avaRspXml);
$avaRspXml = preg_replace('/<(\/?)(xsi:|xsd:)?/', '<$1', $avaRspXml);
$avaRspXml = trim($avaRspXml);

$rspXml = simplexml_load_string($avaRspXml);
$lines = $rspXml->xpath('/AvaRsp/Line');

// ------------------------
// Output
// ------------------------
foreach ($lines as $ln) {
    echo "Line Number     = " . ($ln->Number ?? '') . "\n";
    echo "Product Number  = " . ($ln->ProductId->ProductNumber ?? '') . "\n";
    echo "Requested Qty   = " . ($ln->TotalQuantity->Requested->Value ?? '') . "\n";
    echo "Confirmed Qty   = " . ($ln->TotalQuantity->Confirmed->Value ?? '') . "\n";
    echo "---\n";
}
