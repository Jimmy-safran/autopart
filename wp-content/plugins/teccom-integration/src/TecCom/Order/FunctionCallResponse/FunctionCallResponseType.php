<?php

namespace TecCom\Order\FunctionCallResponse;

/**
 * Class representing FunctionCallResponseType
 *
 * 
 * XSD Type: FunctionCallResponse
 */
class FunctionCallResponseType
{
    /**
     * @var \TecCom\Order\FunctionCallResponse\DTODateTimeType $timestamp
     */
    private $timestamp = null;

    /**
     * @var \TecCom\Order\FunctionCallResponse\AuthenticationDataType $authentication
     */
    private $authentication = null;

    /**
     * @var \TecCom\Order\FunctionCallResponse\ReferenceDataType $reference
     */
    private $reference = null;

    /**
     * @var \TecCom\Order\FunctionCallResponse\ServiceDataType $originatingFunction
     */
    private $originatingFunction = null;

    /**
     * @var \TecCom\Order\FunctionCallResponse\StatusDataType $status
     */
    private $status = null;

    /**
     * Gets as timestamp
     *
     * @return \TecCom\Order\FunctionCallResponse\DTODateTimeType
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Sets a new timestamp
     *
     * @param \TecCom\Order\FunctionCallResponse\DTODateTimeType $timestamp
     * @return self
     */
    public function setTimestamp(?\TecCom\Order\FunctionCallResponse\DTODateTimeType $timestamp = null)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * Gets as authentication
     *
     * @return \TecCom\Order\FunctionCallResponse\AuthenticationDataType
     */
    public function getAuthentication()
    {
        return $this->authentication;
    }

    /**
     * Sets a new authentication
     *
     * @param \TecCom\Order\FunctionCallResponse\AuthenticationDataType $authentication
     * @return self
     */
    public function setAuthentication(?\TecCom\Order\FunctionCallResponse\AuthenticationDataType $authentication = null)
    {
        $this->authentication = $authentication;
        return $this;
    }

    /**
     * Gets as reference
     *
     * @return \TecCom\Order\FunctionCallResponse\ReferenceDataType
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Sets a new reference
     *
     * @param \TecCom\Order\FunctionCallResponse\ReferenceDataType $reference
     * @return self
     */
    public function setReference(?\TecCom\Order\FunctionCallResponse\ReferenceDataType $reference = null)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * Gets as originatingFunction
     *
     * @return \TecCom\Order\FunctionCallResponse\ServiceDataType
     */
    public function getOriginatingFunction()
    {
        return $this->originatingFunction;
    }

    /**
     * Sets a new originatingFunction
     *
     * @param \TecCom\Order\FunctionCallResponse\ServiceDataType $originatingFunction
     * @return self
     */
    public function setOriginatingFunction(?\TecCom\Order\FunctionCallResponse\ServiceDataType $originatingFunction = null)
    {
        $this->originatingFunction = $originatingFunction;
        return $this;
    }

    /**
     * Gets as status
     *
     * @return \TecCom\Order\FunctionCallResponse\StatusDataType
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets a new status
     *
     * @param \TecCom\Order\FunctionCallResponse\StatusDataType $status
     * @return self
     */
    public function setStatus(?\TecCom\Order\FunctionCallResponse\StatusDataType $status = null)
    {
        $this->status = $status;
        return $this;
    }
}

