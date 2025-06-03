<?php

namespace TecCom\Order\FunctionCallRequest;

/**
 * Class representing FunctionCallRequestType
 *
 * 
 * XSD Type: FunctionCallRequest
 */
class FunctionCallRequestType
{
    /**
     * @var \TecCom\Order\FunctionCallRequest\DTODateTimeType $timestamp
     */
    private $timestamp = null;

    /**
     * @var \TecCom\Order\FunctionCallRequest\AuthenticationDataType $authentication
     */
    private $authentication = null;

    /**
     * @var \TecCom\Order\FunctionCallRequest\ReferenceDataType $reference
     */
    private $reference = null;

    /**
     * @var \TecCom\Order\FunctionCallRequest\ServiceDataType $requestedFunction
     */
    private $requestedFunction = null;

    /**
     * Gets as timestamp
     *
     * @return \TecCom\Order\FunctionCallRequest\DTODateTimeType
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Sets a new timestamp
     *
     * @param \TecCom\Order\FunctionCallRequest\DTODateTimeType $timestamp
     * @return self
     */
    public function setTimestamp(?\TecCom\Order\FunctionCallRequest\DTODateTimeType $timestamp = null)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * Gets as authentication
     *
     * @return \TecCom\Order\FunctionCallRequest\AuthenticationDataType
     */
    public function getAuthentication()
    {
        return $this->authentication;
    }

    /**
     * Sets a new authentication
     *
     * @param \TecCom\Order\FunctionCallRequest\AuthenticationDataType $authentication
     * @return self
     */
    public function setAuthentication(?\TecCom\Order\FunctionCallRequest\AuthenticationDataType $authentication = null)
    {
        $this->authentication = $authentication;
        return $this;
    }

    /**
     * Gets as reference
     *
     * @return \TecCom\Order\FunctionCallRequest\ReferenceDataType
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Sets a new reference
     *
     * @param \TecCom\Order\FunctionCallRequest\ReferenceDataType $reference
     * @return self
     */
    public function setReference(?\TecCom\Order\FunctionCallRequest\ReferenceDataType $reference = null)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * Gets as requestedFunction
     *
     * @return \TecCom\Order\FunctionCallRequest\ServiceDataType
     */
    public function getRequestedFunction()
    {
        return $this->requestedFunction;
    }

    /**
     * Sets a new requestedFunction
     *
     * @param \TecCom\Order\FunctionCallRequest\ServiceDataType $requestedFunction
     * @return self
     */
    public function setRequestedFunction(?\TecCom\Order\FunctionCallRequest\ServiceDataType $requestedFunction = null)
    {
        $this->requestedFunction = $requestedFunction;
        return $this;
    }
}

