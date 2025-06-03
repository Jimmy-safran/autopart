<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing AdditionalPartyNumberType
 *
 * 
 * XSD Type: AdditionalPartyNumberType
 */
class AdditionalPartyNumberType
{
    /**
     * The type of the additional party identifier.
     *
     * @var string $qualifier
     */
    private $qualifier = null;

    /**
     * The actual additional party identifier.
     *
     * @var string $number
     */
    private $number = null;

    /**
     * Gets as qualifier
     *
     * The type of the additional party identifier.
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
     * The type of the additional party identifier.
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
     * Gets as number
     *
     * The actual additional party identifier.
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets a new number
     *
     * The actual additional party identifier.
     *
     * @param string $number
     * @return self
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }
}

