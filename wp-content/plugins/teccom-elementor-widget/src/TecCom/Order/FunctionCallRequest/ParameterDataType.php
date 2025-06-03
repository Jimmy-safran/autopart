<?php

namespace TecCom\Order\FunctionCallRequest;

/**
 * Class representing ParameterDataType
 *
 * 
 * XSD Type: ParameterData
 */
class ParameterDataType
{
    /**
     * @var string $parameterValue
     */
    private $parameterValue = null;

    /**
     * @var string $parameterType
     */
    private $parameterType = null;

    /**
     * @var \TecCom\Order\FunctionCallRequest\DTOStringDictionaryType $attributes
     */
    private $attributes = null;

    /**
     * Gets as parameterValue
     *
     * @return string
     */
    public function getParameterValue()
    {
        return $this->parameterValue;
    }

    /**
     * Sets a new parameterValue
     *
     * @param string $parameterValue
     * @return self
     */
    public function setParameterValue($parameterValue)
    {
        $this->parameterValue = $parameterValue;
        return $this;
    }

    /**
     * Gets as parameterType
     *
     * @return string
     */
    public function getParameterType()
    {
        return $this->parameterType;
    }

    /**
     * Sets a new parameterType
     *
     * @param string $parameterType
     * @return self
     */
    public function setParameterType($parameterType)
    {
        $this->parameterType = $parameterType;
        return $this;
    }

    /**
     * Gets as attributes
     *
     * @return \TecCom\Order\FunctionCallRequest\DTOStringDictionaryType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes
     *
     * @param \TecCom\Order\FunctionCallRequest\DTOStringDictionaryType $attributes
     * @return self
     */
    public function setAttributes(?\TecCom\Order\FunctionCallRequest\DTOStringDictionaryType $attributes = null)
    {
        $this->attributes = $attributes;
        return $this;
    }
}

