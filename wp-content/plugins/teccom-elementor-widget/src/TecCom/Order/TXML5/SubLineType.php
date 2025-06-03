<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing SubLineType
 *
 * 
 * XSD Type: SubLineType
 */
class SubLineType
{
    /**
     * The type of the subline.
     *
     * @var string $type
     */
    private $type = null;

    /**
     * The number of the subline.
     *
     * This number **must** start at `1` for the first subline and be incremented by `1` for every additional subline.
     *
     * @var int $subLineNumber
     */
    private $subLineNumber = null;

    /**
     * Gets as type
     *
     * The type of the subline.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets a new type
     *
     * The type of the subline.
     *
     * @param string $type
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Gets as subLineNumber
     *
     * The number of the subline.
     *
     * This number **must** start at `1` for the first subline and be incremented by `1` for every additional subline.
     *
     * @return int
     */
    public function getSubLineNumber()
    {
        return $this->subLineNumber;
    }

    /**
     * Sets a new subLineNumber
     *
     * The number of the subline.
     *
     * This number **must** start at `1` for the first subline and be incremented by `1` for every additional subline.
     *
     * @param int $subLineNumber
     * @return self
     */
    public function setSubLineNumber($subLineNumber)
    {
        $this->subLineNumber = $subLineNumber;
        return $this;
    }
}

