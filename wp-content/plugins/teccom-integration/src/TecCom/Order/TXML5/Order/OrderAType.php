<?php

namespace TecCom\Order\TXML5\Order;

/**
 * Class representing OrderAType
 */
class OrderAType
{
    /**
     * The document's TXML version.
     *
     * This **must** be set to the fixed value provided in the schema.
     *
     * @var mixed $version
     */
    private $version = null;

    /**
     * Information about the whole order.
     *
     * @var \TecCom\Order\TXML5\Order\OrderAType\HeadAType $head
     */
    private $head = null;

    /**
     * Information about an individual order line.
     *
     * @var \TecCom\Order\TXML5\Order\OrderAType\LineAType[] $line
     */
    private $line = [
        
    ];

    /**
     * Gets as version
     *
     * The document's TXML version.
     *
     * This **must** be set to the fixed value provided in the schema.
     *
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Sets a new version
     *
     * The document's TXML version.
     *
     * This **must** be set to the fixed value provided in the schema.
     *
     * @param mixed $version
     * @return self
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * Gets as head
     *
     * Information about the whole order.
     *
     * @return \TecCom\Order\TXML5\Order\OrderAType\HeadAType
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * Sets a new head
     *
     * Information about the whole order.
     *
     * @param \TecCom\Order\TXML5\Order\OrderAType\HeadAType $head
     * @return self
     */
    public function setHead(\TecCom\Order\TXML5\Order\OrderAType\HeadAType $head)
    {
        $this->head = $head;
        return $this;
    }

    /**
     * Adds as line
     *
     * Information about an individual order line.
     *
     * @return self
     * @param \TecCom\Order\TXML5\Order\OrderAType\LineAType $line
     */
    public function addToLine(\TecCom\Order\TXML5\Order\OrderAType\LineAType $line)
    {
        $this->line[] = $line;
        return $this;
    }

    /**
     * isset line
     *
     * Information about an individual order line.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetLine($index)
    {
        return isset($this->line[$index]);
    }

    /**
     * unset line
     *
     * Information about an individual order line.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetLine($index)
    {
        unset($this->line[$index]);
    }

    /**
     * Gets as line
     *
     * Information about an individual order line.
     *
     * @return \TecCom\Order\TXML5\Order\OrderAType\LineAType[]
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * Sets a new line
     *
     * Information about an individual order line.
     *
     * @param \TecCom\Order\TXML5\Order\OrderAType\LineAType[] $line
     * @return self
     */
    public function setLine(array $line)
    {
        $this->line = $line;
        return $this;
    }
}

