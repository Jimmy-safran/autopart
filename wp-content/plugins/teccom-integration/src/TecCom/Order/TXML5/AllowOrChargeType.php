<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing AllowOrChargeType
 *
 * 
 * XSD Type: AllowOrChargeType
 */
class AllowOrChargeType
{
    /**
     * The number giving the order of this allowance or charge in a calculation sequence.
     *
     * 1. This **must** be used if there are multiple allowances or charges and the calculation depends on the order in which allowances or charges are applied.
     *
     * 2. Multiple allowances or charges with the same sequence number **must** be applied to the same base amount.
     *
     * @var int $sequenceNumber
     */
    private $sequenceNumber = null;

    /**
     * Defines an allowance.
     *
     * @var \TecCom\Order\TXML5\AllowOrChargeType\AllowanceAType $allowance
     */
    private $allowance = null;

    /**
     * Defines a charge.
     *
     * @var \TecCom\Order\TXML5\AllowOrChargeType\ChargeAType $charge
     */
    private $charge = null;

    /**
     * The reference the seller uses internally for the allowance or charge.
     *
     * @var string $internalReference
     */
    private $internalReference = null;

    /**
     * The human-readable description of the allowance or charge.
     *
     * @var string $description
     */
    private $description = null;

    /**
     * The amount of the allowance or charge as a percentage of the base amount.
     *
     * This **must not** be used if the allowance or charge is of a type that can't be given as a percentage.
     *
     * @var float $percent
     */
    private $percent = null;

    /**
     * The amount of the allowance or charge as an absolute monetary value calculated from the base amount.
     *
     * 1. This **can** be used in addition to `Percent`.
     *
     * 2. It **must** be used if the allowance or charge is of a type that can't be given as a percentage.
     *
     * @var float $amount
     */
    private $amount = null;

    /**
     * Tax information for this allowance or charge.
     *
     * This **must not** be used unless the tax of the allowance or charge is different than the one specified for the whole document.
     *
     * @var \TecCom\Order\TXML5\TaxType $tax
     */
    private $tax = null;

    /**
     * Gets as sequenceNumber
     *
     * The number giving the order of this allowance or charge in a calculation sequence.
     *
     * 1. This **must** be used if there are multiple allowances or charges and the calculation depends on the order in which allowances or charges are applied.
     *
     * 2. Multiple allowances or charges with the same sequence number **must** be applied to the same base amount.
     *
     * @return int
     */
    public function getSequenceNumber()
    {
        return $this->sequenceNumber;
    }

    /**
     * Sets a new sequenceNumber
     *
     * The number giving the order of this allowance or charge in a calculation sequence.
     *
     * 1. This **must** be used if there are multiple allowances or charges and the calculation depends on the order in which allowances or charges are applied.
     *
     * 2. Multiple allowances or charges with the same sequence number **must** be applied to the same base amount.
     *
     * @param int $sequenceNumber
     * @return self
     */
    public function setSequenceNumber($sequenceNumber)
    {
        $this->sequenceNumber = $sequenceNumber;
        return $this;
    }

    /**
     * Gets as allowance
     *
     * Defines an allowance.
     *
     * @return \TecCom\Order\TXML5\AllowOrChargeType\AllowanceAType
     */
    public function getAllowance()
    {
        return $this->allowance;
    }

    /**
     * Sets a new allowance
     *
     * Defines an allowance.
     *
     * @param \TecCom\Order\TXML5\AllowOrChargeType\AllowanceAType $allowance
     * @return self
     */
    public function setAllowance(?\TecCom\Order\TXML5\AllowOrChargeType\AllowanceAType $allowance = null)
    {
        $this->allowance = $allowance;
        return $this;
    }

    /**
     * Gets as charge
     *
     * Defines a charge.
     *
     * @return \TecCom\Order\TXML5\AllowOrChargeType\ChargeAType
     */
    public function getCharge()
    {
        return $this->charge;
    }

    /**
     * Sets a new charge
     *
     * Defines a charge.
     *
     * @param \TecCom\Order\TXML5\AllowOrChargeType\ChargeAType $charge
     * @return self
     */
    public function setCharge(?\TecCom\Order\TXML5\AllowOrChargeType\ChargeAType $charge = null)
    {
        $this->charge = $charge;
        return $this;
    }

    /**
     * Gets as internalReference
     *
     * The reference the seller uses internally for the allowance or charge.
     *
     * @return string
     */
    public function getInternalReference()
    {
        return $this->internalReference;
    }

    /**
     * Sets a new internalReference
     *
     * The reference the seller uses internally for the allowance or charge.
     *
     * @param string $internalReference
     * @return self
     */
    public function setInternalReference($internalReference)
    {
        $this->internalReference = $internalReference;
        return $this;
    }

    /**
     * Gets as description
     *
     * The human-readable description of the allowance or charge.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description
     *
     * The human-readable description of the allowance or charge.
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Gets as percent
     *
     * The amount of the allowance or charge as a percentage of the base amount.
     *
     * This **must not** be used if the allowance or charge is of a type that can't be given as a percentage.
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
     * The amount of the allowance or charge as a percentage of the base amount.
     *
     * This **must not** be used if the allowance or charge is of a type that can't be given as a percentage.
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
     * The amount of the allowance or charge as an absolute monetary value calculated from the base amount.
     *
     * 1. This **can** be used in addition to `Percent`.
     *
     * 2. It **must** be used if the allowance or charge is of a type that can't be given as a percentage.
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
     * The amount of the allowance or charge as an absolute monetary value calculated from the base amount.
     *
     * 1. This **can** be used in addition to `Percent`.
     *
     * 2. It **must** be used if the allowance or charge is of a type that can't be given as a percentage.
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
     * Gets as tax
     *
     * Tax information for this allowance or charge.
     *
     * This **must not** be used unless the tax of the allowance or charge is different than the one specified for the whole document.
     *
     * @return \TecCom\Order\TXML5\TaxType
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Sets a new tax
     *
     * Tax information for this allowance or charge.
     *
     * This **must not** be used unless the tax of the allowance or charge is different than the one specified for the whole document.
     *
     * @param \TecCom\Order\TXML5\TaxType $tax
     * @return self
     */
    public function setTax(?\TecCom\Order\TXML5\TaxType $tax = null)
    {
        $this->tax = $tax;
        return $this;
    }
}

