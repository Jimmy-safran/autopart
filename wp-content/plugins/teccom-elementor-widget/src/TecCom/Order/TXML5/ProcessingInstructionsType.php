<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing ProcessingInstructionsType
 *
 * 
 * XSD Type: ProcessingInstructionsType
 */
class ProcessingInstructionsType
{
    /**
     * The dispatch mode for which the availability of the articles should be requested.
     *
     * Every dispatch mode offered by the seller has a corresponding delivery window, for example, 3 to 5 days for dispatch mode `Road`.
     *
     * The special dispatch mode `undefined` **must** be used if, and only if, `AvaReqOptions/Type` is set to `DeliveryOptions`.
     *
     * @var string $dispatchMode
     */
    private $dispatchMode = null;

    /**
     * The delivery date for which the availability of the articles should be checked.
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
     * The reference to a location from which the goods should be shipped and for which the availability of the articles should be checked.
     *
     * 1. Warehouse references **must** be:
     *
     *  1. mutually agreed between buyer and seller on or
     *  2. taken from `Line/DeliveryOptions` in an availability response. 
     *
     * 2. If this reference is not known to the seller, they will ignore it.
     *
     * @var string $warehouseReference
     */
    private $warehouseReference = null;

    /**
     * Gets as dispatchMode
     *
     * The dispatch mode for which the availability of the articles should be requested.
     *
     * Every dispatch mode offered by the seller has a corresponding delivery window, for example, 3 to 5 days for dispatch mode `Road`.
     *
     * The special dispatch mode `undefined` **must** be used if, and only if, `AvaReqOptions/Type` is set to `DeliveryOptions`.
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
     * The dispatch mode for which the availability of the articles should be requested.
     *
     * Every dispatch mode offered by the seller has a corresponding delivery window, for example, 3 to 5 days for dispatch mode `Road`.
     *
     * The special dispatch mode `undefined` **must** be used if, and only if, `AvaReqOptions/Type` is set to `DeliveryOptions`.
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
     * The delivery date for which the availability of the articles should be checked.
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
     * The delivery date for which the availability of the articles should be checked.
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
     * The reference to a location from which the goods should be shipped and for which the availability of the articles should be checked.
     *
     * 1. Warehouse references **must** be:
     *
     *  1. mutually agreed between buyer and seller on or
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
     * The reference to a location from which the goods should be shipped and for which the availability of the articles should be checked.
     *
     * 1. Warehouse references **must** be:
     *
     *  1. mutually agreed between buyer and seller on or
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
}

