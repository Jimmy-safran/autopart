<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing PriceType
 *
 * 
 * XSD Type: PriceType
 */
class PriceType
{
    /**
     * The type of the price.
     *
     * @var string $category
     */
    private $category = null;

    /**
     * The quantity to which this price applies.
     *
     * @var float $quantity
     */
    private $quantity = null;

    /**
     * The unit of measurement for the given quantity.
     *
     * @var string $uoM
     */
    private $uoM = null;

    /**
     * The price for one unit of the article.
     *
     * 1. Allowances and charges **must** be included in this price.
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
     * The price for the given quantity of units of the article.
     *
     * 1. Allowances and charges **must** be included in this price.
     *
     * 2. Taxes **must not** be included in this price.
     *
     * @var float $netAmount
     */
    private $netAmount = null;

    /**
     * The price for the given quantity of units of the article.
     *
     * 1. Allowances and charges **must not** be included in this price.
     *
     * 2. Taxes **must not** be included in this price.
     *
     * @var float $grossAmount
     */
    private $grossAmount = null;

    /**
     * The currency in which this price is stated.
     *
     * This **must** be omitted if the currency is the same as the document's currency.
     *
     * @var string $currency
     */
    private $currency = null;

    /**
     * Gets as category
     *
     * The type of the price.
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets a new category
     *
     * The type of the price.
     *
     * @param string $category
     * @return self
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Gets as quantity
     *
     * The quantity to which this price applies.
     *
     * @return float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets a new quantity
     *
     * The quantity to which this price applies.
     *
     * @param float $quantity
     * @return self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Gets as uoM
     *
     * The unit of measurement for the given quantity.
     *
     * @return string
     */
    public function getUoM()
    {
        return $this->uoM;
    }

    /**
     * Sets a new uoM
     *
     * The unit of measurement for the given quantity.
     *
     * @param string $uoM
     * @return self
     */
    public function setUoM($uoM)
    {
        $this->uoM = $uoM;
        return $this;
    }

    /**
     * Gets as netPrice
     *
     * The price for one unit of the article.
     *
     * 1. Allowances and charges **must** be included in this price.
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
     * 1. Allowances and charges **must** be included in this price.
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
     * The price for the given quantity of units of the article.
     *
     * 1. Allowances and charges **must** be included in this price.
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
     * The price for the given quantity of units of the article.
     *
     * 1. Allowances and charges **must** be included in this price.
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
     * The price for the given quantity of units of the article.
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
     * The price for the given quantity of units of the article.
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
     * Gets as currency
     *
     * The currency in which this price is stated.
     *
     * This **must** be omitted if the currency is the same as the document's currency.
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Sets a new currency
     *
     * The currency in which this price is stated.
     *
     * This **must** be omitted if the currency is the same as the document's currency.
     *
     * @param string $currency
     * @return self
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }
}

