<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing QualifierValueType
 *
 * 
 * XSD Type: QualifierValueType
 */
class QualifierValueType
{
    /**
     * Kind of value.
     *
     * @var string $qualifier
     */
    private $qualifier = null;

    /**
     * Value of the defined type.
     *
     * @var string $value
     */
    private $value = null;

    /**
     * Gets as qualifier
     *
     * Kind of value.
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
     * Kind of value.
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
     * Value of the defined type.
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
     * Value of the defined type.
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

