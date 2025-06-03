<?php

class SoapClientWrapper {
    public static function send(string $requestXml, array $soap): string {
        $soapEnvelope = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Body>
    <ProcessRequest xmlns="http://www.teccom-eu.net/wsdl">
      <RequestElement>{$requestXml}</RequestElement>
    </ProcessRequest>
  </s:Body>
</s:Envelope>
XML;

        $client = new \SoapClient(null, [
            'location'   => $soap['endpoint'],
            'uri'        => $soap['uri'],
            'trace'      => 1,
            'exceptions' => 1,
        ]);

        return $client->__doRequest(
            $soapEnvelope,
            $soap['endpoint'],
            $soap['action'],
            SOAP_1_1
        );
    }
}
