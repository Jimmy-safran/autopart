<?php

namespace TecCom\Order\TXML5\AvaReq\AvaReqAType\HeadAType;

/**
 * Class representing AvaReqOptionsAType
 */
class AvaReqOptionsAType
{
    /**
     * The type of the availability request.
     *
     * @var string $type
     */
    private $type = null;

    /**
     * Indicates if the buyer wants to receive prices or not.
     *
     * Usually, the seller can answer faster if no prices are requested due to the sometimes considerable complexity of the calculation logic for prices.
     *
     * @var bool $priceInfo
     */
    private $priceInfo = null;

    /**
     * Gets as type
     *
     * The type of the availability request.
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
     * The type of the availability request.
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
     * Gets as priceInfo
     *
     * Indicates if the buyer wants to receive prices or not.
     *
     * Usually, the seller can answer faster if no prices are requested due to the sometimes considerable complexity of the calculation logic for prices.
     *
     * @return bool
     */
    public function getPriceInfo()
    {
        return $this->priceInfo;
    }

    /**
     * Sets a new priceInfo
     *
     * Indicates if the buyer wants to receive prices or not.
     *
     * Usually, the seller can answer faster if no prices are requested due to the sometimes considerable complexity of the calculation logic for prices.
     *
     * @param bool $priceInfo
     * @return self
     */
    public function setPriceInfo($priceInfo)
    {
        $this->priceInfo = $priceInfo;
        return $this;
    }
}

