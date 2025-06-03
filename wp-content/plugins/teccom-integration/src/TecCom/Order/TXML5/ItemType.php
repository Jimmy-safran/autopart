<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing ItemType
 *
 * 
 * XSD Type: ItemType
 */
class ItemType
{
    /**
     * The item position number.
     *
     * 1. This number **must** be a positive integer and be greater than the position number of the previous item (if any).
     *
     * 2. This number **must** be unique over all item instances.
     *
     * 3. It **must not** be reset when a new package starts.
     *
     * @var int $number
     */
    private $number = null;

    /**
     * The quantity and unit of measurement of the item that is delivered with this shipment.
     *
     * @var \TecCom\Order\TXML5\QuantityType $deliveredQuantity
     */
    private $deliveredQuantity = null;

    /**
     * The identifiers of the item.
     *
     * @var \TecCom\Order\TXML5\ProductIdChoiceType $productId
     */
    private $productId = null;

    /**
     * The name of the item.
     *
     * @var string $productName
     */
    private $productName = null;

    /**
     * A reference to another document.
     *
     * 1. The seller **must** always add a reference to the buyer's order with the qualifier `BuyerOrderNumber`. Its value **must** be the `DocumentNumber` of the buyer's order.
     *
     * 2. The seller **must** always add a reference to the buyer's order with the qualifier `SellerOrderNumber`. Its value **must** be the order number the seller has assigned to the buyer's order in their ERP system.
     *
     * 3. The seller **can** add more than one reference with the qualifier `SellerOrderNumber`, for example, if the order was split internally in their ERP system.
     *
     * @var \TecCom\Order\TXML5\ReferenceLineType[] $reference
     */
    private $reference = [
        
    ];

    /**
     * A measurement of the item.
     *
     * @var \TecCom\Order\TXML5\MeasurementsType[] $measurements
     */
    private $measurements = [
        
    ];

    /**
     * Information that is relevant for the export of the item.
     *
     * @var \TecCom\Order\TXML5\ExternalTradeType $externalTrade
     */
    private $externalTrade = null;

    /**
     * An external resource with information about the item.
     *
     * @var \TecCom\Order\TXML5\ExternalDocumentType[] $externalDocument
     */
    private $externalDocument = [
        
    ];

    /**
     * Additional information related to the processing of the item.
     *
     * The seller **must** only use these qualifiers:
     *
     * 1. `StorageLocation`
     * 2. `MaterialGroup`
     *
     * @var \TecCom\Order\TXML5\AdditionalParametersType[] $additionalParameters
     */
    private $additionalParameters = [
        
    ];

    /**
     * Arbitrary information that applies to the item.
     *
     * Free text **must** be agreed between buyer and seller, otherwise the buyer will ignore it.
     *
     * @var \TecCom\Order\TXML5\FreeTextValueType[] $freeText
     */
    private $freeText = [
        
    ];

    /**
     * Gets as number
     *
     * The item position number.
     *
     * 1. This number **must** be a positive integer and be greater than the position number of the previous item (if any).
     *
     * 2. This number **must** be unique over all item instances.
     *
     * 3. It **must not** be reset when a new package starts.
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets a new number
     *
     * The item position number.
     *
     * 1. This number **must** be a positive integer and be greater than the position number of the previous item (if any).
     *
     * 2. This number **must** be unique over all item instances.
     *
     * 3. It **must not** be reset when a new package starts.
     *
     * @param int $number
     * @return self
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Gets as deliveredQuantity
     *
     * The quantity and unit of measurement of the item that is delivered with this shipment.
     *
     * @return \TecCom\Order\TXML5\QuantityType
     */
    public function getDeliveredQuantity()
    {
        return $this->deliveredQuantity;
    }

    /**
     * Sets a new deliveredQuantity
     *
     * The quantity and unit of measurement of the item that is delivered with this shipment.
     *
     * @param \TecCom\Order\TXML5\QuantityType $deliveredQuantity
     * @return self
     */
    public function setDeliveredQuantity(\TecCom\Order\TXML5\QuantityType $deliveredQuantity)
    {
        $this->deliveredQuantity = $deliveredQuantity;
        return $this;
    }

