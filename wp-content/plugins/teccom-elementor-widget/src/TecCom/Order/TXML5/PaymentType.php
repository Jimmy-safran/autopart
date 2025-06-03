<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing PaymentType
 *
 * 
 * XSD Type: Payment
 */
class PaymentType
{
    /**
     * The type of the payment.
     *
     * 1. The buyer **must** only use:
     *
     *  1. `CashOnDelivery` or
     *  2. `Invoice`.
     *
     * 2. The seller **can** use all modes.
     *
     * @var string $mode
     */
    private $mode = null;

    /**
     * The reference to another entity.
     *
     * 1. The buyer **can** use this in the order for sending a payment reference for the mode `PayBeforeOrder`.
     *
     * 2. The seller **can** use this in the availability response for sending a payment reference for the mode `PayBeforeOrder`.
     *
     * @var string $reference
     */
    private $reference = null;

    /**
     * A bank account of the seller at a financial institution to which the buyer can send money to pay for the order.
     *
     * @var \TecCom\Order\TXML5\PaymentType\FinancialInstitutionAType[] $financialInstitution
     */
    private $financialInstitution = [
        
    ];

    /**
     * Gets as mode
     *
     * The type of the payment.
     *
     * 1. The buyer **must** only use:
     *
     *  1. `CashOnDelivery` or
     *  2. `Invoice`.
     *
     * 2. The seller **can** use all modes.
     *
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Sets a new mode
     *
     * The type of the payment.
     *
     * 1. The buyer **must** only use:
     *
     *  1. `CashOnDelivery` or
     *  2. `Invoice`.
     *
     * 2. The seller **can** use all modes.
     *
     * @param string $mode
     * @return self
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
        return $this;
    }

    /**
     * Gets as reference
     *
     * The reference to another entity.
     *
     * 1. The buyer **can** use this in the order for sending a payment reference for the mode `PayBeforeOrder`.
     *
     * 2. The seller **can** use this in the availability response for sending a payment reference for the mode `PayBeforeOrder`.
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Sets a new reference
     *
     * The reference to another entity.
     *
     * 1. The buyer **can** use this in the order for sending a payment reference for the mode `PayBeforeOrder`.
     *
     * 2. The seller **can** use this in the availability response for sending a payment reference for the mode `PayBeforeOrder`.
     *
     * @param string $reference
     * @return self
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * Adds as financialInstitution
     *
     * A bank account of the seller at a financial institution to which the buyer can send money to pay for the order.
     *
     * @return self
     * @param \TecCom\Order\TXML5\PaymentType\FinancialInstitutionAType $financialInstitution
     */
    public function addToFinancialInstitution(\TecCom\Order\TXML5\PaymentType\FinancialInstitutionAType $financialInstitution)
    {
        $this->financialInstitution[] = $financialInstitution;
        return $this;
    }

    /**
     * isset financialInstitution
     *
     * A bank account of the seller at a financial institution to which the buyer can send money to pay for the order.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetFinancialInstitution($index)
    {
        return isset($this->financialInstitution[$index]);
    }

    /**
     * unset financialInstitution
     *
     * A bank account of the seller at a financial institution to which the buyer can send money to pay for the order.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetFinancialInstitution($index)
    {
        unset($this->financialInstitution[$index]);
    }

    /**
     * Gets as financialInstitution
     *
     * A bank account of the seller at a financial institution to which the buyer can send money to pay for the order.
     *
     * @return \TecCom\Order\TXML5\PaymentType\FinancialInstitutionAType[]
     */
    public function getFinancialInstitution()
    {
        return $this->financialInstitution;
    }

    /**
     * Sets a new financialInstitution
     *
     * A bank account of the seller at a financial institution to which the buyer can send money to pay for the order.
     *
     * @param \TecCom\Order\TXML5\PaymentType\FinancialInstitutionAType[] $financialInstitution
     * @return self
     */
    public function setFinancialInstitution(?array $financialInstitution = null)
    {
        $this->financialInstitution = $financialInstitution;
        return $this;
    }
}

