<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing PkgIdType
 *
 * 
 * XSD Type: PkgIdType
 */
class PkgIdType
{
    /**
     * The numbering system of the code by which the package is identified on the label.
     *
     * @var string $system
     */
    private $system = null;

    /**
     * The actual identification code.
     *
     * @var string $number
     */
    private $number = null;

    /**
     * Gets as system
     *
     * The numbering system of the code by which the package is identified on the label.
     *
     * @return string
     */
    public function getSystem()
    {
        return $this->system;
    }

    /**
     * Sets a new system
     *
     * The numbering system of the code by which the package is identified on the label.
     *
     * @param string $system
     * @return self
     */
    public function setSystem($system)
    {
        $this->system = $system;
        return $this;
    }

    /**
     * Gets as number
     *
     * The actual identification code.
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
     * The actual identification code.
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

