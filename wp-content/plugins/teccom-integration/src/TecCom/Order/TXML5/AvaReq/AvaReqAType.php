<?php

namespace TecCom\Order\TXML5\AvaReq;

/**
 * Class representing AvaReqAType
 */
class AvaReqAType
{
    /**
     * The document's TXML version.
     *
     * This **must** be set to the fixed value provided in the schema.
     *
     * @var string $version
     */
    private $version = null;

    /**
     * Information about the whole availability request.
     *
     * @var \TecCom\Order\TXML5\AvaReq\AvaReqAType\HeadAType $head
     */
    private $head = null;

    /**
     * Information about an individual availability request line.
     *
     * @var \TecCom\Order\TXML5\AvaReq\AvaReqAType\LineAType[] $line
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
     * @return string
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
     * @param string $version
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
     * Information about the whole availability request.
     *
     * @return \TecCom\Order\TXML5\AvaReq\AvaReqAType\HeadAType
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * Sets a new head
     *
     * Information about the whole availability request.
     *
     * @param \TecCom\Order\TXML5\AvaReq\AvaReqAType\HeadAType $head
     * @return self
     */
    public function setHead(\TecCom\Order\TXML5\AvaReq\AvaReqAType\HeadAType $head)
    {
        $this->head = $head;
        return $this;
    }

    /**
     * Adds as line
     *
     * Information about an individual availability request line.
     *
     * @return self
     * @param \TecCom\Order\TXML5\AvaReq\AvaReqAType\LineAType $line
     */
    public function addToLine(\TecCom\Order\TXML5\AvaReq\AvaReqAType\LineAType $line)
    {
        $this->line[] = $line;
        return $this;
    }

    /**
     * isset line
     *
     * Information about an individual availability request line.
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
     * Information about an individual availability request line.
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
     * Information about an individual availability request line.
     *
     * @return \TecCom\Order\TXML5\AvaReq\AvaReqAType\LineAType[]
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * Sets a new line
     *
     * Information about an individual availability request line.
     *
     * @param \TecCom\Order\TXML5\AvaReq\AvaReqAType\LineAType[] $line
     * @return self
     */
    public function setLine(array $line)
    {
        $this->line = $line;
        return $this;
    }
}

