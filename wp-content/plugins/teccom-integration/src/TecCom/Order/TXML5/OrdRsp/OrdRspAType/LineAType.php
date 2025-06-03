<?php

namespace TecCom\Order\TXML5\OrdRsp\OrdRspAType;

/**
 * Class representing LineAType
 */
class LineAType
{
    /**
     * The position number of the line.
     *
     * 1. This number **must** be a positive integer and be greater than the position number of the previous line (if any).
     *
     * 2. The position number **must** be the same for the line itself and any subline belonging to the line.
     *
     * 3. This number **must not** be used as a reference to the line in the order.
     *
     * @var int $number
     */
    private $number = null;

    /**
     * If present, indicates that this line is a subline.
     *
     * @var \TecCom\Order\TXML5\SubLineType $subLine
     */
    private $subLine = null;

    /**
     * Information about the requested and confirmed quantity of the line.
     *
     * @var \TecCom\Order\TXML5\OrdRsp\OrdRspAType\LineAType\TotalQuantityAType $totalQuantity
     */
    private $totalQuantity = null;

    /**
     * One or more product identifiers of the requested article.
     *
     * One or more product identifiers of the requested article.
     *
     * 1. The seller **must** return every identifier that was sent by the buyer.
     *
     * 2. The seller **must** return the identifiers stored in their ERP system for the identified article.
     *
     * 3. The seller **must** return the `BuyerProductNumber` identifier as sent by the buyer.
     *
     * 4. The seller **can** return additional identifiers from their ERP system that the buyer has not sent.
     *
     * @var \TecCom\Order\TXML5\ProductIdChoiceType $productId
     */
    private $productId = null;

    /**
     * The name of the article.
     *
     * @var string $productName
     */
    private $productName = null;

    /**
     * The requested delivery date from the order.
     *
     * 1. The seller **must** copy this date from the order if it exists there on either line level or header level.
     *
     * 2. The date on line level overwrites the date on header level.
     *
     * @var \TecCom\Order\TXML5\DateType $requestedDeliveryDate
     */
    private $requestedDeliveryDate = null;

    /**
     * Information about the delivery schedule of the article.
     *
     * @var \TecCom\Order\TXML5\DeliveryInfoOrdRspType[] $deliveryInfo
     */
    private $deliveryInfo = [
        
    ];

    /**
     * Information about the difference between requested and confirmed quantity.
     *
     * @var \TecCom\Order\TXML5\QtyVarianceType $qtyVariance
     */
    private $qtyVariance = null;

    /**
     * Information about different types of prices.
     *
     * @var \TecCom\Order\TXML5\ProductPriceType $price
     */
    private $price = null;

    /**
     * An allowance or charge that applies to the line.
     *
     * @var \TecCom\Order\TXML5\AllowOrChargeType[] $allowOrCharge
     */
    private $allowOrCharge = [
        
    ];

    /**
     * A tax that applies to the line.
     *
     * The seller **must not** use this unless the line is taxed differently than the whole document.
     *
     * @var \TecCom\Order\TXML5\TaxType[] $tax
     */
    private $tax = [
        
    ];

    /**
     * A reference to another document.
     *
     * 1. The seller **must** always add a reference to the buyer's order with the qualifier `BuyerOrderNumber`. Its value **must** be the `DocumentNumber` of the buyer's order.
     *
     * 2. The seller **must** always add a reference to the buyer's order with the qualifier `SellerOrderNumber` if the order was created successfully. Its value **must** be the order number the seller has assigned to the buyer's order in their ERP system.
     *
     * 3. The seller **can** add more than one reference with the qualifier `SellerOrderNumber`, for example, if the order was split internally in their ERP system.
     *
     * @var \TecCom\Order\TXML5\ReferenceLineType[] $reference
     */
    private $reference = [
        
    ];

    /**
     * A measurement of the article.
     *
     * @var \TecCom\Order\TXML5\MeasurementsType[] $measurements
     */
    private $measurements = [
        
    ];

    /**
     * Information that is relevant for the export of the article.
     *
     * @var \TecCom\Order\TXML5\ExternalTradeType $externalTrade
     */
    private $externalTrade = null;

