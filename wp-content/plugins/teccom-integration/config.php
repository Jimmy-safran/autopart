<?php
return [
    'soap' => [
        'endpoint' => 'https://iam.teccom.de/tecdirect/tomdirect.asmx',
        'action'   => 'http://www.teccom-eu.net/wsdl/ProcessRequest',
        'uri'      => 'http://www.teccom-eu.net/wsdl',
    ],
    'auth' => [
        'user'     => '7082000084057',
        'password' => 'e2Y8ZpJn',
        'language' => 'en',
    ],
    'parties' => [
        // 'seller_number' => 'golda',
        // 'buyer_number'  => '4768',
        'seller_number' => '495448',
        'buyer_number'  => '97506',
    ],
];
