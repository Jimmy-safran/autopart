<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing AdditionalParametersType
 *
 * 
 * XSD Type: AdditionalParametersType
 */
class AdditionalParametersType
{
    /**
     * The type of the additional parameter.
     *
     * @var string $qualifier
     */
    private $qualifier = null;

    /**
     * The actual value of the additional parameter.
     *
     * @var string $value
     */
    private $value = null;

    /**
     * Gets as qualifier
     *
     * The type of the additional parameter.
     *
     * @return string
     */
    public function getQualifier()
    {
        return $this->qualifier;
    }

    /**
     * Sets a new qualifier
     *
     * The type of the additional parameter.
     *
     * @param string $qualifier
     * @return self
     */
    public function setQualifier($qualifier)
    {
        $this->qualifier = $qualifier;
        return $this;
    }

    /**
     * Gets as value
     *
     * The actual value of the additional parameter.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets a new value
     *
     * The actual value of the additional parameter.
     *
     * @param string $value
     * @return self
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}

