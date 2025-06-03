<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing DateType
 *
 * 
 * XSD Type: DateType
 */
class DateType
{
    /**
     * How the date is to be interpreted.
     *
     * @var string $qualifier
     */
    private $qualifier = null;

    /**
     * The actual date.
     *
     * @var \DateTime $date
     */
    private $date = null;

    /**
     * Gets as qualifier
     *
     * How the date is to be interpreted.
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
     * How the date is to be interpreted.
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
     * Gets as date
     *
     * The actual date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets a new date
     *
     * The actual date.
     *
     * @param \DateTime $date
     * @return self
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
        return $this;
    }
}

