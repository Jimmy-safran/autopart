<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing IncotermsType
 *
 * 
 * XSD Type: IncotermsType
 */
class IncotermsType
{
    /**
     * The Incoterms rule.
     *
     * @var string $qualifier
     */
    private $qualifier = null;

    /**
     * The place of delivery or destination, or the port of loading or destination.
     *
     * @var string $value
     */
    private $value = null;

    /**
     * Gets as qualifier
     *
     * The Incoterms rule.
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
     * The Incoterms rule.
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
     * The place of delivery or destination, or the port of loading or destination.
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
     * The place of delivery or destination, or the port of loading or destination.
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

