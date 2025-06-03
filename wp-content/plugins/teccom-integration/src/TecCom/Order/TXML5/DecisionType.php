<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing DecisionType
 *
 * 
 * XSD Type: DecisionType
 */
class DecisionType
{
    /**
     * Item workflow and decision status
     *
     * @var string $itemStatus
     */
    private $itemStatus = null;

    /**
     * Goodwill indicator for (partially) accepted items by the receiver
     *
     * @var bool $goodwill
     */
    private $goodwill = null;

    /**
     * The net value / amount for all confirmed articles in the unit of measurement of the confirmed quantity. This Price considers allowances and charges but does not includes taxes. Amounts are always positive and can have maximal two decimals.
     *
     * @var float $acceptedNetAmount
     */
    private $acceptedNetAmount = null;

    /**
     * The net value / amount for all confirmed articles in the unit of measurement of the confirmed quantity. This Price considers allowances and charges but does not includes taxes. Amounts are always positive and can have maximal two decimals.
     *
     * @var float $creditNoteNetAmount
     */
    private $creditNoteNetAmount = null;

    /**
     * @var string $rejectionReason
     */
    private $rejectionReason = null;

    /**
     * @var \TecCom\Order\TXML5\DecisionType\ActionAType $action
     */
    private $action = null;

    /**
     * @var string $currency
     */
    private $currency = null;

    /**
     * Gets as itemStatus
     *
     * Item workflow and decision status
     *
     * @return string
     */
    public function getItemStatus()
    {
        return $this->itemStatus;
    }

    /**
     * Sets a new itemStatus
     *
     * Item workflow and decision status
     *
     * @param string $itemStatus
     * @return self
     */
    public function setItemStatus($itemStatus)
    {
        $this->itemStatus = $itemStatus;
        return $this;
    }

    /**
     * Gets as goodwill
     *
     * Goodwill indicator for (partially) accepted items by the receiver
     *
     * @return bool
     */
    public function getGoodwill()
    {
        return $this->goodwill;
    }

    /**
     * Sets a new goodwill
     *
     * Goodwill indicator for (partially) accepted items by the receiver
     *
     * @param bool $goodwill
     * @return self
     */
    public function setGoodwill($goodwill)
    {
        $this->goodwill = $goodwill;
        return $this;
    }

    /**
     * Gets as acceptedNetAmount
     *
     * The net value / amount for all confirmed articles in the unit of measurement of the confirmed quantity. This Price considers allowances and charges but does not includes taxes. Amounts are always positive and can have maximal two decimals.
     *
     * @return float
     */
    public function getAcceptedNetAmount()
    {
        return $this->acceptedNetAmount;
    }

    /**
     * Sets a new acceptedNetAmount
     *
     * The net value / amount for all confirmed articles in the unit of measurement of the confirmed quantity. This Price considers allowances and charges but does not includes taxes. Amounts are always positive and can have maximal two decimals.
     *
     * @param float $acceptedNetAmount
     * @return self
     */
    public function setAcceptedNetAmount($acceptedNetAmount)
    {
        $this->acceptedNetAmount = $acceptedNetAmount;
        return $this;
    }

    /**
     * Gets as creditNoteNetAmount
     *
     * The net value / amount for all confirmed articles in the unit of measurement of the confirmed quantity. This Price considers allowances and charges but does not includes taxes. Amounts are always positive and can have maximal two decimals.
     *
     * @return float
     */
    public function getCreditNoteNetAmount()
    {
        return $this->creditNoteNetAmount;
    }

    /**
     * Sets a new creditNoteNetAmount
     *
     * The net value / amount for all confirmed articles in the unit of measurement of the confirmed quantity. This Price considers allowances and charges but does not includes taxes. Amounts are always positive and can have maximal two decimals.
     *
     * @param float $creditNoteNetAmount
     * @return self
     */
    public function setCreditNoteNetAmount($creditNoteNetAmount)
    {
        $this->creditNoteNetAmount = $creditNoteNetAmount;
        return $this;
    }

    /**
     * Gets as rejectionReason
     *
     * @return string
     */
    public function getRejectionReason()
    {
        return $this->rejectionReason;
    }

    /**
     * Sets a new rejectionReason
     *
     * @param string $rejectionReason
     * @return self
     */
    public function setRejectionReason($rejectionReason)
    {
        $this->rejectionReason = $rejectionReason;
        return $this;
    }

    /**
     * Gets as action
     *
     * @return \TecCom\Order\TXML5\DecisionType\ActionAType
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Sets a new action
     *
     * @param \TecCom\Order\TXML5\DecisionType\ActionAType $action
     * @return self
     */
    public function setAction(?\TecCom\Order\TXML5\DecisionType\ActionAType $action = null)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * Gets as currency
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
     * @param string $currency
     * @return self
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }
}

