<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing AddressType
 *
 * 
 * XSD Type: AddressType
 */
class AddressType
{
    /**
     * The party's name.
     *
     * It **should** be the official name of the entity as recorded in the commercial register and include the legal form of the entity, for example, `GmbH`.
     *
     * @var string $name1
     */
    private $name1 = null;

    /**
     * Continuation of `Name1` or additional information related to the party's name, for example, a department.
     *
     * @var string $name2
     */
    private $name2 = null;

    /**
     * Additional information related to the party's name.
     *
     * @var string $name3
     */
    private $name3 = null;

    /**
     * Additional information related to the party's name.
     *
     * @var string $name4
     */
    private $name4 = null;

    /**
     * The street and house number or a P.O. box number.
     *
     * It **should** be the same as recorded in the commercial register.
     *
     * @var string $street1
     */
    private $street1 = null;

    /**
     * Continuation of `Street1`, if needed, or additional information related to the party's street address.
     *
     * @var string $street2
     */
    private $street2 = null;

    /**
     * Continuation of `Street2`, if needed, or additional information related to the party's street address.
     *
     * @var string $street3
     */
    private $street3 = null;

    /**
     * Continuation of `Street3`, if needed, or additional information related to the party's street address.
     *
     * @var string $street4
     */
    private $street4 = null;

    /**
     * The postal code of the address.
     *
     * @var string $postalCode
     */
    private $postalCode = null;

    /**
     * The name of the town or city where the party is located.
     *
     * @var string $city
     */
    private $city = null;

    /**
     * The code of the state or province.
     *
     * It **must** be a valid ISO 3166-2 code.
     *
     * @var string $state
     */
    private $state = null;

    /**
     * The code of the country.
     *
     * It **must** be a valid ISO 3166-1 alpha 2 code.
     *
     * @var string $countryCode
     */
    private $countryCode = null;

    /**
     * The GPS coordinates of the location specified by the address.
     *
     * The coordinates **must** be given as decimal degrees latitude and longitude.
     *
     * @var string $coordinates
     */
    private $coordinates = null;

    /**
     * Gets as name1
     *
     * The party's name.
     *
     * It **should** be the official name of the entity as recorded in the commercial register and include the legal form of the entity, for example, `GmbH`.
     *
     * @return string
     */
    public function getName1()
    {
        return $this->name1;
    }

    /**
     * Sets a new name1
     *
     * The party's name.
     *
     * It **should** be the official name of the entity as recorded in the commercial register and include the legal form of the entity, for example, `GmbH`.
     *
     * @param string $name1
     * @return self
     */
    public function setName1($name1)
    {
        $this->name1 = $name1;
        return $this;
    }

    /**
     * Gets as name2
     *
     * Continuation of `Name1` or additional information related to the party's name, for example, a department.
     *
     * @return string
     */
    public function getName2()
    {
        return $this->name2;
    }

    /**
     * Sets a new name2
     *
     * Continuation of `Name1` or additional information related to the party's name, for example, a department.
     *
     * @param string $name2
     * @return self
     */
    public function setName2($name2)
    {
        $this->name2 = $name2;
        return $this;
    }

    /**
     * Gets as name3
     *
     * Additional information related to the party's name.
     *
     * @return string
     */
    public function getName3()
    {
        return $this->name3;
    }

    /**
     * Sets a new name3
     *
     * Additional information related to the party's name.
     *
     * @param string $name3
     * @return self
     */
    public function setName3($name3)
    {
        $this->name3 = $name3;
        return $this;
    }

    /**
     * Gets as name4
     *
     * Additional information related to the party's name.
     *
     * @return string
     */
    public function getName4()
    {
        return $this->name4;
    }

    /**
     * Sets a new name4
     *
     * Additional information related to the party's name.
     *
     * @param string $name4
     * @return self
     */
    public function setName4($name4)
    {
        $this->name4 = $name4;
        return $this;
    }

    /**
     * Gets as street1
     *
     * The street and house number or a P.O. box number.
     *
     * It **should** be the same as recorded in the commercial register.
     *
     * @return string
     */
    public function getStreet1()
    {
        return $this->street1;
    }

    /**
     * Sets a new street1
     *
     * The street and house number or a P.O. box number.
     *
     * It **should** be the same as recorded in the commercial register.
     *
     * @param string $street1
     * @return self
     */
    public function setStreet1($street1)
    {
        $this->street1 = $street1;
        return $this;
    }

    /**
     * Gets as street2
     *
     * Continuation of `Street1`, if needed, or additional information related to the party's street address.
     *
     * @return string
     */
    public function getStreet2()
    {
        return $this->street2;
    }

    /**
     * Sets a new street2
     *
     * Continuation of `Street1`, if needed, or additional information related to the party's street address.
     *
     * @param string $street2
     * @return self
     */
    public function setStreet2($street2)
    {
        $this->street2 = $street2;
        return $this;
    }

    /**
     * Gets as street3
     *
     * Continuation of `Street2`, if needed, or additional information related to the party's street address.
     *
     * @return string
     */
    public function getStreet3()
    {
        return $this->street3;
    }

    /**
     * Sets a new street3
     *
     * Continuation of `Street2`, if needed, or additional information related to the party's street address.
     *
     * @param string $street3
     * @return self
     */
    public function setStreet3($street3)
    {
        $this->street3 = $street3;
        return $this;
    }

    /**
     * Gets as street4
     *
     * Continuation of `Street3`, if needed, or additional information related to the party's street address.
     *
     * @return string
     */
    public function getStreet4()
    {
        return $this->street4;
    }

    /**
     * Sets a new street4
     *
     * Continuation of `Street3`, if needed, or additional information related to the party's street address.
     *
     * @param string $street4
     * @return self
     */
    public function setStreet4($street4)
    {
        $this->street4 = $street4;
        return $this;
    }

    /**
     * Gets as postalCode
     *
     * The postal code of the address.
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Sets a new postalCode
     *
     * The postal code of the address.
     *
     * @param string $postalCode
     * @return self
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * Gets as city
     *
     * The name of the town or city where the party is located.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets a new city
     *
     * The name of the town or city where the party is located.
     *
     * @param string $city
     * @return self
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Gets as state
     *
     * The code of the state or province.
     *
     * It **must** be a valid ISO 3166-2 code.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets a new state
     *
     * The code of the state or province.
     *
     * It **must** be a valid ISO 3166-2 code.
     *
     * @param string $state
     * @return self
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * Gets as countryCode
     *
     * The code of the country.
     *
     * It **must** be a valid ISO 3166-1 alpha 2 code.
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Sets a new countryCode
     *
     * The code of the country.
     *
     * It **must** be a valid ISO 3166-1 alpha 2 code.
     *
     * @param string $countryCode
     * @return self
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * Gets as coordinates
     *
     * The GPS coordinates of the location specified by the address.
     *
     * The coordinates **must** be given as decimal degrees latitude and longitude.
     *
     * @return string
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * Sets a new coordinates
     *
     * The GPS coordinates of the location specified by the address.
     *
     * The coordinates **must** be given as decimal degrees latitude and longitude.
     *
     * @param string $coordinates
     * @return self
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
        return $this;
    }
}

