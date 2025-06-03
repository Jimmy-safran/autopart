<?php

namespace TecCom\Order\TXML5\AllowOrChargeType;

/**
 * Class representing AllowanceAType
 */
class AllowanceAType
{
    /**
     * The type of allowance.
     *
     * @var string $code
     */
    private $code = null;

    /**
     * Gets as code
     *
     * The type of allowance.
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
     * The type of allowance.
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

