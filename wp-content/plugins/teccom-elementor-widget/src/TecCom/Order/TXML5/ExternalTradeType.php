<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing ExternalTradeType
 *
 * 
 * XSD Type: ExternalTrade
 */
class ExternalTradeType
{
    /**
     * The country in which the article was manufactured or significantly altered.
     *
     * This **must** be a valid ISO 3166-1 alpha 2 code.
     *
     * @var string $countryOfOrigin
     */
    private $countryOfOrigin = null;

    /**
     * The region in which the article was manufactured or significantly altered.
     *
     * This **must** be a valid ISO 3166-2 code.
     *
     * @var string $regionOfOrigin
     */
    private $regionOfOrigin = null;

    /**
     * The code of the commodity group the article belongs to in the harmonized system for customs tariffs.
     *
     * @var string $harmonizedTariffSystem
     */
    private $harmonizedTariffSystem = null;

    /**
     * The preference indicator of the article if it is eligible for preferential treatment.
     *
     * @var string $customsOriginPreference
     */
    private $customsOriginPreference = null;

    /**
     * Gets as countryOfOrigin
     *
     * The country in which the article was manufactured or significantly altered.
     *
     * This **must** be a valid ISO 3166-1 alpha 2 code.
     *
     * @return string
     */
    public function getCountryOfOrigin()
    {
        return $this->countryOfOrigin;
    }

    /**
     * Sets a new countryOfOrigin
     *
     * The country in which the article was manufactured or significantly altered.
     *
     * This **must** be a valid ISO 3166-1 alpha 2 code.
     *
     * @param string $countryOfOrigin
     * @return self
     */
    public function setCountryOfOrigin($countryOfOrigin)
    {
        $this->countryOfOrigin = $countryOfOrigin;
        return $this;
    }

    /**
     * Gets as regionOfOrigin
     *
     * The region in which the article was manufactured or significantly altered.
     *
     * This **must** be a valid ISO 3166-2 code.
     *
     * @return string
     */
    public function getRegionOfOrigin()
    {
        return $this->regionOfOrigin;
    }

    /**
     * Sets a new regionOfOrigin
     *
     * The region in which the article was manufactured or significantly altered.
     *
     * This **must** be a valid ISO 3166-2 code.
     *
     * @param string $regionOfOrigin
     * @return self
     */
    public function setRegionOfOrigin($regionOfOrigin)
    {
        $this->regionOfOrigin = $regionOfOrigin;
        return $this;
    }

    /**
     * Gets as harmonizedTariffSystem
     *
     * The code of the commodity group the article belongs to in the harmonized system for customs tariffs.
     *
     * @return string
     */
    public function getHarmonizedTariffSystem()
    {
        return $this->harmonizedTariffSystem;
    }

    /**
     * Sets a new harmonizedTariffSystem
     *
     * The code of the commodity group the article belongs to in the harmonized system for customs tariffs.
     *
     * @param string $harmonizedTariffSystem
     * @return self
     */
    public function setHarmonizedTariffSystem($harmonizedTariffSystem)
    {
        $this->harmonizedTariffSystem = $harmonizedTariffSystem;
        return $this;
    }

    /**
     * Gets as customsOriginPreference
     *
     * The preference indicator of the article if it is eligible for preferential treatment.
     *
     * @return string
     */
    public function getCustomsOriginPreference()
    {
        return $this->customsOriginPreference;
    }

    /**
     * Sets a new customsOriginPreference
     *
     * The preference indicator of the article if it is eligible for preferential treatment.
     *
     * @param string $customsOriginPreference
     * @return self
     */
    public function setCustomsOriginPreference($customsOriginPreference)
    {
        $this->customsOriginPreference = $customsOriginPreference;
        return $this;
    }
}

