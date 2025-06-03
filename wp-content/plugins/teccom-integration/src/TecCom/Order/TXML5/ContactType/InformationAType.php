<?php

namespace TecCom\Order\TXML5\ContactType;

/**
 * Class representing InformationAType
 */
class InformationAType
{
    /**
     * The type of the contact.
     *
     * @var string $qualifier
     */
    private $qualifier = null;

    /**
     * The actual name of the contact.
     *
     * @var string $name
     */
    private $name = null;

    /**
     * Gets as qualifier
     *
     * The type of the contact.
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
     * The type of the contact.
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
     * Gets as name
     *
     * The actual name of the contact.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets a new name
     *
     * The actual name of the contact.
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}

