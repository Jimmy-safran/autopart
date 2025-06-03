<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing DeliveryInfoOrdRspType
 *
 * 
 * XSD Type: DeliveryInfoOrdRspType
 */
class DeliveryInfoOrdRspType
{
    /**
     * The type of quantity.
     *
     * @var string $quantityType
     */
    private $quantityType = null;

    /**
     * The actual quantity that will be delivered.
     *
     * @var float $quantity
     */
    private $quantity = null;

    /**
     * The unit of measurement for the quantity.
     *
     * @var string $uoM
     */
    private $uoM = null;

    /**
     * The reference to a location from which the returned quantity will be shipped.
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
     * 1. If this date cannot be given exactly, then the seller **must** use the `Before` or `After` qualifier.
     *
     * 2. If this date cannot be given at all, then the seller **must** use the dispatch date instead.
     *
     * @var \TecCom\Order\TXML5\DateType $deliveryDate
     */
    private $deliveryDate = null;

    /**
     * The date when the returned quantity will be shipped.
     *
     * This date **must** be added if the seller has not added the delivery date or the delivery date is not an exact date.
     *
     * @var \TecCom\Order\TXML5\DateType $dispatchDate
     */
    private $dispatchDate = null;

    /**
     * Gets as quantityType
     *
     * The type of quantity.
     *
     * @return string
     */
    public function getQuantityType()
    {
        return $this->quantityType;
    }

    /**
     * Sets a new quantityType
     *
     * The type of quantity.
     *
     * @param string $quantityType
     * @return self
     */
    public function setQuantityType($quantityType)
    {
        $this->quantityType = $quantityType;
        return $this;
    }

    /**
     * Gets as quantity
     *
     * The actual quantity that will be delivered.
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
     * The actual quantity that will be delivered.
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
     * The unit of measurement for the quantity.
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
     * The unit of measurement for the quantity.
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
     * Gets as warehouseReference
     *
     * The reference to a location from which the returned quantity will be shipped.
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
     * The reference to a location from which the returned quantity will be shipped.
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
     * Gets as deliveryDate
     *
     * The date when the returned quantity will be delivered to the recipient.
     *
     * 1. If this date cannot be given exactly, then the seller **must** use the `Before` or `After` qualifier.
     *
     * 2. If this date cannot be given at all, then the seller **must** use the dispatch date instead.
     *
     * @return \TecCom\Order\TXML5\DateType
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * Sets a new deliveryDate
     *
     * The date when the returned quantity will be delivered to the recipient.
     *
     * 1. If this date cannot be given exactly, then the seller **must** use the `Before` or `After` qualifier.
     *
     * 2. If this date cannot be given at all, then the seller **must** use the dispatch date instead.
     *
     * @param \TecCom\Order\TXML5\DateType $deliveryDate
     * @return self
     */
    public function setDeliveryDate(?\TecCom\Order\TXML5\DateType $deliveryDate = null)
    {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }

    /**
     * Gets as dispatchDate
     *
     * The date when the returned quantity will be shipped.
     *
     * This date **must** be added if the seller has not added the delivery date or the delivery date is not an exact date.
     *
     * @return \TecCom\Order\TXML5\DateType
     */
    public function getDispatchDate()
    {
        return $this->dispatchDate;
    }

    /**
     * Sets a new dispatchDate
     *
     * The date when the returned quantity will be shipped.
     *
     * This date **must** be added if the seller has not added the delivery date or the delivery date is not an exact date.
     *
     * @param \TecCom\Order\TXML5\DateType $dispatchDate
     * @return self
     */
    public function setDispatchDate(?\TecCom\Order\TXML5\DateType $dispatchDate = null)
    {
        $this->dispatchDate = $dispatchDate;
        return $this;
    }
}

