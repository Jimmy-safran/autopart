<?php

namespace TecCom\Order\TXML5\ContactType;

/**
 * Class representing CommunicationAType
 */
class CommunicationAType
{
    /**
     * The method of communication.
     *
     * @var string $qualifier
     */
    private $qualifier = null;

    /**
     * The actual communication address.
     *
     * @var string $value
     */
    private $value = null;

    /**
     * Gets as qualifier
     *
     * The method of communication.
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
     * The method of communication.
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
     * The actual communication address.
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
     * The actual communication address.
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

