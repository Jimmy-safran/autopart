<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing ItemProcessingType
 *
 * 
 * XSD Type: ItemProcessingType
 */
class ItemProcessingType
{
    /**
     * Indicates to the seller if the buyer allows them to substitute the requested article with successor articles.
     *
     * @var bool $successor
     */
    private $successor = null;

    /**
     * Indicates to the seller if the buyer allows them to substitute the requested article with alternative articles with equivalent functionality.
     *
     * @var bool $substitution
     */
    private $substitution = null;

    /**
     * Indicates to the seller if the buyer allows them to susbstitute the requested article with refurbished articles.
     *
     * @var bool $exchangePart
     */
    private $exchangePart = null;

    /**
     * Gets as successor
     *
     * Indicates to the seller if the buyer allows them to substitute the requested article with successor articles.
     *
     * @return bool
     */
    public function getSuccessor()
    {
        return $this->successor;
    }

    /**
     * Sets a new successor
     *
     * Indicates to the seller if the buyer allows them to substitute the requested article with successor articles.
     *
     * @param bool $successor
     * @return self
     */
    public function setSuccessor($successor)
    {
        $this->successor = $successor;
        return $this;
    }

    /**
     * Gets as substitution
     *
     * Indicates to the seller if the buyer allows them to substitute the requested article with alternative articles with equivalent functionality.
     *
     * @return bool
     */
    public function getSubstitution()
    {
        return $this->substitution;
    }

    /**
     * Sets a new substitution
     *
     * Indicates to the seller if the buyer allows them to substitute the requested article with alternative articles with equivalent functionality.
     *
     * @param bool $substitution
     * @return self
     */
    public function setSubstitution($substitution)
    {
        $this->substitution = $substitution;
        return $this;
    }

    /**
     * Gets as exchangePart
     *
     * Indicates to the seller if the buyer allows them to susbstitute the requested article with refurbished articles.
     *
     * @return bool
     */
    public function getExchangePart()
    {
        return $this->exchangePart;
    }

    /**
     * Sets a new exchangePart
     *
     * Indicates to the seller if the buyer allows them to susbstitute the requested article with refurbished articles.
     *
     * @param bool $exchangePart
     * @return self
     */
    public function setExchangePart($exchangePart)
    {
        $this->exchangePart = $exchangePart;
        return $this;
    }
}

