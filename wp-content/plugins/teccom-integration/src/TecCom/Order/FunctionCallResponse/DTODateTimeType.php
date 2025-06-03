<?php

namespace TecCom\Order\FunctionCallResponse;

/**
 * Class representing DTODateTimeType
 *
 * 
 * XSD Type: DTODateTime
 */
class DTODateTimeType
{
    /**
     * @var string $dateString
     */
    private $dateString = null;

    /**
     * @var string $timeBase
     */
    private $timeBase = null;

    /**
     * @var string $format
     */
    private $format = null;

    /**
     * Gets as dateString
     *
     * @return string
     */
    public function getDateString()
    {
        return $this->dateString;
    }

    /**
     * Sets a new dateString
     *
     * @param string $dateString
     * @return self
     */
    public function setDateString($dateString)
    {
        $this->dateString = $dateString;
        return $this;
    }

    /**
     * Gets as timeBase
     *
     * @return string
     */
    public function getTimeBase()
    {
        return $this->timeBase;
    }

    /**
     * Sets a new timeBase
     *
     * @param string $timeBase
     * @return self
     */
    public function setTimeBase($timeBase)
    {
        $this->timeBase = $timeBase;
        return $this;
    }

    /**
     * Gets as format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Sets a new format
     *
     * @param string $format
     * @return self
     */
    public function setFormat($format)
    {
        $this->format = $format;
        return $this;
    }
}

