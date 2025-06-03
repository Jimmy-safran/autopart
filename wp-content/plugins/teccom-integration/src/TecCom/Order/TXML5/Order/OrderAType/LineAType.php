<?php

namespace TecCom\Order\TXML5\Order\OrderAType;

/**
 * Class representing LineAType
 */
class LineAType
{
    /**
     * The position number of the line.
     *
     * This number **must** be a positive integer and be greater than the position number of the previous line (if any).
     *
     * @var int $number
     */
    private $number = null;

    /**
     * Information about the requested quantity.
     *
     * @var \TecCom\Order\TXML5\QuantityType $quantity
     */
    private $quantity = null;

    /**
     * One or more product identifiers of the requested article.
     *
     * The seller **must** search for the article in their ERP system in this order:
     *
     * 1. `Ean`
     * 2. `ProductNumber`
     * 3. `BuyerProductNumber`
     * 4. `AdditionalProductId` (OENumber)
     * 5. `AdditionalProductId` (TradeNumber).
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
     * The date when the buyer wants to have this article delivered.
     *
     * 1. This date overwrites the requested delivery date from the processing instructions.
     *
     * 2. It is only a refinement of the delivery window defined by the chosen dispatch mode from the processing instructions.
     *
     * 3. The date **must** lie inside this delivery window, otherwise the seller **may** ignore it.
     *
     * **Example**: for the dispatch mode `Road` the seller specifies a delivery window of 3 to 5 days. If the order date is `2024-01-09`, then the earliest possible delivery date would be `2024-01-12`and the latest possible delivery date would be `2024-01-16` (based on working days from Monday to Friday). The requested delivery date therefore must lie in the window between the earliest and latest delivery date.
     *
     * @var \TecCom\Order\TXML5\DateType $requestedDeliveryDate
     */
    private $requestedDeliveryDate = null;

    /**
     * Information about different types of prices.
     *
     * Any prices the buyer sends in an order have just informational value unless there is some sort of agreement between buyer and seller.
     *
     * @var \TecCom\Order\TXML5\ProductPriceType $price
     */
    private $price = null;

    /**
     * The processing instructions the seller **must** follow when processing the line.
     *
     * @var \TecCom\Order\TXML5\ItemProcessingType $itemProcessing
     */
    private $itemProcessing = null;

    /**
     * An additional parameter that conveys specific information that applies to the line.
     *
     * Only certain parameters **must** be used by the buyer as outlined in the business rules.
     *
     * @var \TecCom\Order\TXML5\AdditionalParametersType[] $additionalParameters
     */
    private $additionalParameters = [
        
    ];

    /**
     * Arbitrary information that relates to the line.
     *
     * Free text **must** be agreed between buyer and supplier, otherwise the supplier will ignore it.
     *
     * @var \TecCom\Order\TXML5\FreeTextValueType[] $freeText
     */
    private $freeText = [
        
    ];

    /**
     * Gets as number
     *
     * The position number of the line.
     *
     * This number **must** be a positive integer and be greater than the position number of the previous line (if any).
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
     * This number **must** be a positive integer and be greater than the position number of the previous line (if any).
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
     * Gets as quantity
     *
     * Information about the requested quantity.
     *
     * @return \TecCom\Order\TXML5\QuantityType
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets a new quantity
     *
     * Information about the requested quantity.
     *
     * @param \TecCom\Order\TXML5\QuantityType $quantity
     * @return self
     */
    public function setQuantity(\TecCom\Order\TXML5\QuantityType $quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Gets as productId
     *
     * One or more product identifiers of the requested article.
     *
     * The seller **must** search for the article in their ERP system in this order:
     *
     * 1. `Ean`
     * 2. `ProductNumber`
     * 3. `BuyerProductNumber`
     * 4. `AdditionalProductId` (OENumber)
     * 5. `AdditionalProductId` (TradeNumber).
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
     * The seller **must** search for the article in their ERP system in this order:
     *
     * 1. `Ean`
     * 2. `ProductNumber`
     * 3. `BuyerProductNumber`
     * 4. `AdditionalProductId` (OENumber)
     * 5. `AdditionalProductId` (TradeNumber).
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
     * The date when the buyer wants to have this article delivered.
     *
     * 1. This date overwrites the requested delivery date from the processing instructions.
     *
     * 2. It is only a refinement of the delivery window defined by the chosen dispatch mode from the processing instructions.
     *
     * 3. The date **must** lie inside this delivery window, otherwise the seller **may** ignore it.
     *
     * **Example**: for the dispatch mode `Road` the seller specifies a delivery window of 3 to 5 days. If the order date is `2024-01-09`, then the earliest possible delivery date would be `2024-01-12`and the latest possible delivery date would be `2024-01-16` (based on working days from Monday to Friday). The requested delivery date therefore must lie in the window between the earliest and latest delivery date.
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
     * The date when the buyer wants to have this article delivered.
     *
     * 1. This date overwrites the requested delivery date from the processing instructions.
     *
     * 2. It is only a refinement of the delivery window defined by the chosen dispatch mode from the processing instructions.
     *
     * 3. The date **must** lie inside this delivery window, otherwise the seller **may** ignore it.
     *
     * **Example**: for the dispatch mode `Road` the seller specifies a delivery window of 3 to 5 days. If the order date is `2024-01-09`, then the earliest possible delivery date would be `2024-01-12`and the latest possible delivery date would be `2024-01-16` (based on working days from Monday to Friday). The requested delivery date therefore must lie in the window between the earliest and latest delivery date.
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
     * Gets as price
     *
     * Information about different types of prices.
     *
     * Any prices the buyer sends in an order have just informational value unless there is some sort of agreement between buyer and seller.
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
     * Any prices the buyer sends in an order have just informational value unless there is some sort of agreement between buyer and seller.
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
     * Gets as itemProcessing
     *
     * The processing instructions the seller **must** follow when processing the line.
     *
     * @return \TecCom\Order\TXML5\ItemProcessingType
     */
    public function getItemProcessing()
    {
        return $this->itemProcessing;
    }

    /**
     * Sets a new itemProcessing
     *
     * The processing instructions the seller **must** follow when processing the line.
     *
     * @param \TecCom\Order\TXML5\ItemProcessingType $itemProcessing
     * @return self
     */
    public function setItemProcessing(\TecCom\Order\TXML5\ItemProcessingType $itemProcessing)
    {
        $this->itemProcessing = $itemProcessing;
        return $this;
    }

    /**
     * Adds as additionalParameters
     *
     * An additional parameter that conveys specific information that applies to the line.
     *
     * Only certain parameters **must** be used by the buyer as outlined in the business rules.
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
     * Only certain parameters **must** be used by the buyer as outlined in the business rules.
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
     * Only certain parameters **must** be used by the buyer as outlined in the business rules.
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
     * Only certain parameters **must** be used by the buyer as outlined in the business rules.
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
     * Only certain parameters **must** be used by the buyer as outlined in the business rules.
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
     * Free text **must** be agreed between buyer and supplier, otherwise the supplier will ignore it.
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
     * Free text **must** be agreed between buyer and supplier, otherwise the supplier will ignore it.
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
     * Free text **must** be agreed between buyer and supplier, otherwise the supplier will ignore it.
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
     * Free text **must** be agreed between buyer and supplier, otherwise the supplier will ignore it.
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
     * Free text **must** be agreed between buyer and supplier, otherwise the supplier will ignore it.
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

