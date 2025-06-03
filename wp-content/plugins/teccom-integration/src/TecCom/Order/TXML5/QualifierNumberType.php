<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing QualifierNumberType
 *
 * 
 * XSD Type: QualifierNumberType
 */
class QualifierNumberType
{
    /**
     * The type of the number.
     *
     * @var string $qualifier
     */
    private $qualifier = null;

    /**
     * The actual number.
     *
     * @var string $number
     */
    private $number = null;

    /**
     * Gets as qualifier
     *
     * The type of the number.
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
     * The type of the number.
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
     * The actual number.
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
     * The actual number.
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

