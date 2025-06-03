<?php

namespace TecCom\Order\TXML5\AvaRsp\AvaRspAType\LineAType;

/**
 * Class representing TotalQuantityAType
 */
class TotalQuantityAType
{
    /**
     * Information about the requested quantity.
     *
     * This **must** be copied from the requested quantity of the availability request for the main line and each of its sublines.
     *
     * @var \TecCom\Order\TXML5\QuantityType $requested
     */
    private $requested = null;

    /**
     * Information about the confirmed quantity.
     *
     * 1. For the main line the seller **must** confirm only the available quantity of the requested article.
     *
     * 2. For each subline the seller **must** confirm only the available quantity of the article in the subline.
     *
     * @var \TecCom\Order\TXML5\QuantityType $confirmed
     */
    private $confirmed = null;

    /**
     * Gets as requested
     *
     * Information about the requested quantity.
     *
     * This **must** be copied from the requested quantity of the availability request for the main line and each of its sublines.
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
     * This **must** be copied from the requested quantity of the availability request for the main line and each of its sublines.
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
     * 1. For the main line the seller **must** confirm only the available quantity of the requested article.
     *
     * 2. For each subline the seller **must** confirm only the available quantity of the article in the subline.
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
     * 1. For the main line the seller **must** confirm only the available quantity of the requested article.
     *
     * 2. For each subline the seller **must** confirm only the available quantity of the article in the subline.
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

