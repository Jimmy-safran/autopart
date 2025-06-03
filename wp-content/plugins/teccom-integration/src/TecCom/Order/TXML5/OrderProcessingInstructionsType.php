<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing OrderProcessingInstructionsType
 *
 * 
 * XSD Type: OrderProcessingInstructionsType
 */
class OrderProcessingInstructionsType
{
    /**
     * The dispatch mode of the order.
     *
     * Every dispatch mode offered by the seller has a corresponding delivery window, for example, 3 to 5 days for dispatch mode `Road`.
     *
     * The seller **must** reject the order if the buyer has sent an unsupported dispatch mode.
     *
     * @var string $dispatchMode
     */
    private $dispatchMode = null;

    /**
     * The date when the buyer wants to have the goods delivered.
     *
     * This date is only a refinement of the delivery window defined by the chosen dispatch mode.
     *
     * The date **must** lie inside this delivery window, otherwise the seller **may** ignore it.
     *
     * **Example**: for the dispatch mode `Road` the seller specifies a delivery window of 3 to 5 days. If the order date is `2024-01-09`, then the earliest possible delivery date would be `2024-01-12`and the latest possible delivery date would be `2024-01-16` (based on working days from Monday to Friday). The requested delivery date therefore must lie in the window between the earliest and latest delivery date.
     *
     * @var \TecCom\Order\TXML5\DateType $requestedDeliveryDate
     */
    private $requestedDeliveryDate = null;

    /**
     * The reference to a location from which the goods should be shipped.
     *
     * 1. Warehouse references **must** be:
     *  
     *  1. mutually agreed between buyer and seller or
     *  2. taken from `Line/DeliveryOptions` in an availability response. 
     *
     * 2. If this reference is not known to the seller, they will ignore it.
     *
     * @var string $warehouseReference
     */
    private $warehouseReference = null;

    /**
     * Indicates to the seller if the buyer wants them to back-order the remaining quantities of all articles with insufficient quantity and deliver them at a later date.
     *
     * The seller **can** override this setting per dispatch mode, but they must specify in their membership profile whether they:
     *
     * 1. always back-order articles,
     * 2. never back-order articles or
     * 3. back-order articles according to the buyer's setting.
     *
     * @var bool $backlog
     */
    private $backlog = null;

    /**
     * Indicates to the seller if they should only create the order if all articles are available in the requested quantities.
     *
     * This is of higher priority than the backlog setting. That is, if complete delivery is requested, the seller **must** check the requested quantities against the actually available stock at hand.
     *
     * @var bool $completeDelivery
     */
    private $completeDelivery = null;

    /**
     * Indicates to the seller if they **must** deliver the whole order in one shipment.
     *
     * @var bool $completeShipment
     */
    private $completeShipment = null;

    /**
     * Gets as dispatchMode
     *
     * The dispatch mode of the order.
     *
     * Every dispatch mode offered by the seller has a corresponding delivery window, for example, 3 to 5 days for dispatch mode `Road`.
     *
     * The seller **must** reject the order if the buyer has sent an unsupported dispatch mode.
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
     * The dispatch mode of the order.
     *
     * Every dispatch mode offered by the seller has a corresponding delivery window, for example, 3 to 5 days for dispatch mode `Road`.
     *
     * The seller **must** reject the order if the buyer has sent an unsupported dispatch mode.
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
     * Gets as requestedDeliveryDate
     *
     * The date when the buyer wants to have the goods delivered.
     *
     * This date is only a refinement of the delivery window defined by the chosen dispatch mode.
     *
     * The date **must** lie inside this delivery window, otherwise the seller **may** ignore it.
     *
     * **Example**: for the dispatch mode `Road` the seller specifies a delivery window of 3 to 5 days. If the order date is `2024-01-09`, then the earliest possible delivery date would be `2024-01-12`and the latest possible delivery date would be `2024-01-16` (based on working days from Monday to Friday). The requested delivery date therefore must lie in the window between the earliest and latest delivery date.
     *
     * @return \TecCom\Order\TXML5\DateType
     */
    public function getRequestedDeliveryDate()
    {
        return $this->requestedDeliveryDate;
    }

