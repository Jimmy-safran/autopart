<?php

namespace TecCom\Order\TXML5\PaymentType;

/**
 * Class representing FinancialInstitutionAType
 */
class FinancialInstitutionAType
{
    /**
     * The type of the financial institution.
     *
     * @var string $type
     */
    private $type = null;

    /**
     * The name of the financial institution.
     *
     * @var string $name
     */
    private $name = null;

    /**
     * The name of the account holder.
     *
     * @var string $accountHolder
     */
    private $accountHolder = null;

    /**
     * The international bank account number.
     *
     * @var string $iBAN
     */
    private $iBAN = null;

    /**
     * The business identifier code of the financial institution.
     *
     * @var string $sWIFTBIC
     */
    private $sWIFTBIC = null;

    /**
     * Gets as type
     *
     * The type of the financial institution.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets a new type
     *
     * The type of the financial institution.
     *
     * @param string $type
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Gets as name
     *
     * The name of the financial institution.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets a new name
     *
     * The name of the financial institution.
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Gets as accountHolder
     *
     * The name of the account holder.
     *
     * @return string
     */
    public function getAccountHolder()
    {
        return $this->accountHolder;
    }

    /**
     * Sets a new accountHolder
     *
     * The name of the account holder.
     *
     * @param string $accountHolder
     * @return self
     */
    public function setAccountHolder($accountHolder)
    {
        $this->accountHolder = $accountHolder;
        return $this;
    }

    /**
     * Gets as iBAN
     *
     * The international bank account number.
     *
     * @return string
     */
    public function getIBAN()
    {
        return $this->iBAN;
    }

    /**
     * Sets a new iBAN
     *
     * The international bank account number.
     *
     * @param string $iBAN
     * @return self
     */
    public function setIBAN($iBAN)
    {
        $this->iBAN = $iBAN;
        return $this;
    }

    /**
     * Gets as sWIFTBIC
     *
     * The business identifier code of the financial institution.
     *
     * @return string
     */
    public function getSWIFTBIC()
    {
        return $this->sWIFTBIC;
    }

    /**
     * Sets a new sWIFTBIC
     *
     * The business identifier code of the financial institution.
     *
     * @param string $sWIFTBIC
     * @return self
     */
    public function setSWIFTBIC($sWIFTBIC)
    {
        $this->sWIFTBIC = $sWIFTBIC;
        return $this;
    }
}

