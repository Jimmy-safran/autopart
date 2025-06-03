<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing BrandType
 *
 * 
 * XSD Type: BrandType
 */
class BrandType
{
    /**
     * The type of the brand code.
     *
     * @var string $qualifier
     */
    private $qualifier = null;

    /**
     * The actual brand code.
     *
     * @var string $code
     */
    private $code = null;

    /**
     * Gets as qualifier
     *
     * The type of the brand code.
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
     * The type of the brand code.
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
     * Gets as code
     *
     * The actual brand code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets a new code
     *
     * The actual brand code.
     *
     * @param string $code
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }
}

