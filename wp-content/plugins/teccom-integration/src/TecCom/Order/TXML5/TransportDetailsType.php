<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing TransportDetailsType
 *
 * 
 * XSD Type: TransportDetailsType
 */
class TransportDetailsType
{
    /**
     * @var string $transportMode
     */
    private $transportMode = null;

    /**
     * @var string $transportTypeMeansCode
     */
    private $transportTypeMeansCode = null;

    /**
     * @var string $transportTypeMeansFree
     */
    private $transportTypeMeansFree = null;

    /**
     * @var string $carrierIdentificationILN
     */
    private $carrierIdentificationILN = null;

    /**
     * Gets as transportMode
     *
     * @return string
     */
    public function getTransportMode()
    {
        return $this->transportMode;
    }

    /**
     * Sets a new transportMode
     *
     * @param string $transportMode
     * @return self
     */
    public function setTransportMode($transportMode)
    {
        $this->transportMode = $transportMode;
        return $this;
    }

    /**
     * Gets as transportTypeMeansCode
     *
     * @return string
     */
    public function getTransportTypeMeansCode()
    {
        return $this->transportTypeMeansCode;
    }

    /**
     * Sets a new transportTypeMeansCode
     *
     * @param string $transportTypeMeansCode
     * @return self
     */
    public function setTransportTypeMeansCode($transportTypeMeansCode)
    {
        $this->transportTypeMeansCode = $transportTypeMeansCode;
        return $this;
    }

    /**
     * Gets as transportTypeMeansFree
     *
     * @return string
     */
    public function getTransportTypeMeansFree()
    {
        return $this->transportTypeMeansFree;
    }

    /**
     * Sets a new transportTypeMeansFree
     *
     * @param string $transportTypeMeansFree
     * @return self
     */
    public function setTransportTypeMeansFree($transportTypeMeansFree)
    {
        $this->transportTypeMeansFree = $transportTypeMeansFree;
        return $this;
    }

    /**
     * Gets as carrierIdentificationILN
     *
     * @return string
     */
    public function getCarrierIdentificationILN()
    {
        return $this->carrierIdentificationILN;
    }

    /**
     * Sets a new carrierIdentificationILN
     *
     * @param string $carrierIdentificationILN
     * @return self
     */
    public function setCarrierIdentificationILN($carrierIdentificationILN)
    {
        $this->carrierIdentificationILN = $carrierIdentificationILN;
        return $this;
    }
}

