<?php

namespace TecCom\Order\FunctionCallRequest;

/**
 * Class representing ArrayOfParameterDataType
 *
 * 
 * XSD Type: ArrayOfParameterData
 */
class ArrayOfParameterDataType
{
    /**
     * @var \TecCom\Order\FunctionCallRequest\ParameterDataType[] $parameterData
     */
    private $parameterData = [
        
    ];

    /**
     * Adds as parameterData
     *
     * @return self
     * @param \TecCom\Order\FunctionCallRequest\ParameterDataType $parameterData
     */
    public function addToParameterData(\TecCom\Order\FunctionCallRequest\ParameterDataType $parameterData)
    {
        $this->parameterData[] = $parameterData;
        return $this;
    }

    /**
     * isset parameterData
     *
     * @param int|string $index
     * @return bool
     */
    public function issetParameterData($index)
    {
        return isset($this->parameterData[$index]);
    }

    /**
     * unset parameterData
     *
     * @param int|string $index
     * @return void
     */
    public function unsetParameterData($index)
    {
        unset($this->parameterData[$index]);
    }

    /**
     * Gets as parameterData
     *
     * @return \TecCom\Order\FunctionCallRequest\ParameterDataType[]
     */
    public function getParameterData()
    {
        return $this->parameterData;
    }

    /**
     * Sets a new parameterData
     *
     * @param \TecCom\Order\FunctionCallRequest\ParameterDataType[] $parameterData
     * @return self
     */
    public function setParameterData(?array $parameterData = null)
    {
        $this->parameterData = $parameterData;
        return $this;
    }
}

