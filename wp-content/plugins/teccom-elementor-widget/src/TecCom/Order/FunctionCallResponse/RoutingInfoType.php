<?php

namespace TecCom\Order\FunctionCallResponse;

/**
 * Class representing RoutingInfoType
 *
 * 
 * XSD Type: RoutingInfo
 */
class RoutingInfoType
{
    /**
     * @var string $requestOriginator
     */
    private $requestOriginator = null;

    /**
     * @var string $requestDestination
     */
    private $requestDestination = null;

    /**
     * @var string $responseOriginator
     */
    private $responseOriginator = null;

    /**
     * Gets as requestOriginator
     *
     * @return string
     */
    public function getRequestOriginator()
    {
        return $this->requestOriginator;
    }

    /**
     * Sets a new requestOriginator
     *
     * @param string $requestOriginator
     * @return self
     */
    public function setRequestOriginator($requestOriginator)
    {
        $this->requestOriginator = $requestOriginator;
        return $this;
    }

    /**
     * Gets as requestDestination
     *
     * @return string
     */
    public function getRequestDestination()
    {
        return $this->requestDestination;
    }

    /**
     * Sets a new requestDestination
     *
     * @param string $requestDestination
     * @return self
     */
    public function setRequestDestination($requestDestination)
    {
        $this->requestDestination = $requestDestination;
        return $this;
    }

    /**
     * Gets as responseOriginator
     *
     * @return string
     */
    public function getResponseOriginator()
    {
        return $this->responseOriginator;
    }

    /**
     * Sets a new responseOriginator
     *
     * @param string $responseOriginator
     * @return self
     */
    public function setResponseOriginator($responseOriginator)
    {
        $this->responseOriginator = $responseOriginator;
        return $this;
    }
}