    /**
     * An external resource with additional information about the article.
     *
     * @var \TecCom\Order\TXML5\ExternalDocumentType[] $externalDocument
     */
    private $externalDocument = [
        
    ];

    /**
     * An additional parameter that conveys specific information that applies to the line.
     *
     * The seller **must** only use these qualifiers:
     *
     * 1. `StorageLocation`
     * 2. `MaterialGroup`
     * 3. `MinimumOrderValue`
     *
     * @var \TecCom\Order\TXML5\AdditionalParametersType[] $additionalParameters
     */
    private $additionalParameters = [
        
    ];

    /**
     * Arbitrary information that relates to the line.
     *
     * Free text **must** be agreed between buyer and seller, otherwise the buyer will ignore it.
     *
     * @var \TecCom\Order\TXML5\FreeTextValueType[] $freeText
     */
    private $freeText = [
        
    ];

    /**
     * A status information response that applies to the line.
     *
     * 1. The seller **must** send status information response to the buyer to unambiguously inform them about defined situations that occurred during the processing of order line.
     *
     * 2. For that, the seller **must** use the pre-defined TecCom status information responses or define their own.
     *
     * 3. The seller **must** communicate their own status information responses to the buyer.
     *
     * 4. The buyer **must** evaluate the status information responses to have their implementation react accordingly.
     *
     * @var \TecCom\Order\TXML5\ResponseType[] $response
     */
    private $response = [
        
    ];

    /**
     * Gets as number
     *
     * The position number of the line.
     *
     * 1. This number **must** be a positive integer and be greater than the position number of the previous line (if any).
     *
     * 2. The position number **must** be the same for the line itself and any subline belonging to the line.
     *
     * 3. This number **must not** be used as a reference to the line in the order.
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
     * The position number of the line.
     *
     * 1. This number **must** be a positive integer and be greater than the position number of the previous line (if any).
     *
     * 2. The position number **must** be the same for the line itself and any subline belonging to the line.
     *
     * 3. This number **must not** be used as a reference to the line in the order.
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
     * Gets as subLine
     *
     * If present, indicates that this line is a subline.
     *
     * @return \TecCom\Order\TXML5\SubLineType
     */
    public function getSubLine()
    {
        return $this->subLine;
    }

    /**
     * Sets a new subLine
     *
     * If present, indicates that this line is a subline.
     *
     * @param \TecCom\Order\TXML5\SubLineType $subLine
     * @return self
     */
    public function setSubLine(?\TecCom\Order\TXML5\SubLineType $subLine = null)
    {
        $this->subLine = $subLine;
        return $this;
    }

    /**
     * Gets as totalQuantity
     *
     * Information about the requested and confirmed quantity of the line.
     *
     * @return \TecCom\Order\TXML5\OrdRsp\OrdRspAType\LineAType\TotalQuantityAType
     */
    public function getTotalQuantity()
    {
        return $this->totalQuantity;
    }

    /**
     * Sets a new totalQuantity
     *
     * Information about the requested and confirmed quantity of the line.
     *
     * @param \TecCom\Order\TXML5\OrdRsp\OrdRspAType\LineAType\TotalQuantityAType $totalQuantity
     * @return self
     */
    public function setTotalQuantity(\TecCom\Order\TXML5\OrdRsp\OrdRspAType\LineAType\TotalQuantityAType $totalQuantity)
    {
        $this->totalQuantity = $totalQuantity;
        return $this;
    }

    /**
     * Gets as productId
     *
     * One or more product identifiers of the requested article.
     *
     * One or more product identifiers of the requested article.
     *
     * 1. The seller **must** return every identifier that was sent by the buyer.
     *
     * 2. The seller **must** return the identifiers stored in their ERP system for the identified article.
     *
     * 3. The seller **must** return the `BuyerProductNumber` identifier as sent by the buyer.
     *
     * 4. The seller **can** return additional identifiers from their ERP system that the buyer has not sent.
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
     * One or more product identifiers of the requested article.
     *
     * One or more product identifiers of the requested article.
     *
     * 1. The seller **must** return every identifier that was sent by the buyer.
     *
     * 2. The seller **must** return the identifiers stored in their ERP system for the identified article.
     *
     * 3. The seller **must** return the `BuyerProductNumber` identifier as sent by the buyer.
     *
     * 4. The seller **can** return additional identifiers from their ERP system that the buyer has not sent.
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
     * The name of the article.
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
     * The name of the article.
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
     * Gets as requestedDeliveryDate
     *
     * The requested delivery date from the order.
     *
     * 1. The seller **must** copy this date from the order if it exists there on either line level or header level.
     *
     * 2. The date on line level overwrites the date on header level.
     *
     * @return \TecCom\Order\TXML5\DateType
     */
    public function getRequestedDeliveryDate()
    {
        return $this->requestedDeliveryDate;
    }

