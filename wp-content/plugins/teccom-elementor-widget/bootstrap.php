<?php
declare(strict_types=1);

/*
 * bootstrap.php
 *
 * Initializes JMS Serializer with all generated metadata directories.
 */

require __DIR__ . '/vendor/autoload.php';

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;


/**
 * @var SerializerInterface $serializer
 */
$serializer = SerializerBuilder::create()
    // FunctionCallRequest metadata
    ->addMetadataDir(__DIR__ . '/metadata/TecCom/Order/FunctionCallRequest', 'TecCom\Order\FunctionCallRequest')
    // FunctionCallResponse metadata
    ->addMetadataDir(__DIR__ . '/metadata/TecCom/Order/FunctionCallResponse', 'TecCom\Order\FunctionCallResponse')
    // All TXML-5 types (AvaReq, AvaRsp, OrderStatusRequest, etc.)
    ->addMetadataDir(__DIR__ . '/metadata/TecCom/Order/TXML5', 'TecCom\Order\TXML5')
    // TXML 4.1: DespatchAdvice (TXML 2.0)
    ->addMetadataDir(__DIR__ . '/metadata/TecCom/Order/TXML4/DespatchAdvice', 'TecCom\Order\TXML4\DespatchAdvice')
    // TXML 4.1: Invoice (TXML 2.5)
    ->addMetadataDir(__DIR__ . '/metadata/TecCom/Order/TXML4/Invoice', 'TecCom\Order\TXML4\Invoice')

    ->build();
