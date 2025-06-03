<?php

declare(strict_types=1);

namespace TeccomIntegration;

use JMS\Serializer\SerializerInterface;
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
use TecCom\Order\TXML5\PartyType1Type as PartyType;
use TecCom\Order\TXML5\ProcessingInstructionsType;
use TecCom\Order\TXML5\QuantityType;
use TecCom\Order\TXML5\ProductIdChoiceType;

class TeccomConnector
{
    private string $endpoint;
    private SerializerInterface $serializer;
    private string $user;
    private string $password;
    private string $sellerNumber;
    private string $buyerNumber;

    public function __construct(
        string $endpoint,
        SerializerInterface $serializer,
        string $user,
        string $password,
        string $sellerNumber,
        string $buyerNumber
    ) {
        $this->endpoint = $endpoint;
        $this->serializer = $serializer;
        $this->user = $user;
        $this->password = $password;
        $this->sellerNumber = $sellerNumber;
        $this->buyerNumber = $buyerNumber;
    }

    public function checkAvailability(
        string $productNumber,
        int $quantity = 1,
        string $uom = 'PCE',
        string $dispatchMode = 'Road-Express',
        string $avaReqType = 'Exact',
        bool $includePriceInfo = true,
        bool $allowProductChange = true,
        int $lineNumber = 1
    ): array {
        // Build AvaReq
        $avaReq = new AvaReq();
        $avaReq->setVersion('5.0');
    
        // Head
        $head = new AvaHead();
        $head->setIssueDate(new \DateTime());
    
        $opts = new AvaReqOptions();
        $opts->setType($avaReqType);
        $opts->setPriceInfo($includePriceInfo);
        $head->setAvaReqOptions($opts);
    
        $seller = new PartyType();
        $seller->setNumber($this->sellerNumber);
        $head->setSellerParty($seller);
    
        $buyer = new PartyType();
        $buyer->setNumber($this->buyerNumber);
        $head->setBuyerParty($buyer);
    
        $proc = new ProcessingInstructionsType();
        $proc->setDispatchMode($dispatchMode);
        $head->setProcessingInstructions($proc);
    
        $avaReq->setHead($head);
    
        // Line
        $line = new AvaLine();
        $line->setNumber($lineNumber);
    
        $qty = new QuantityType();
        $qty->setValue($quantity);
        $qty->setUoM($uom);
        $line->setQuantity($qty);
    
        $pid = new ProductIdChoiceType();
        $pid->setProductNumber($productNumber);
        $line->setProductID($pid);
    
        $line->setProductChangeAllowed($allowProductChange);
    
        $avaReq->setLine([$line]);
    
        // Serialize AvaReq to XML
        $avaReqXml = $this->serializer->serialize($avaReq, 'xml');
    
        // Build FunctionCallRequest
        $fc = new FunctionCallRequest();
    
        $ts = new DTODateTimeType();
        $ts->setDateString(date('Y-m-d\TH:i:s'));
        $ts->setTimeBase('localtime');
        $ts->setFormat('iso8601');
        $fc->setTimestamp($ts);
    
        $auth = new AuthenticationDataType();
        $auth->setUser($this->user);
        $auth->setPassword($this->password);
        $auth->setLanguage('en');
        $fc->setAuthentication($auth);
    
        $svc = new ServiceDataType();
        $svc->setFunctionID('Order_SubmitInquiry');
    
        $param = new ParameterDataType();
        $param->setParameterValue($avaReqXml);
        $param->setParameterType('Inquiry');
        $svc->setParameterList([$param]);
    
        $fc->setRequestedFunction($svc);
    
        $fcreqXml = $this->serializer->serialize($fc, 'xml');
        $fcreqEsc = htmlspecialchars($fcreqXml, ENT_NOQUOTES);
    
        // Envelope
        $envelope = '<?xml version="1.0" encoding="utf-8"?>'
            . '<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">'
            . '<s:Body>'
            . '<ProcessRequest xmlns="http://www.teccom-eu.net/wsdl">'
            . '<RequestElement>' . $fcreqEsc . '</RequestElement>'
            . '</ProcessRequest>'
            . '</s:Body>'
            . '</s:Envelope>';
    
        // Send SOAP
        $client = new \SoapClient(null, [
            'location' => $this->endpoint,
            'uri' => 'http://www.teccom-eu.net/wsdl',
            'trace' => 1,
            'exceptions' => 1
        ]);
    
        try {
            $resp = $client->__doRequest(
                $envelope,
                $this->endpoint,
                'http://www.teccom-eu.net/wsdl/ProcessRequest',
                SOAP_1_1
            );
        } catch (\Exception $e) {
            throw new \RuntimeException('SOAP Error: ' . $e->getMessage());
        }
    
        // Parse Response
        libxml_use_internal_errors(true);
        $sx = simplexml_load_string($resp);
        $sx->registerXPathNamespace('soap', 'http://schemas.xmlsoap.org/soap/envelope/');
        $sx->registerXPathNamespace('w', 'http://www.teccom-eu.net/wsdl');
        $nodes = $sx->xpath('//soap:Body/w:ProcessRequestResponse/w:ProcessRequestResult');
        if (!$nodes) throw new \RuntimeException('No ProcessRequestResult');
        $innerEsc = (string)$nodes[0];
        $inner = htmlspecialchars_decode($innerEsc);
        $inner = preg_replace('/<\?xml.*?\?>/U', '', $inner);
        $inner = trim($inner);
    
        /** @var FunctionCallResponse $respObj */
        $respObj = $this->serializer->deserialize($inner, FunctionCallResponse::class, 'xml');
        $status = $respObj->getStatus();
        if (!$status || $status->getCode() !== '99') {
            $msg = $status ? $status->getValue() : 'Unknown';
            throw new \RuntimeException('Request failed: ' . $msg);
        }
    
        // Extract and parse AvaRsp
        $fcr = simplexml_load_string($inner);
        $fcr->registerXPathNamespace('fc', 'teccom.de/TecCom.OpenMessaging.DTO.FunctionCallResponse');
        $pvs = $fcr->xpath('//fc:OriginatingFunction/fc:ParameterList/fc:ParameterData/fc:ParameterValue');
        if (!$pvs) throw new \RuntimeException('No <ParameterValue>');
        $dom = new \DOMDocument();
        $dom->loadXML($pvs[0]->asXML());
        $innerDoc = '';
        foreach ($dom->documentElement->childNodes as $c) {
            $innerDoc .= $dom->saveXML($c);
        }
    
        // Clean & parse AvaRsp XML
        $xml = htmlspecialchars_decode($innerDoc);
        $xml = preg_replace('/<\?xml.*?\?>/U', '', $xml);
        $xml = preg_replace('/\sxmlns(:\w+)?="[^"]*"/i', '', $xml);
        $xml = preg_replace('/<(\/?)((xsi|xsd):)?/', '<$1', $xml);
        $xml = trim($xml);
        $ax = simplexml_load_string($xml);
        $lines = $ax->xpath('/AvaRsp/Line');
    
        $out = [];
        foreach ($lines as $l) {
            $out[] = [
                'line_number'     => (string)($l->Number ?? ''),
                'product_number'  => (string)($l->ProductId->ProductNumber ?? ''),
                'requested_qty'   => (string)($l->TotalQuantity->Requested->Value ?? ''),
                'confirmed_qty'   => (string)($l->TotalQuantity->Confirmed->Value ?? ''),
            ];
        }
    
        return $out;
    }
}