    /**
     * Sets a new requestedDeliveryDate
     *
     * The requested delivery date from the order.
     *
     * 1. The seller **must** copy this date from the order if it exists there on either line level or header level.
     *
     * 2. The date on line level overwrites the date on header level.
     *
     * @param \TecCom\Order\TXML5\DateType $requestedDeliveryDate
     * @return self
     */
    public function setRequestedDeliveryDate(?\TecCom\Order\TXML5\DateType $requestedDeliveryDate = null)
    {
        $this->requestedDeliveryDate = $requestedDeliveryDate;
        return $this;
    }

    /**
     * Adds as deliveryInfo
     *
     * Information about the delivery schedule of the article.
     *
     * @return self
     * @param \TecCom\Order\TXML5\DeliveryInfoOrdRspType $deliveryInfo
     */
    public function addToDeliveryInfo(\TecCom\Order\TXML5\DeliveryInfoOrdRspType $deliveryInfo)
    {
        $this->deliveryInfo[] = $deliveryInfo;
        return $this;
    }

    /**
     * isset deliveryInfo
     *
     * Information about the delivery schedule of the article.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDeliveryInfo($index)
    {
        return isset($this->deliveryInfo[$index]);
    }

    /**
     * unset deliveryInfo
     *
     * Information about the delivery schedule of the article.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDeliveryInfo($index)
    {
        unset($this->deliveryInfo[$index]);
    }

    /**
     * Gets as deliveryInfo
     *
     * Information about the delivery schedule of the article.
     *
     * @return \TecCom\Order\TXML5\DeliveryInfoOrdRspType[]
     */
    public function getDeliveryInfo()
    {
        return $this->deliveryInfo;
    }

    /**
     * Sets a new deliveryInfo
     *
     * Information about the delivery schedule of the article.
     *
     * @param \TecCom\Order\TXML5\DeliveryInfoOrdRspType[] $deliveryInfo
     * @return self
     */
    public function setDeliveryInfo(?array $deliveryInfo = null)
    {
        $this->deliveryInfo = $deliveryInfo;
        return $this;
    }

    /**
     * Gets as qtyVariance
     *
     * Information about the difference between requested and confirmed quantity.
     *
     * @return \TecCom\Order\TXML5\QtyVarianceType
     */
    public function getQtyVariance()
    {
        return $this->qtyVariance;
    }

    /**
     * Sets a new qtyVariance
     *
     * Information about the difference between requested and confirmed quantity.
     *
     * @param \TecCom\Order\TXML5\QtyVarianceType $qtyVariance
     * @return self
     */
    public function setQtyVariance(?\TecCom\Order\TXML5\QtyVarianceType $qtyVariance = null)
    {
        $this->qtyVariance = $qtyVariance;
        return $this;
    }

    /**
     * Gets as price
     *
     * Information about different types of prices.
     *
     * @return \TecCom\Order\TXML5\ProductPriceType
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets a new price
     *
     * Information about different types of prices.
     *
     * @param \TecCom\Order\TXML5\ProductPriceType $price
     * @return self
     */
    public function setPrice(?\TecCom\Order\TXML5\ProductPriceType $price = null)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Adds as allowOrCharge
     *
     * An allowance or charge that applies to the line.
     *
     * @return self
     * @param \TecCom\Order\TXML5\AllowOrChargeType $allowOrCharge
     */
    public function addToAllowOrCharge(\TecCom\Order\TXML5\AllowOrChargeType $allowOrCharge)
    {
        $this->allowOrCharge[] = $allowOrCharge;
        return $this;
    }

