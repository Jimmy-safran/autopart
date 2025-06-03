<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing ExternalDocumentType
 *
 * 
 * XSD Type: ExternalDocumentType
 */
class ExternalDocumentType
{
    /**
     * The type of the external resource.
     *
     * @var string $qualifier
     */
    private $qualifier = null;

    /**
     * The title of the external resource.
     *
     * @var string $title
     */
    private $title = null;

    /**
     * The actual hyperlink to the external resource.
     *
     * @var string $link
     */
    private $link = null;

    /**
     * Gets as qualifier
     *
     * The type of the external resource.
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
     * The type of the external resource.
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
     * Gets as title
     *
     * The title of the external resource.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets a new title
     *
     * The title of the external resource.
     *
     * @param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Gets as link
     *
     * The actual hyperlink to the external resource.
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Sets a new link
     *
     * The actual hyperlink to the external resource.
     *
     * @param string $link
     * @return self
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }
}

