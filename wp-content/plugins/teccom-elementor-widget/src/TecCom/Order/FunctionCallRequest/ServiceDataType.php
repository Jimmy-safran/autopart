<?php

namespace TecCom\Order\FunctionCallRequest;

/**
 * Class representing ServiceDataType
 *
 * 
 * XSD Type: ServiceData
 */
class ServiceDataType
{
    /**
     * @var string $functionID
     */
    private $functionID = null;

    /**
     * @var \TecCom\Order\FunctionCallRequest\ParameterDataType[] $parameterList
     */
    private $parameterList = null;

    /**
     * Gets as functionID
     *
     * @return string
     */
    public function getFunctionID()
    {
        return $this->functionID;
    }

    /**
     * Sets a new functionID
     *
     * @param string $functionID
     * @return self
     */
    public function setFunctionID($functionID)
    {
        $this->functionID = $functionID;
        return $this;
    }

    /**
     * Adds as parameterData
     *
     * @return self
     * @param \TecCom\Order\FunctionCallRequest\ParameterDataType $parameterData
     */
    public function addToParameterList(\TecCom\Order\FunctionCallRequest\ParameterDataType $parameterData)
    {
        $this->parameterList[] = $parameterData;
        return $this;
    }

    /**
     * isset parameterList
     *
     * @param int|string $index
     * @return bool
     */
    public function issetParameterList($index)
    {
        return isset($this->parameterList[$index]);
    }

    /**
     * unset parameterList
     *
     * @param int|string $index
     * @return void
     */
    public function unsetParameterList($index)
    {
        unset($this->parameterList[$index]);
    }

    /**
     * Gets as parameterList
     *
     * @return \TecCom\Order\FunctionCallRequest\ParameterDataType[]
     */
    public function getParameterList()
    {
        return $this->parameterList;
    }

    /**
     * Sets a new parameterList
     *
     * @param \TecCom\Order\FunctionCallRequest\ParameterDataType[] $parameterList
     * @return self
     */
    public function setParameterList(?array $parameterList = null)
    {
        $this->parameterList = $parameterList;
        return $this;
    }
}

