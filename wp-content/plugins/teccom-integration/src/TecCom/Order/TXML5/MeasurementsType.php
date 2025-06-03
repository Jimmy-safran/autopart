<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing MeasurementsType
 *
 * 
 * XSD Type: MeasurementsType
 */
class MeasurementsType
{
    /**
     * The type of measurement.
     *
     * @var string $qualifier
     */
    private $qualifier = null;

    /**
     * The unit of measurement.
     *
     * @var string $unit
     */
    private $unit = null;

    /**
     * The actual measurement.
     *
     * @var float $value
     */
    private $value = null;

    /**
     * Gets as qualifier
     *
     * The type of measurement.
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
     * The type of measurement.
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
     * Gets as unit
     *
     * The unit of measurement.
     *
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Sets a new unit
     *
     * The unit of measurement.
     *
     * @param string $unit
     * @return self
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * Gets as value
     *
     * The actual measurement.
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
     * The actual measurement.
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

