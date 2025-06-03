<?php

namespace TecCom\Order\FunctionCallRequest;

/**
 * Class representing ReferenceDataType
 *
 * 
 * XSD Type: ReferenceData
 */
class ReferenceDataType
{
    /**
     * @var string $businessRelationID
     */
    private $businessRelationID = null;

    /**
     * @var string $businessTransactionID
     */
    private $businessTransactionID = null;

    /**
     * @var \TecCom\Order\FunctionCallRequest\RoutingInfoType $routingInfo
     */
    private $routingInfo = null;

    /**
     * Gets as businessRelationID
     *
     * @return string
     */
    public function getBusinessRelationID()
    {
        return $this->businessRelationID;
    }

    /**
     * Sets a new businessRelationID
     *
     * @param string $businessRelationID
     * @return self
     */
    public function setBusinessRelationID($businessRelationID)
    {
        $this->businessRelationID = $businessRelationID;
        return $this;
    }

    /**
     * Gets as businessTransactionID
     *
     * @return string
     */
    public function getBusinessTransactionID()
    {
        return $this->businessTransactionID;
    }

    /**
     * Sets a new businessTransactionID
     *
     * @param string $businessTransactionID
     * @return self
     */
    public function setBusinessTransactionID($businessTransactionID)
    {
        $this->businessTransactionID = $businessTransactionID;
        return $this;
    }

    /**
     * Gets as routingInfo
     *
     * @return \TecCom\Order\FunctionCallRequest\RoutingInfoType
     */
    public function getRoutingInfo()
    {
        return $this->routingInfo;
    }

    /**
     * Sets a new routingInfo
     *
     * @param \TecCom\Order\FunctionCallRequest\RoutingInfoType $routingInfo
     * @return self
     */
    public function setRoutingInfo(?\TecCom\Order\FunctionCallRequest\RoutingInfoType $routingInfo = null)
    {
        $this->routingInfo = $routingInfo;
        return $this;
    }
}

