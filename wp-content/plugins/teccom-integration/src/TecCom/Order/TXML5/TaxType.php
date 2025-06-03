<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing TaxType
 *
 * 
 * XSD Type: TaxType
 */
class TaxType
{
    /**
     * The type of the tax.
     *
     * @var string $code
     */
    private $code = null;

    /**
     * The category of the tax.
     *
     * @var string $category
     */
    private $category = null;

    /**
     * The tax rate in percent.
     *
     * @var float $percent
     */
    private $percent = null;

    /**
     * The tax as an absolute monetary value.
     *
     * This **must** be used if, and only if, two or more tax rates are used.
     *
     * @var float $amount
     */
    private $amount = null;

    /**
     * The absolute monetary value that is the base amount for the tax.
     *
     * This **must** be used if, and only if, two or more tax rates are used or if the tax applies to a core charge.
     *
     * @var float $taxableAmount
     */
    private $taxableAmount = null;

    /**
     * Gets as code
     *
     * The type of the tax.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets a new code
     *
     * The type of the tax.
     *
     * @param string $code
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Gets as category
     *
     * The category of the tax.
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
     * The category of the tax.
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
     * Gets as percent
     *
     * The tax rate in percent.
     *
     * @return float
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * Sets a new percent
     *
     * The tax rate in percent.
     *
     * @param float $percent
     * @return self
     */
    public function setPercent($percent)
    {
        $this->percent = $percent;
        return $this;
    }

    /**
     * Gets as amount
     *
     * The tax as an absolute monetary value.
     *
     * This **must** be used if, and only if, two or more tax rates are used.
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets a new amount
     *
     * The tax as an absolute monetary value.
     *
     * This **must** be used if, and only if, two or more tax rates are used.
     *
     * @param float $amount
     * @return self
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Gets as taxableAmount
     *
     * The absolute monetary value that is the base amount for the tax.
     *
     * This **must** be used if, and only if, two or more tax rates are used or if the tax applies to a core charge.
     *
     * @return float
     */
    public function getTaxableAmount()
    {
        return $this->taxableAmount;
    }

    /**
     * Sets a new taxableAmount
     *
     * The absolute monetary value that is the base amount for the tax.
     *
     * This **must** be used if, and only if, two or more tax rates are used or if the tax applies to a core charge.
     *
     * @param float $taxableAmount
     * @return self
     */
    public function setTaxableAmount($taxableAmount)
    {
        $this->taxableAmount = $taxableAmount;
        return $this;
    }
}

