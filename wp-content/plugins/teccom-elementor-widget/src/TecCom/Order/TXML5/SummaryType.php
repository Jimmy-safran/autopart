<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing SummaryType
 *
 * 
 * XSD Type: SummaryType
 */
class SummaryType
{
    /**
     * The net amount for the whole document.
     *
     * 1. This amount **must** include all allowances and charges on both header and line level
     *
     * 2. This amount **must not** include taxes.
     *
     * @var float $netAmount
     */
    private $netAmount = null;

    /**
     * The tax amount for the whole document.
     *
     * @var float $taxAmount
     */
    private $taxAmount = null;

    /**
     * The total amount for the whole document (the sum of net amount and tax amount).
     *
     * @var float $totalAmount
     */
    private $totalAmount = null;

    /**
     * Gets as netAmount
     *
     * The net amount for the whole document.
     *
     * 1. This amount **must** include all allowances and charges on both header and line level
     *
     * 2. This amount **must not** include taxes.
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
     * The net amount for the whole document.
     *
     * 1. This amount **must** include all allowances and charges on both header and line level
     *
     * 2. This amount **must not** include taxes.
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
     * Gets as taxAmount
     *
     * The tax amount for the whole document.
     *
     * @return float
     */
    public function getTaxAmount()
    {
        return $this->taxAmount;
    }

    /**
     * Sets a new taxAmount
     *
     * The tax amount for the whole document.
     *
     * @param float $taxAmount
     * @return self
     */
    public function setTaxAmount($taxAmount)
    {
        $this->taxAmount = $taxAmount;
        return $this;
    }

    /**
     * Gets as totalAmount
     *
     * The total amount for the whole document (the sum of net amount and tax amount).
     *
     * @return float
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * Sets a new totalAmount
     *
     * The total amount for the whole document (the sum of net amount and tax amount).
     *
     * @param float $totalAmount
     * @return self
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }
}

