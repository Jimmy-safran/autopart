<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing ProductPriceType
 *
 * 
 * XSD Type: ProductPriceType
 */
class ProductPriceType
{
    /**
     * The price for one unit of the article.
     *
     * 1. Allowances and charges **must** be included in this price
     *
     * 2. Taxes **must not** be included in this price.
     *
     * @var float $netPrice
     */
    private $netPrice = null;

    /**
     * The price for one unit of the article.
     *
     * 1. Allowances and charges **must not** be included in this price.
     *
     * 2. Taxes **must not** be included in this price.
     *
     * @var float $grossPrice
     */
    private $grossPrice = null;

    /**
     * The price for the confirmed quantity of units of the article.
     *
     * 1. Allowances and charges **must** be included in this price
     *
     * 2. Taxes **must not** be included in this price.
     *
     * @var float $netAmount
     */
    private $netAmount = null;

    /**
     * The price for the confirmed quantity of units of the article.
     *
     * 1. Allowances and charges **must not** be included in this price.
     *
     * 2. Taxes **must not** be included in this price.
     *
     * @var float $grossAmount
     */
    private $grossAmount = null;

    /**
     * An additional type of price which does not necessarily apply to one unit or the confirmed quantity of units.
     *
     * @var \TecCom\Order\TXML5\PriceType[] $additionalPrice
     */
    private $additionalPrice = [
        
    ];

    /**
     * Gets as netPrice
     *
     * The price for one unit of the article.
     *
     * 1. Allowances and charges **must** be included in this price
     *
     * 2. Taxes **must not** be included in this price.
     *
     * @return float
     */
    public function getNetPrice()
    {
        return $this->netPrice;
    }

    /**
     * Sets a new netPrice
     *
     * The price for one unit of the article.
     *
     * 1. Allowances and charges **must** be included in this price
     *
     * 2. Taxes **must not** be included in this price.
     *
     * @param float $netPrice
     * @return self
     */
    public function setNetPrice($netPrice)
    {
        $this->netPrice = $netPrice;
        return $this;
    }

    /**
     * Gets as grossPrice
     *
     * The price for one unit of the article.
     *
     * 1. Allowances and charges **must not** be included in this price.
     *
     * 2. Taxes **must not** be included in this price.
     *
     * @return float
     */
    public function getGrossPrice()
    {
        return $this->grossPrice;
    }

    /**
     * Sets a new grossPrice
     *
     * The price for one unit of the article.
     *
     * 1. Allowances and charges **must not** be included in this price.
     *
     * 2. Taxes **must not** be included in this price.
     *
     * @param float $grossPrice
     * @return self
     */
    public function setGrossPrice($grossPrice)
    {
        $this->grossPrice = $grossPrice;
        return $this;
    }

    /**
     * Gets as netAmount
     *
     * The price for the confirmed quantity of units of the article.
     *
     * 1. Allowances and charges **must** be included in this price
     *
     * 2. Taxes **must not** be included in this price.
     *
     * @return float
     */
    public function getNetAmount()
    {
        return $this->netAmount;
    }

    /**
     * Sets a new netAmount
     *
     * The price for the confirmed quantity of units of the article.
     *
     * 1. Allowances and charges **must** be included in this price
     *
     * 2. Taxes **must not** be included in this price.
     *
     * @param float $netAmount
     * @return self
     */
    public function setNetAmount($netAmount)
    {
        $this->netAmount = $netAmount;
        return $this;
    }

    /**
     * Gets as grossAmount
     *
     * The price for the confirmed quantity of units of the article.
     *
     * 1. Allowances and charges **must not** be included in this price.
     *
     * 2. Taxes **must not** be included in this price.
     *
     * @return float
     */
    public function getGrossAmount()
    {
        return $this->grossAmount;
    }

    /**
     * Sets a new grossAmount
     *
     * The price for the confirmed quantity of units of the article.
     *
     * 1. Allowances and charges **must not** be included in this price.
     *
     * 2. Taxes **must not** be included in this price.
     *
     * @param float $grossAmount
     * @return self
     */
    public function setGrossAmount($grossAmount)
    {
        $this->grossAmount = $grossAmount;
        return $this;
    }

    /**
     * Adds as additionalPrice
     *
     * An additional type of price which does not necessarily apply to one unit or the confirmed quantity of units.
     *
     * @return self
     * @param \TecCom\Order\TXML5\PriceType $additionalPrice
     */
    public function addToAdditionalPrice(\TecCom\Order\TXML5\PriceType $additionalPrice)
    {
        $this->additionalPrice[] = $additionalPrice;
        return $this;
    }

    /**
     * isset additionalPrice
     *
     * An additional type of price which does not necessarily apply to one unit or the confirmed quantity of units.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAdditionalPrice($index)
    {
        return isset($this->additionalPrice[$index]);
    }

    /**
     * unset additionalPrice
     *
     * An additional type of price which does not necessarily apply to one unit or the confirmed quantity of units.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAdditionalPrice($index)
    {
        unset($this->additionalPrice[$index]);
    }

    /**
     * Gets as additionalPrice
     *
     * An additional type of price which does not necessarily apply to one unit or the confirmed quantity of units.
     *
     * @return \TecCom\Order\TXML5\PriceType[]
     */
    public function getAdditionalPrice()
    {
        return $this->additionalPrice;
    }

    /**
     * Sets a new additionalPrice
     *
     * An additional type of price which does not necessarily apply to one unit or the confirmed quantity of units.
     *
     * @param \TecCom\Order\TXML5\PriceType[] $additionalPrice
     * @return self
     */
    public function setAdditionalPrice(?array $additionalPrice = null)
    {
        $this->additionalPrice = $additionalPrice;
        return $this;
    }
}

