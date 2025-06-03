<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing ReferenceHeaderType
 *
 * 
 * XSD Type: ReferenceHeaderType
 */
class ReferenceHeaderType
{
    /**
     * The type of the reference.
     *
     * @var string $qualifier
     */
    private $qualifier = null;

    /**
     * The actual value of the reference.
     *
     * @var string $number
     */
    private $number = null;

    /**
     * The date when the referenced document was created or sent.
     *
     * The date's `Qualifier` for a reference **must** be set to `At`.
     *
     * @var \TecCom\Order\TXML5\DateType $date
     */
    private $date = null;

    /**
     * Gets as qualifier
     *
     * The type of the reference.
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
     * The type of the reference.
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
     * The actual value of the reference.
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
     * The actual value of the reference.
     *
     * @param string $number
     * @return self
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Gets as date
     *
     * The date when the referenced document was created or sent.
     *
     * The date's `Qualifier` for a reference **must** be set to `At`.
     *
     * @return \TecCom\Order\TXML5\DateType
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets a new date
     *
     * The date when the referenced document was created or sent.
     *
     * The date's `Qualifier` for a reference **must** be set to `At`.
     *
     * @param \TecCom\Order\TXML5\DateType $date
     * @return self
     */
    public function setDate(?\TecCom\Order\TXML5\DateType $date = null)
    {
        $this->date = $date;
        return $this;
    }
}

