<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing PartyType1Type
 *
 * 
 * XSD Type: PartyType1
 */
class PartyType1Type
{
    /**
     * The identifier of the party involved in the transaction.
     *
     * This identifier is used by the TecCom Order system for routing messages.
     *
     * @var string $number
     */
    private $number = null;

    /**
     * An additional identifier of the party involved in the transaction.
     *
     * This identifier is not used by the TecCom Order system for routing messages.
     *
     * @var \TecCom\Order\TXML5\AdditionalPartyNumberType[] $additionalPartyNumber
     */
    private $additionalPartyNumber = [
        
    ];

    /**
     * The address information of the party.
     *
     * @var \TecCom\Order\TXML5\AddressType $address
     */
    private $address = null;

    /**
     * The contact information of the party.
     *
     * @var \TecCom\Order\TXML5\ContactType $contact
     */
    private $contact = null;

    /**
     * Gets as number
     *
     * The identifier of the party involved in the transaction.
     *
     * This identifier is used by the TecCom Order system for routing messages.
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets a new number
     *
     * The identifier of the party involved in the transaction.
     *
     * This identifier is used by the TecCom Order system for routing messages.
     *
     * @param string $number
     * @return self
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Adds as additionalPartyNumber
     *
     * An additional identifier of the party involved in the transaction.
     *
     * This identifier is not used by the TecCom Order system for routing messages.
     *
     * @return self
     * @param \TecCom\Order\TXML5\AdditionalPartyNumberType $additionalPartyNumber
     */
    public function addToAdditionalPartyNumber(\TecCom\Order\TXML5\AdditionalPartyNumberType $additionalPartyNumber)
    {
        $this->additionalPartyNumber[] = $additionalPartyNumber;
        return $this;
    }

    /**
     * isset additionalPartyNumber
     *
     * An additional identifier of the party involved in the transaction.
     *
     * This identifier is not used by the TecCom Order system for routing messages.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAdditionalPartyNumber($index)
    {
        return isset($this->additionalPartyNumber[$index]);
    }

    /**
     * unset additionalPartyNumber
     *
     * An additional identifier of the party involved in the transaction.
     *
     * This identifier is not used by the TecCom Order system for routing messages.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAdditionalPartyNumber($index)
    {
        unset($this->additionalPartyNumber[$index]);
    }

    /**
     * Gets as additionalPartyNumber
     *
     * An additional identifier of the party involved in the transaction.
     *
     * This identifier is not used by the TecCom Order system for routing messages.
     *
     * @return \TecCom\Order\TXML5\AdditionalPartyNumberType[]
     */
    public function getAdditionalPartyNumber()
    {
        return $this->additionalPartyNumber;
    }

    /**
     * Sets a new additionalPartyNumber
     *
     * An additional identifier of the party involved in the transaction.
     *
     * This identifier is not used by the TecCom Order system for routing messages.
     *
     * @param \TecCom\Order\TXML5\AdditionalPartyNumberType[] $additionalPartyNumber
     * @return self
     */
    public function setAdditionalPartyNumber(?array $additionalPartyNumber = null)
    {
        $this->additionalPartyNumber = $additionalPartyNumber;
        return $this;
    }

    /**
     * Gets as address
     *
     * The address information of the party.
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
     * The address information of the party.
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
     * The contact information of the party.
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
     * The contact information of the party.
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

