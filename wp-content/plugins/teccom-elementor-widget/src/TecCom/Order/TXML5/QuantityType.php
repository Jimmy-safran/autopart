<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing QuantityType
 *
 * 
 * XSD Type: QuantityType
 */
class QuantityType
{
    /**
     * The unit of measurement.
     *
     * @var string $uoM
     */
    private $uoM = null;

    /**
     * The actual quantity in the given unit of measurement.
     *
     * @var float $value
     */
    private $value = null;

    /**
     * Gets as uoM
     *
     * The unit of measurement.
     *
     * @return string
     */
    public function getUoM()
    {
        return $this->uoM;
    }

    /**
     * Sets a new uoM
     *
     * The unit of measurement.
     *
     * @param string $uoM
     * @return self
     */
    public function setUoM($uoM)
    {
        $this->uoM = $uoM;
        return $this;
    }

    /**
     * Gets as value
     *
     * The actual quantity in the given unit of measurement.
     *
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets a new value
     *
     * The actual quantity in the given unit of measurement.
     *
     * @param float $value
     * @return self
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}