    /**
     * Sets a new requestedDeliveryDate
     *
     * The date when the buyer wants to have the goods delivered.
     *
     * This date is only a refinement of the delivery window defined by the chosen dispatch mode.
     *
     * The date **must** lie inside this delivery window, otherwise the seller **may** ignore it.
     *
     * **Example**: for the dispatch mode `Road` the seller specifies a delivery window of 3 to 5 days. If the order date is `2024-01-09`, then the earliest possible delivery date would be `2024-01-12`and the latest possible delivery date would be `2024-01-16` (based on working days from Monday to Friday). The requested delivery date therefore must lie in the window between the earliest and latest delivery date.
     *
     * @param \TecCom\Order\TXML5\DateType $requestedDeliveryDate
     * @return self
     */
    public function setRequestedDeliveryDate(?\TecCom\Order\TXML5\DateType $requestedDeliveryDate = null)
    {
        $this->requestedDeliveryDate = $requestedDeliveryDate;
        return $this;
    }

    /**
     * Gets as warehouseReference
     *
     * The reference to a location from which the goods should be shipped.
     *
     * 1. Warehouse references **must** be:
     *  
     *  1. mutually agreed between buyer and seller or
     *  2. taken from `Line/DeliveryOptions` in an availability response. 
     *
     * 2. If this reference is not known to the seller, they will ignore it.
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
     * The reference to a location from which the goods should be shipped.
     *
     * 1. Warehouse references **must** be:
     *  
     *  1. mutually agreed between buyer and seller or
     *  2. taken from `Line/DeliveryOptions` in an availability response. 
     *
     * 2. If this reference is not known to the seller, they will ignore it.
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
     * Gets as backlog
     *
     * Indicates to the seller if the buyer wants them to back-order the remaining quantities of all articles with insufficient quantity and deliver them at a later date.
     *
     * The seller **can** override this setting per dispatch mode, but they must specify in their membership profile whether they:
     *
     * 1. always back-order articles,
     * 2. never back-order articles or
     * 3. back-order articles according to the buyer's setting.
     *
     * @return bool
     */
    public function getBacklog()
    {
        return $this->backlog;
    }

    /**
     * Sets a new backlog
     *
     * Indicates to the seller if the buyer wants them to back-order the remaining quantities of all articles with insufficient quantity and deliver them at a later date.
     *
     * The seller **can** override this setting per dispatch mode, but they must specify in their membership profile whether they:
     *
     * 1. always back-order articles,
     * 2. never back-order articles or
     * 3. back-order articles according to the buyer's setting.
     *
     * @param bool $backlog
     * @return self
     */
    public function setBacklog($backlog)
    {
        $this->backlog = $backlog;
        return $this;
    }

    /**
     * Gets as completeDelivery
     *
     * Indicates to the seller if they should only create the order if all articles are available in the requested quantities.
     *
     * This is of higher priority than the backlog setting. That is, if complete delivery is requested, the seller **must** check the requested quantities against the actually available stock at hand.
     *
     * @return bool
     */
    public function getCompleteDelivery()
    {
        return $this->completeDelivery;
    }

    /**
     * Sets a new completeDelivery
     *
     * Indicates to the seller if they should only create the order if all articles are available in the requested quantities.
     *
     * This is of higher priority than the backlog setting. That is, if complete delivery is requested, the seller **must** check the requested quantities against the actually available stock at hand.
     *
     * @param bool $completeDelivery
     * @return self
     */
    public function setCompleteDelivery($completeDelivery)
    {
        $this->completeDelivery = $completeDelivery;
        return $this;
    }

    /**
     * Gets as completeShipment
     *
     * Indicates to the seller if they **must** deliver the whole order in one shipment.
     *
     * @return bool
     */
    public function getCompleteShipment()
    {
        return $this->completeShipment;
    }

    /**
     * Sets a new completeShipment
     *
     * Indicates to the seller if they **must** deliver the whole order in one shipment.
     *
     * @param bool $completeShipment
     * @return self
     */
    public function setCompleteShipment($completeShipment)
    {
        $this->completeShipment = $completeShipment;
        return $this;
    }
}