    /**
     * isset allowOrCharge
     *
     * An allowance or charge that applies to the line.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAllowOrCharge($index)
    {
        return isset($this->allowOrCharge[$index]);
    }

    /**
     * unset allowOrCharge
     *
     * An allowance or charge that applies to the line.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAllowOrCharge($index)
    {
        unset($this->allowOrCharge[$index]);
    }

    /**
     * Gets as allowOrCharge
     *
     * An allowance or charge that applies to the line.
     *
     * @return \TecCom\Order\TXML5\AllowOrChargeType[]
     */
    public function getAllowOrCharge()
    {
        return $this->allowOrCharge;
    }

    /**
     * Sets a new allowOrCharge
     *
     * An allowance or charge that applies to the line.
     *
     * @param \TecCom\Order\TXML5\AllowOrChargeType[] $allowOrCharge
     * @return self
     */
    public function setAllowOrCharge(?array $allowOrCharge = null)
    {
        $this->allowOrCharge = $allowOrCharge;
        return $this;
    }

    /**
     * Adds as tax
     *
     * A tax that applies to the line.
     *
     * The seller **must not** use this unless the line is taxed differently than the whole document.
     *
     * @return self
     * @param \TecCom\Order\TXML5\TaxType $tax
     */
    public function addToTax(\TecCom\Order\TXML5\TaxType $tax)
    {
        $this->tax[] = $tax;
        return $this;
    }

    /**
     * isset tax
     *
     * A tax that applies to the line.
     *
     * The seller **must not** use this unless the line is taxed differently than the whole document.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTax($index)
    {
        return isset($this->tax[$index]);
    }

    /**
     * unset tax
     *
     * A tax that applies to the line.
     *
     * The seller **must not** use this unless the line is taxed differently than the whole document.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTax($index)
    {
        unset($this->tax[$index]);
    }

    /**
     * Gets as tax
     *
     * A tax that applies to the line.
     *
     * The seller **must not** use this unless the line is taxed differently than the whole document.
     *
     * @return \TecCom\Order\TXML5\TaxType[]
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Sets a new tax
     *
     * A tax that applies to the line.
     *
     * The seller **must not** use this unless the line is taxed differently than the whole document.
     *
     * @param \TecCom\Order\TXML5\TaxType[] $tax
     * @return self
     */
    public function setTax(?array $tax = null)
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * Adds as reference
     *
     * A reference to another document.
     *
     * 1. The seller **must** always add a reference to the buyer's order with the qualifier `BuyerOrderNumber`. Its value **must** be the `DocumentNumber` of the buyer's order.
     *
     * 2. The seller **must** always add a reference to the buyer's order with the qualifier `SellerOrderNumber` if the order was created successfully. Its value **must** be the order number the seller has assigned to the buyer's order in their ERP system.
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
     * 2. The seller **must** always add a reference to the buyer's order with the qualifier `SellerOrderNumber` if the order was created successfully. Its value **must** be the order number the seller has assigned to the buyer's order in their ERP system.
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
     * 2. The seller **must** always add a reference to the buyer's order with the qualifier `SellerOrderNumber` if the order was created successfully. Its value **must** be the order number the seller has assigned to the buyer's order in their ERP system.
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
     * 2. The seller **must** always add a reference to the buyer's order with the qualifier `SellerOrderNumber` if the order was created successfully. Its value **must** be the order number the seller has assigned to the buyer's order in their ERP system.
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
     * 2. The seller **must** always add a reference to the buyer's order with the qualifier `SellerOrderNumber` if the order was created successfully. Its value **must** be the order number the seller has assigned to the buyer's order in their ERP system.
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
     * A measurement of the article.
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
     * A measurement of the article.
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
     * A measurement of the article.
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
     * A measurement of the article.
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
     * A measurement of the article.
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
     * Information that is relevant for the export of the article.
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
     * Information that is relevant for the export of the article.
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
     * An external resource with additional information about the article.
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
     * An external resource with additional information about the article.
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
     * An external resource with additional information about the article.
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
     * An external resource with additional information about the article.
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
     * An external resource with additional information about the article.
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
     * An additional parameter that conveys specific information that applies to the line.
     *
     * The seller **must** only use these qualifiers:
     *
     * 1. `StorageLocation`
     * 2. `MaterialGroup`
     * 3. `MinimumOrderValue`
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
     * An additional parameter that conveys specific information that applies to the line.
     *
     * The seller **must** only use these qualifiers:
     *
     * 1. `StorageLocation`
     * 2. `MaterialGroup`
     * 3. `MinimumOrderValue`
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
     * An additional parameter that conveys specific information that applies to the line.
     *
     * The seller **must** only use these qualifiers:
     *
     * 1. `StorageLocation`
     * 2. `MaterialGroup`
     * 3. `MinimumOrderValue`
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
     * An additional parameter that conveys specific information that applies to the line.
     *
     * The seller **must** only use these qualifiers:
     *
     * 1. `StorageLocation`
     * 2. `MaterialGroup`
     * 3. `MinimumOrderValue`
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
     * An additional parameter that conveys specific information that applies to the line.
     *
     * The seller **must** only use these qualifiers:
     *
     * 1. `StorageLocation`
     * 2. `MaterialGroup`
     * 3. `MinimumOrderValue`
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
     * Arbitrary information that relates to the line.
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
     * Arbitrary information that relates to the line.
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
     * Arbitrary information that relates to the line.
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
     * Arbitrary information that relates to the line.
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
     * Arbitrary information that relates to the line.
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

