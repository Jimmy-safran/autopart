<?php

namespace TecCom\Order\TXML5\AvaReq\AvaReqAType;

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
     * Indicates to the seller if the buyer allows them to return alternative articles.
     *
     * @var bool $productChangeAllowed
     */
    private $productChangeAllowed = null;

    /**
     * Information about different types of prices.
     *
     * Any prices the buyer sends in an order have just informational value unless there is some sort of agreement between buyer and seller.
     *
     * @var \TecCom\Order\TXML5\ProductPriceType $price
     */
    private $price = null;

    /**
     * An additional parameter that conveys specific information that applies to the line.
     *
     * The buyer **must** only use these qualifiers:
     *
     * 1. `PromotionCode`
     * 2. `StorageLocation`
     *
     * @var \TecCom\Order\TXML5\AdditionalParametersType[] $additionalParameters
     */
    private $additionalParameters = [
        
    ];

    /**
     * Arbitrary information that relates to the line.
     *
     * Free text **must** be agreed between buyer and seller, otherwise the seller will ignore it.
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
     * Gets as productChangeAllowed
     *
     * Indicates to the seller if the buyer allows them to return alternative articles.
     *
     * @return bool
     */
    public function getProductChangeAllowed()
    {
        return $this->productChangeAllowed;
    }

    /**
     * Sets a new productChangeAllowed
     *
     * Indicates to the seller if the buyer allows them to return alternative articles.
     *
     * @param bool $productChangeAllowed
     * @return self
     */
    public function setProductChangeAllowed($productChangeAllowed)
    {
        $this->productChangeAllowed = $productChangeAllowed;
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
     * Adds as additionalParameters
     *
     * An additional parameter that conveys specific information that applies to the line.
     *
     * The buyer **must** only use these qualifiers:
     *
     * 1. `PromotionCode`
     * 2. `StorageLocation`
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
     * The buyer **must** only use these qualifiers:
     *
     * 1. `PromotionCode`
     * 2. `StorageLocation`
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
     * The buyer **must** only use these qualifiers:
     *
     * 1. `PromotionCode`
     * 2. `StorageLocation`
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
     * The buyer **must** only use these qualifiers:
     *
     * 1. `PromotionCode`
     * 2. `StorageLocation`
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
     * The buyer **must** only use these qualifiers:
     *
     * 1. `PromotionCode`
     * 2. `StorageLocation`
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
     * Free text **must** be agreed between buyer and seller, otherwise the seller will ignore it.
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
     * Free text **must** be agreed between buyer and seller, otherwise the seller will ignore it.
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
     * Free text **must** be agreed between buyer and seller, otherwise the seller will ignore it.
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
     * Free text **must** be agreed between buyer and seller, otherwise the seller will ignore it.
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
     * Free text **must** be agreed between buyer and seller, otherwise the seller will ignore it.
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

