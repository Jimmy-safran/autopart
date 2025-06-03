<?php

namespace TecCom\Order\TXML5\AllowOrChargeType;

/**
 * Class representing ChargeAType
 */
class ChargeAType
{
    /**
     * The type of charge.
     *
     * @var string $code
     */
    private $code = null;

    /**
     * Gets as code
     *
     * The type of charge.
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
     * The type of charge.
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

