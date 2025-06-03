<?php

namespace TecCom\Order\TXML5\OrdRspUpd\OrdRspUpdAType\LineAType;

/**
 * Class representing TotalQuantityAType
 */
class TotalQuantityAType
{
    /**
     * Information about the requested quantity.
     *
     * This **must** be copied from the requested quantity of the order for the main line and each of its sublines.
     *
     * @var \TecCom\Order\TXML5\QuantityType $requested
     */
    private $requested = null;

    /**
     * Information about the confirmed quantity.
     *
     * 1. The total confirmed quantity **must** be the sum of the confirmed quantities of the main line and all its sublines.
     *
     *  That is, if the buyer orders 50 PCE of article 123 and the seller delivers 30 PCE of article 123 and 20 PCE of functional alternative article 123-54, then the main line has confirmed quantity 30 PCE and the subline has confirmed quantity 20 PCE for total confirmed quantity 50 PCE.
     *
     * 2. If the replacement list functionality is used, then:
     *
     *  1. The confirmed quantity for the main line **must** be `0`.
     *  2. The confirmed quantities of all its sublines must be equal.
     *
     * @var \TecCom\Order\TXML5\QuantityType $confirmed
     */
    private $confirmed = null;

    /**
     * Gets as requested
     *
     * Information about the requested quantity.
     *
     * This **must** be copied from the requested quantity of the order for the main line and each of its sublines.
     *
     * @return \TecCom\Order\TXML5\QuantityType
     */
    public function getRequested()
    {
        return $this->requested;
    }

    /**
     * Sets a new requested
     *
     * Information about the requested quantity.
     *
     * This **must** be copied from the requested quantity of the order for the main line and each of its sublines.
     *
     * @param \TecCom\Order\TXML5\QuantityType $requested
     * @return self
     */
    public function setRequested(\TecCom\Order\TXML5\QuantityType $requested)
    {
        $this->requested = $requested;
        return $this;
    }

    /**
     * Gets as confirmed
     *
     * Information about the confirmed quantity.
     *
     * 1. The total confirmed quantity **must** be the sum of the confirmed quantities of the main line and all its sublines.
     *
     *  That is, if the buyer orders 50 PCE of article 123 and the seller delivers 30 PCE of article 123 and 20 PCE of functional alternative article 123-54, then the main line has confirmed quantity 30 PCE and the subline has confirmed quantity 20 PCE for total confirmed quantity 50 PCE.
     *
     * 2. If the replacement list functionality is used, then:
     *
     *  1. The confirmed quantity for the main line **must** be `0`.
     *  2. The confirmed quantities of all its sublines must be equal.
     *
     * @return \TecCom\Order\TXML5\QuantityType
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * Sets a new confirmed
     *
     * Information about the confirmed quantity.
     *
     * 1. The total confirmed quantity **must** be the sum of the confirmed quantities of the main line and all its sublines.
     *
     *  That is, if the buyer orders 50 PCE of article 123 and the seller delivers 30 PCE of article 123 and 20 PCE of functional alternative article 123-54, then the main line has confirmed quantity 30 PCE and the subline has confirmed quantity 20 PCE for total confirmed quantity 50 PCE.
     *
     * 2. If the replacement list functionality is used, then:
     *
     *  1. The confirmed quantity for the main line **must** be `0`.
     *  2. The confirmed quantities of all its sublines must be equal.
     *
     * @param \TecCom\Order\TXML5\QuantityType $confirmed
     * @return self
     */
    public function setConfirmed(\TecCom\Order\TXML5\QuantityType $confirmed)
    {
        $this->confirmed = $confirmed;
        return $this;
    }
}

