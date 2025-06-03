<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing AdditionalPartyType
 *
 * 
 * XSD Type: AdditionalPartyType
 */
class AdditionalPartyType
{
    /**
     * The type of the additional party.
     *
     * @var string $qualifier
     */
    private $qualifier = null;

    /**
     * An identifier of the additional party.
     *
     * @var \TecCom\Order\TXML5\AdditionalPartyNumberType[] $number
     */
    private $number = [
        
    ];

    /**
     * The address of the additional party.
     *
     * @var \TecCom\Order\TXML5\AddressType $address
     */
    private $address = null;

    /**
     * Contact information of the additional party.
     *
     * This **must** be sent by the buyer if the type of the additional party is `ThirdParty` or `Unloading`.
     *
     * @var \TecCom\Order\TXML5\ContactType $contact
     */
    private $contact = null;

    /**
     * Gets as qualifier
     *
     * The type of the additional party.
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
     * The type of the additional party.
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
     * Adds as number
     *
     * An identifier of the additional party.
     *
     * @return self
     * @param \TecCom\Order\TXML5\AdditionalPartyNumberType $number
     */
    public function addToNumber(\TecCom\Order\TXML5\AdditionalPartyNumberType $number)
    {
        $this->number[] = $number;
        return $this;
    }

    /**
     * isset number
     *
     * An identifier of the additional party.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetNumber($index)
    {
        return isset($this->number[$index]);
    }

    /**
     * unset number
     *
     * An identifier of the additional party.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetNumber($index)
    {
        unset($this->number[$index]);
    }

    /**
     * Gets as number
     *
     * An identifier of the additional party.
     *
     * @return \TecCom\Order\TXML5\AdditionalPartyNumberType[]
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets a new number
     *
     * An identifier of the additional party.
     *
     * @param \TecCom\Order\TXML5\AdditionalPartyNumberType[] $number
     * @return self
     */
    public function setNumber(?array $number = null)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Gets as address
     *
     * The address of the additional party.
     *
     * @return \TecCom\Order\TXML5\AddressType
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets a new address
     *
     * The address of the additional party.
     *
     * @param \TecCom\Order\TXML5\AddressType $address
     * @return self
     */
    public function setAddress(?\TecCom\Order\TXML5\AddressType $address = null)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Gets as contact
     *
     * Contact information of the additional party.
     *
     * This **must** be sent by the buyer if the type of the additional party is `ThirdParty` or `Unloading`.
     *
     * @return \TecCom\Order\TXML5\ContactType
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Sets a new contact
     *
     * Contact information of the additional party.
     *
     * This **must** be sent by the buyer if the type of the additional party is `ThirdParty` or `Unloading`.
     *
     * @param \TecCom\Order\TXML5\ContactType $contact
     * @return self
     */
    public function setContact(?\TecCom\Order\TXML5\ContactType $contact = null)
    {
        $this->contact = $contact;
        return $this;
    }
}