    /**
     * Gets as productId
     *
     * The identifiers of the item.
     *
     * @return \TecCom\Order\TXML5\ProductIdChoiceType
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Sets a new productId
     *
     * The identifiers of the item.
     *
     * @param \TecCom\Order\TXML5\ProductIdChoiceType $productId
     * @return self
     */
    public function setProductId(\TecCom\Order\TXML5\ProductIdChoiceType $productId)
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * Gets as productName
     *
     * The name of the item.
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Sets a new productName
     *
     * The name of the item.
     *
     * @param string $productName
     * @return self
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
        return $this;
    }

    /**
     * Adds as reference
     *
     * A reference to another document.
     *
     * 1. The seller **must** always add a reference to the buyer's order with the qualifier `BuyerOrderNumber`. Its value **must** be the `DocumentNumber` of the buyer's order.
     *
     * 2. The seller **must** always add a reference to the buyer's order with the qualifier `SellerOrderNumber`. Its value **must** be the order number the seller has assigned to the buyer's order in their ERP system.
     *
     * 3. The seller **can** add more than one reference with the qualifier `SellerOrderNumber`, for example, if the order was split internally in their ERP system.
     *
     * @return self
     * @param \TecCom\Order\TXML5\ReferenceLineType $reference
     */
    public function addToReference(\TecCom\Order\TXML5\ReferenceLineType $reference)
    {
        $this->reference[] = $reference;
        return $this;
    }

    /**
     * isset reference
     *
     * A reference to another document.
     *
     * 1. The seller **must** always add a reference to the buyer's order with the qualifier `BuyerOrderNumber`. Its value **must** be the `DocumentNumber` of the buyer's order.
     *
     * 2. The seller **must** always add a reference to the buyer's order with the qualifier `SellerOrderNumber`. Its value **must** be the order number the seller has assigned to the buyer's order in their ERP system.
     *
     * 3. The seller **can** add more than one reference with the qualifier `SellerOrderNumber`, for example, if the order was split internally in their ERP system.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetReference($index)
    {
        return isset($this->reference[$index]);
    }

    /**
     * unset reference
     *
     * A reference to another document.
     *
     * 1. The seller **must** always add a reference to the buyer's order with the qualifier `BuyerOrderNumber`. Its value **must** be the `DocumentNumber` of the buyer's order.
     *
     * 2. The seller **must** always add a reference to the buyer's order with the qualifier `SellerOrderNumber`. Its value **must** be the order number the seller has assigned to the buyer's order in their ERP system.
     *
     * 3. The seller **can** add more than one reference with the qualifier `SellerOrderNumber`, for example, if the order was split internally in their ERP system.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetReference($index)
    {
        unset($this->reference[$index]);
    }

    /**
     * Gets as reference
     *
     * A reference to another document.
     *
     * 1. The seller **must** always add a reference to the buyer's order with the qualifier `BuyerOrderNumber`. Its value **must** be the `DocumentNumber` of the buyer's order.
     *
     * 2. The seller **must** always add a reference to the buyer's order with the qualifier `SellerOrderNumber`. Its value **must** be the order number the seller has assigned to the buyer's order in their ERP system.
     *
     * 3. The seller **can** add more than one reference with the qualifier `SellerOrderNumber`, for example, if the order was split internally in their ERP system.
     *
     * @return \TecCom\Order\TXML5\ReferenceLineType[]
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Sets a new reference
     *
     * A reference to another document.
     *
     * 1. The seller **must** always add a reference to the buyer's order with the qualifier `BuyerOrderNumber`. Its value **must** be the `DocumentNumber` of the buyer's order.
     *
     * 2. The seller **must** always add a reference to the buyer's order with the qualifier `SellerOrderNumber`. Its value **must** be the order number the seller has assigned to the buyer's order in their ERP system.
     *
     * 3. The seller **can** add more than one reference with the qualifier `SellerOrderNumber`, for example, if the order was split internally in their ERP system.
     *
     * @param \TecCom\Order\TXML5\ReferenceLineType[] $reference
     * @return self
     */
    public function setReference(array $reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * Adds as measurements
     *
     * A measurement of the item.
     *
     * @return self
     * @param \TecCom\Order\TXML5\MeasurementsType $measurements
     */
    public function addToMeasurements(\TecCom\Order\TXML5\MeasurementsType $measurements)
    {
        $this->measurements[] = $measurements;
        return $this;
    }

    /**
     * isset measurements
     *
     * A measurement of the item.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetMeasurements($index)
    {
        return isset($this->measurements[$index]);
    }

    /**
     * unset measurements
     *
     * A measurement of the item.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetMeasurements($index)
    {
        unset($this->measurements[$index]);
    }

    /**
     * Gets as measurements
     *
     * A measurement of the item.
     *
     * @return \TecCom\Order\TXML5\MeasurementsType[]
     */
    public function getMeasurements()
    {
        return $this->measurements;
    }

    /**
     * Sets a new measurements
     *
     * A measurement of the item.
     *
     * @param \TecCom\Order\TXML5\MeasurementsType[] $measurements
     * @return self
     */
    public function setMeasurements(?array $measurements = null)
    {
        $this->measurements = $measurements;
        return $this;
    }

    /**
     * Gets as externalTrade
     *
     * Information that is relevant for the export of the item.
     *
     * @return \TecCom\Order\TXML5\ExternalTradeType
     */
    public function getExternalTrade()
    {
        return $this->externalTrade;
    }

    /**
     * Sets a new externalTrade
     *
     * Information that is relevant for the export of the item.
     *
     * @param \TecCom\Order\TXML5\ExternalTradeType $externalTrade
     * @return self
     */
    public function setExternalTrade(?\TecCom\Order\TXML5\ExternalTradeType $externalTrade = null)
    {
        $this->externalTrade = $externalTrade;
        return $this;
    }

    /**
     * Adds as externalDocument
     *
     * An external resource with information about the item.
     *
     * @return self
     * @param \TecCom\Order\TXML5\ExternalDocumentType $externalDocument
     */
    public function addToExternalDocument(\TecCom\Order\TXML5\ExternalDocumentType $externalDocument)
    {
        $this->externalDocument[] = $externalDocument;
        return $this;
    }

    /**
     * isset externalDocument
     *
     * An external resource with information about the item.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetExternalDocument($index)
    {
        return isset($this->externalDocument[$index]);
    }

    /**
     * unset externalDocument
     *
     * An external resource with information about the item.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetExternalDocument($index)
    {
        unset($this->externalDocument[$index]);
    }

    /**
     * Gets as externalDocument
     *
     * An external resource with information about the item.
     *
     * @return \TecCom\Order\TXML5\ExternalDocumentType[]
     */
    public function getExternalDocument()
    {
        return $this->externalDocument;
    }

    /**
     * Sets a new externalDocument
     *
     * An external resource with information about the item.
     *
     * @param \TecCom\Order\TXML5\ExternalDocumentType[] $externalDocument
     * @return self
     */
    public function setExternalDocument(?array $externalDocument = null)
    {
        $this->externalDocument = $externalDocument;
        return $this;
    }

    /**
     * Adds as additionalParameters
     *
     * Additional information related to the processing of the item.
     *
     * The seller **must** only use these qualifiers:
     *
     * 1. `StorageLocation`
     * 2. `MaterialGroup`
     *
     * @return self
     * @param \TecCom\Order\TXML5\AdditionalParametersType $additionalParameters
     */
    public function addToAdditionalParameters(\TecCom\Order\TXML5\AdditionalParametersType $additionalParameters)
    {
        $this->additionalParameters[] = $additionalParameters;
        return $this;
    }

    /**
     * isset additionalParameters
     *
     * Additional information related to the processing of the item.
     *
     * The seller **must** only use these qualifiers:
     *
     * 1. `StorageLocation`
     * 2. `MaterialGroup`
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAdditionalParameters($index)
    {
        return isset($this->additionalParameters[$index]);
    }

    /**
     * unset additionalParameters
     *
     * Additional information related to the processing of the item.
     *
     * The seller **must** only use these qualifiers:
     *
     * 1. `StorageLocation`
     * 2. `MaterialGroup`
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAdditionalParameters($index)
    {
        unset($this->additionalParameters[$index]);
    }

    /**
     * Gets as additionalParameters
     *
     * Additional information related to the processing of the item.
     *
     * The seller **must** only use these qualifiers:
     *
     * 1. `StorageLocation`
     * 2. `MaterialGroup`
     *
     * @return \TecCom\Order\TXML5\AdditionalParametersType[]
     */
    public function getAdditionalParameters()
    {
        return $this->additionalParameters;
    }

    /**
     * Sets a new additionalParameters
     *
     * Additional information related to the processing of the item.
     *
     * The seller **must** only use these qualifiers:
     *
     * 1. `StorageLocation`
     * 2. `MaterialGroup`
     *
     * @param \TecCom\Order\TXML5\AdditionalParametersType[] $additionalParameters
     * @return self
     */
    public function setAdditionalParameters(?array $additionalParameters = null)
    {
        $this->additionalParameters = $additionalParameters;
        return $this;
    }

    /**
     * Adds as freeText
     *
     * Arbitrary information that applies to the item.
     *
     * Free text **must** be agreed between buyer and seller, otherwise the buyer will ignore it.
     *
     * @return self
     * @param \TecCom\Order\TXML5\FreeTextValueType $freeText
     */
    public function addToFreeText(\TecCom\Order\TXML5\FreeTextValueType $freeText)
    {
        $this->freeText[] = $freeText;
        return $this;
    }

    /**
     * isset freeText
     *
     * Arbitrary information that applies to the item.
     *
     * Free text **must** be agreed between buyer and seller, otherwise the buyer will ignore it.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetFreeText($index)
    {
        return isset($this->freeText[$index]);
    }

    /**
     * unset freeText
     *
     * Arbitrary information that applies to the item.
     *
     * Free text **must** be agreed between buyer and seller, otherwise the buyer will ignore it.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetFreeText($index)
    {
        unset($this->freeText[$index]);
    }

    /**
     * Gets as freeText
     *
     * Arbitrary information that applies to the item.
     *
     * Free text **must** be agreed between buyer and seller, otherwise the buyer will ignore it.
     *
     * @return \TecCom\Order\TXML5\FreeTextValueType[]
     */
    public function getFreeText()
    {
        return $this->freeText;
    }

    /**
     * Sets a new freeText
     *
     * Arbitrary information that applies to the item.
     *
     * Free text **must** be agreed between buyer and seller, otherwise the buyer will ignore it.
     *
     * @param \TecCom\Order\TXML5\FreeTextValueType[] $freeText
     * @return self
     */
    public function setFreeText(?array $freeText = null)
    {
        $this->freeText = $freeText;
        return $this;
    }
}

