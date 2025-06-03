<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing FreeTextValueType
 *
 * 
 * XSD Type: FreeTextValueType
 */
class FreeTextValueType
{
    /**
     * The type of the free text.
     *
     * @var string $qualifier
     */
    private $qualifier = null;

    /**
     * The actual free text.
     *
     * @var string $value
     */
    private $value = null;

    /**
     * Gets as qualifier
     *
     * The type of the free text.
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
     * The type of the free text.
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
     * The actual free text.
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
     * The actual free text.
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

