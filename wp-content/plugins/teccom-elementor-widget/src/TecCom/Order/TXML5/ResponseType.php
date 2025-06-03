<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing ResponseType
 *
 * 
 * XSD Type: ResponseType
 */
class ResponseType
{
    /**
     * The class of the status information.
     *
     * @var string $class
     */
    private $class = null;

    /**
     * The number of the status information.
     *
     * Numbers less than 3000 are pre-defined by TecCom. Numbers greater than or equal to 3000 are seller-specific.
     *
     * @var int $code
     */
    private $code = null;

    /**
     * The text that describes the status information in human-readable form.
     *
     * @var string $text
     */
    private $text = null;

    /**
     * Gets as class
     *
     * The class of the status information.
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Sets a new class
     *
     * The class of the status information.
     *
     * @param string $class
     * @return self
     */
    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    /**
     * Gets as code
     *
     * The number of the status information.
     *
     * Numbers less than 3000 are pre-defined by TecCom. Numbers greater than or equal to 3000 are seller-specific.
     *
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets a new code
     *
     * The number of the status information.
     *
     * Numbers less than 3000 are pre-defined by TecCom. Numbers greater than or equal to 3000 are seller-specific.
     *
     * @param int $code
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Gets as text
     *
     * The text that describes the status information in human-readable form.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Sets a new text
     *
     * The text that describes the status information in human-readable form.
     *
     * @param string $text
     * @return self
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }
}

