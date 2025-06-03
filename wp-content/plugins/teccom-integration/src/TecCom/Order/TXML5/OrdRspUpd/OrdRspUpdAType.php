<?php

namespace TecCom\Order\TXML5\OrdRspUpd;

/**
 * Class representing OrdRspUpdAType
 */
class OrdRspUpdAType
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
     * Information about the whole order response.
     *
     * @var \TecCom\Order\TXML5\OrdRspUpd\OrdRspUpdAType\HeadAType $head
     */
    private $head = null;

    /**
     * Information about an individual order line.
     *
     * @var \TecCom\Order\TXML5\OrdRspUpd\OrdRspUpdAType\LineAType[] $line
     */
    private $line = [
        
    ];

    /**
     * The financial summary of the whole order response.
     *
     * @var \TecCom\Order\TXML5\SummaryType $summary
     */
    private $summary = null;

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
     * Information about the whole order response.
     *
     * @return \TecCom\Order\TXML5\OrdRspUpd\OrdRspUpdAType\HeadAType
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * Sets a new head
     *
     * Information about the whole order response.
     *
     * @param \TecCom\Order\TXML5\OrdRspUpd\OrdRspUpdAType\HeadAType $head
     * @return self
     */
    public function setHead(\TecCom\Order\TXML5\OrdRspUpd\OrdRspUpdAType\HeadAType $head)
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
     * @param \TecCom\Order\TXML5\OrdRspUpd\OrdRspUpdAType\LineAType $line
     */
    public function addToLine(\TecCom\Order\TXML5\OrdRspUpd\OrdRspUpdAType\LineAType $line)
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
     * @return \TecCom\Order\TXML5\OrdRspUpd\OrdRspUpdAType\LineAType[]
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
     * @param \TecCom\Order\TXML5\OrdRspUpd\OrdRspUpdAType\LineAType[] $line
     * @return self
     */
    public function setLine(array $line)
    {
        $this->line = $line;
        return $this;
    }

    /**
     * Gets as summary
     *
     * The financial summary of the whole order response.
     *
     * @return \TecCom\Order\TXML5\SummaryType
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Sets a new summary
     *
     * The financial summary of the whole order response.
     *
     * @param \TecCom\Order\TXML5\SummaryType $summary
     * @return self
     */
    public function setSummary(?\TecCom\Order\TXML5\SummaryType $summary = null)
    {
        $this->summary = $summary;
        return $this;
    }
}

