<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing DeliveryInfoType
 *
 * 
 * XSD Type: DeliveryInfoType
 */
class DeliveryInfoType
{
    /**
     * The quantity that is available for delivery at the returned delivery date.
     *
     * @var float $quantity
     */
    private $quantity = null;

    /**
     * The unit of measurement in which the available quantity will be delivered.
     *
     * @var string $uoM
     */
    private $uoM = null;

    /**
     * The dispatch mode of the delivery option.
     *
     * 1. The seller **must** return a dispatch mode if the buyer sent an availability request with type `DeliveryOptions`.
     *
     * 2. The buyer **must** send this dispatch mode in the following order to receive the available quantity on the returned delivery date.
     *
     * @var string $dispatchMode
     */
    private $dispatchMode = null;

    /**
     * The warehouse reference of this delivery option.
     *
     * The buyer **must** send this reference in the following order to receive the available quantity on the returned delivery date.
     *
     * @var string $warehouseReference
     */
    private $warehouseReference = null;

    /**
     * Arbitrary free text giving further human-readable information.
     *
     * @var string $infoText
     */
    private $infoText = null;

    /**
     * The date when the returned quantity will be delivered to the recipient.
     *
     * If this date cannot be specified exactly, then the seller **must** use the `Before` or `After` qualifier.
     *
     * @var \TecCom\Order\TXML5\DateType $deliveryInfoDate
     */
    private $deliveryInfoDate = null;

    /**
     * The monetary amount which the seller estimates to charge for this delivery option, for example, freight charges.
     *
     * @var float $additionalCharge
     */
    private $additionalCharge = null;

    /**
     * The latest time by which the buyer **must** send the following order to qualify for this delivery option.
     *
     * It **must** include the time zone (which is the number of hours and minutes the given date and time is ahead or behind UTC time).
     *
     * @var \DateTime $cutOffTime
     */
    private $cutOffTime = null;

    /**
     * Gets as quantity
     *
     * The quantity that is available for delivery at the returned delivery date.
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
     * The quantity that is available for delivery at the returned delivery date.
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
     * The unit of measurement in which the available quantity will be delivered.
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
     * The unit of measurement in which the available quantity will be delivered.
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
     * Gets as dispatchMode
     *
     * The dispatch mode of the delivery option.
     *
     * 1. The seller **must** return a dispatch mode if the buyer sent an availability request with type `DeliveryOptions`.
     *
     * 2. The buyer **must** send this dispatch mode in the following order to receive the available quantity on the returned delivery date.
     *
     * @return string
     */
    public function getDispatchMode()
    {
        return $this->dispatchMode;
    }

    /**
     * Sets a new dispatchMode
     *
     * The dispatch mode of the delivery option.
     *
     * 1. The seller **must** return a dispatch mode if the buyer sent an availability request with type `DeliveryOptions`.
     *
     * 2. The buyer **must** send this dispatch mode in the following order to receive the available quantity on the returned delivery date.
     *
     * @param string $dispatchMode
     * @return self
     */
    public function setDispatchMode($dispatchMode)
    {
        $this->dispatchMode = $dispatchMode;
        return $this;
    }

    /**
     * Gets as warehouseReference
     *
     * The warehouse reference of this delivery option.
     *
     * The buyer **must** send this reference in the following order to receive the available quantity on the returned delivery date.
     *
     * @return string
     */
    public function getWarehouseReference()
    {
        return $this->warehouseReference;
    }

    /**
     * Sets a new warehouseReference
     *
     * The warehouse reference of this delivery option.
     *
     * The buyer **must** send this reference in the following order to receive the available quantity on the returned delivery date.
     *
     * @param string $warehouseReference
     * @return self
     */
    public function setWarehouseReference($warehouseReference)
    {
        $this->warehouseReference = $warehouseReference;
        return $this;
    }

    /**
     * Gets as infoText
     *
     * Arbitrary free text giving further human-readable information.
     *
     * @return string
     */
    public function getInfoText()
    {
        return $this->infoText;
    }

    /**
     * Sets a new infoText
     *
     * Arbitrary free text giving further human-readable information.
     *
     * @param string $infoText
     * @return self
     */
    public function setInfoText($infoText)
    {
        $this->infoText = $infoText;
        return $this;
    }

    /**
     * Gets as deliveryInfoDate
     *
     * The date when the returned quantity will be delivered to the recipient.
     *
     * If this date cannot be specified exactly, then the seller **must** use the `Before` or `After` qualifier.
     *
     * @return \TecCom\Order\TXML5\DateType
     */
    public function getDeliveryInfoDate()
    {
        return $this->deliveryInfoDate;
    }

    /**
     * Sets a new deliveryInfoDate
     *
     * The date when the returned quantity will be delivered to the recipient.
     *
     * If this date cannot be specified exactly, then the seller **must** use the `Before` or `After` qualifier.
     *
     * @param \TecCom\Order\TXML5\DateType $deliveryInfoDate
     * @return self
     */
    public function setDeliveryInfoDate(\TecCom\Order\TXML5\DateType $deliveryInfoDate)
    {
        $this->deliveryInfoDate = $deliveryInfoDate;
        return $this;
    }

    /**
     * Gets as additionalCharge
     *
     * The monetary amount which the seller estimates to charge for this delivery option, for example, freight charges.
     *
     * @return float
     */
    public function getAdditionalCharge()
    {
        return $this->additionalCharge;
    }

    /**
     * Sets a new additionalCharge
     *
     * The monetary amount which the seller estimates to charge for this delivery option, for example, freight charges.
     *
     * @param float $additionalCharge
     * @return self
     */
    public function setAdditionalCharge($additionalCharge)
    {
        $this->additionalCharge = $additionalCharge;
        return $this;
    }

    /**
     * Gets as cutOffTime
     *
     * The latest time by which the buyer **must** send the following order to qualify for this delivery option.
     *
     * It **must** include the time zone (which is the number of hours and minutes the given date and time is ahead or behind UTC time).
     *
     * @return \DateTime
     */
    public function getCutOffTime()
    {
        return $this->cutOffTime;
    }

    /**
     * Sets a new cutOffTime
     *
     * The latest time by which the buyer **must** send the following order to qualify for this delivery option.
     *
     * It **must** include the time zone (which is the number of hours and minutes the given date and time is ahead or behind UTC time).
     *
     * @param \DateTime $cutOffTime
     * @return self
     */
    public function setCutOffTime(?\DateTime $cutOffTime = null)
    {
        $this->cutOffTime = $cutOffTime;
        return $this;
    }
}

