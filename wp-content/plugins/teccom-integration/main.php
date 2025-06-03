<?php
declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/bootstrap.php';

$config = require __DIR__ . '/config.php';

require_once __DIR__ . '/teccom-classes/AvaRequestBuilder.php';
require_once __DIR__ . '/teccom-classes/FunctionCallBuilder.php';
require_once __DIR__ . '/teccom-classes/ResponseParser.php';
require_once __DIR__ . '/teccom-classes/SoapClientWrapper.php';
require_once __DIR__ . '/teccom-classes/OrderRequestBuilder.php';


// Input Parameters
$input = [
    'ava_type'        => 'Exact',
    'price_info'      => true,
    'product_change'  => true,
    'seller_number'   => $config['parties']['seller_number'],
    'buyer_number'    => $config['parties']['buyer_number'],
    'dispatch_mode'   => 'Road-Express',
    'product_number'  => '0810',
    'requested_qty'   => 1.0,
    'requested_uom'   => 'PCE',
];

$order_input = [
    // Top‐level Order attributes
    'order_type'       => 'Standard',
    'document_number'  => 'ORD-20230110-001',
    'issue_date'       => '2023-01-10T09:00:00+01:00',
    'seller_number'   => $config['parties']['seller_number'],
    'buyer_number'    => $config['parties']['buyer_number'],
    'dispatch_mode'    => 'Road',
    'backlog'          => false,
    'complete_delivery'=> false,
    'complete_shipment'=> false,

    // Lines array (only one line in your example)
    'lines' => [
        [
            'uom'             => 'PCE',
            'quantity'        => 10,
            'product_number'  => '0810',
            'successor'       => false,
            'substitution'    => false,
            'exchange_part'   => false,
        ],
    ],
];

// Build AvaReq XML
$avaReq = AvaRequestBuilder::build($input);
$avaReqXml = $serializer->serialize($avaReq, 'xml');

$orderReq = OrderRequestBuilder::build($order_input);
$orderReqXml        = $serializer->serialize($orderReq, 'xml');

// Wrap in FunctionCall
$functionID = 'Order_SubmitInquiry';  // or any valid TecCom function
$parameterType = 'Inquiry';

$order_functionID = 'Order_SubmitOrder';  // Use 'Order_SubmitOrder' for order submission
$order_parameterType = 'Order';


$fcRequest = FunctionCallBuilder::build($avaReqXml, $config['auth'], $functionID, $parameterType);
$fcRequestXml = htmlspecialchars($serializer->serialize($fcRequest, 'xml'), ENT_NOQUOTES);

$orderRequest = FunctionCallBuilder::build($orderReqXml, $config['auth'], $order_functionID, $order_parameterType);
$orderRequestXml = htmlspecialchars($serializer->serialize($orderRequest, 'xml'), ENT_NOQUOTES);



// // Send and parse
// $response = SoapClientWrapper::send($fcRequestXml, $config['soap']);
// $innerXml = ResponseParser::parse($response, $serializer);
// $avaRspXml = ResponseParser::extractAvaRsp($innerXml);

// // Output
// $rspXml = simplexml_load_string($avaRspXml);
// $lines = $rspXml->xpath('/AvaRsp/Line');
// foreach ($lines as $ln) {
//     echo "Line Number    = {$ln->Number}\n";
//     echo "Product Number = {$ln->ProductId->ProductNumber}\n";
//     echo "Requested Qty  = {$ln->TotalQuantity->Requested->Value}\n";
//     echo "Confirmed Qty  = {$ln->TotalQuantity->Confirmed->Value}\n---\n";
// }


$order_response = SoapClientWrapper::send($orderRequestXml, $config['soap']);
$order_innerXml = ResponseParser::parse($order_response, $serializer);
$orderRspXml = ResponseParser::extractOrderResponse($order_innerXml);

// echo $order_innerXml;

if (is_string($orderRspXml)) {
    // An error occurred
    echo $orderRspXml;
} else {
    // $output is an array of line‐data
    foreach ($orderRspXml as $idx => $lineData) {
        echo "Line " . ($idx + 1) . ":\n";
        echo "  Product Number:     " . $lineData['product_number'] . "\n";
        echo "  Requested Quantity: " . $lineData['requested_quantity'] . "\n";
        echo "  Confirmed Quantity: " . $lineData['confirmed_quantity'] . "\n";
        echo "  Net Price:          " . $lineData['net_price'] . "\n\n";
    }
}