    /**
     * Adds as response
     *
     * A status information response that applies to the line.
     *
     * 1. The seller **must** send status information response to the buyer to unambiguously inform them about defined situations that occurred during the processing of order line.
     *
     * 2. For that, the seller **must** use the pre-defined TecCom status information responses or define their own.
     *
     * 3. The seller **must** communicate their own status information responses to the buyer.
     *
     * 4. The buyer **must** evaluate the status information responses to have their implementation react accordingly.
     *
     * @return self
     * @param \TecCom\Order\TXML5\ResponseType $response
     */
    public function addToResponse(\TecCom\Order\TXML5\ResponseType $response)
    {
        $this->response[] = $response;
        return $this;
    }

    /**
     * isset response
     *
     * A status information response that applies to the line.
     *
     * 1. The seller **must** send status information response to the buyer to unambiguously inform them about defined situations that occurred during the processing of order line.
     *
     * 2. For that, the seller **must** use the pre-defined TecCom status information responses or define their own.
     *
     * 3. The seller **must** communicate their own status information responses to the buyer.
     *
     * 4. The buyer **must** evaluate the status information responses to have their implementation react accordingly.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetResponse($index)
    {
        return isset($this->response[$index]);
    }

    /**
     * unset response
     *
     * A status information response that applies to the line.
     *
     * 1. The seller **must** send status information response to the buyer to unambiguously inform them about defined situations that occurred during the processing of order line.
     *
     * 2. For that, the seller **must** use the pre-defined TecCom status information responses or define their own.
     *
     * 3. The seller **must** communicate their own status information responses to the buyer.
     *
     * 4. The buyer **must** evaluate the status information responses to have their implementation react accordingly.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetResponse($index)
    {
        unset($this->response[$index]);
    }

    /**
     * Gets as response
     *
     * A status information response that applies to the line.
     *
     * 1. The seller **must** send status information response to the buyer to unambiguously inform them about defined situations that occurred during the processing of order line.
     *
     * 2. For that, the seller **must** use the pre-defined TecCom status information responses or define their own.
     *
     * 3. The seller **must** communicate their own status information responses to the buyer.
     *
     * 4. The buyer **must** evaluate the status information responses to have their implementation react accordingly.
     *
     * @return \TecCom\Order\TXML5\ResponseType[]
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Sets a new response
     *
     * A status information response that applies to the line.
     *
     * 1. The seller **must** send status information response to the buyer to unambiguously inform them about defined situations that occurred during the processing of order line.
     *
     * 2. For that, the seller **must** use the pre-defined TecCom status information responses or define their own.
     *
     * 3. The seller **must** communicate their own status information responses to the buyer.
     *
     * 4. The buyer **must** evaluate the status information responses to have their implementation react accordingly.
     *
     * @param \TecCom\Order\TXML5\ResponseType[] $response
     * @return self
     */
    public function setResponse(?array $response = null)
    {
        $this->response = $response;
        return $this;
    }
}

