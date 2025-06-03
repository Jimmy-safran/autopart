<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing ContactType
 *
 * 
 * XSD Type: ContactType
 */
class ContactType
{
    /**
     * Information about the contact.
     *
     * @var \TecCom\Order\TXML5\ContactType\InformationAType $information
     */
    private $information = null;

    /**
     * Information about how the contact can be reached.
     *
     * @var \TecCom\Order\TXML5\ContactType\CommunicationAType[] $communication
     */
    private $communication = [
        
    ];

    /**
     * A language in which communication with the contact is possible.
     *
     * 1. This **must** be a valid ISO 639 Set 1 code.
     *
     * 2. The buyer **can** express which language(s) they (or a recipient) prefer. 
     *
     * 3. The seller **can** express which language(s) it can respond in.
     *
     * 4. The seller **must** evaluate any language requested by the buyer and respond in the first language they support.
     *
     * 5. If the seller does not support any requested language, they **can** use their default language.
     *
     * @var string[] $language
     */
    private $language = [
        
    ];

    /**
     * Gets as information
     *
     * Information about the contact.
     *
     * @return \TecCom\Order\TXML5\ContactType\InformationAType
     */
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * Sets a new information
     *
     * Information about the contact.
     *
     * @param \TecCom\Order\TXML5\ContactType\InformationAType $information
     * @return self
     */
    public function setInformation(?\TecCom\Order\TXML5\ContactType\InformationAType $information = null)
    {
        $this->information = $information;
        return $this;
    }

    /**
     * Adds as communication
     *
     * Information about how the contact can be reached.
     *
     * @return self
     * @param \TecCom\Order\TXML5\ContactType\CommunicationAType $communication
     */
    public function addToCommunication(\TecCom\Order\TXML5\ContactType\CommunicationAType $communication)
    {
        $this->communication[] = $communication;
        return $this;
    }

    /**
     * isset communication
     *
     * Information about how the contact can be reached.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetCommunication($index)
    {
        return isset($this->communication[$index]);
    }

    /**
     * unset communication
     *
     * Information about how the contact can be reached.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetCommunication($index)
    {
        unset($this->communication[$index]);
    }

    /**
     * Gets as communication
     *
     * Information about how the contact can be reached.
     *
     * @return \TecCom\Order\TXML5\ContactType\CommunicationAType[]
     */
    public function getCommunication()
    {
        return $this->communication;
    }

    /**
     * Sets a new communication
     *
     * Information about how the contact can be reached.
     *
     * @param \TecCom\Order\TXML5\ContactType\CommunicationAType[] $communication
     * @return self
     */
    public function setCommunication(?array $communication = null)
    {
        $this->communication = $communication;
        return $this;
    }

    /**
     * Adds as language
     *
     * A language in which communication with the contact is possible.
     *
     * 1. This **must** be a valid ISO 639 Set 1 code.
     *
     * 2. The buyer **can** express which language(s) they (or a recipient) prefer. 
     *
     * 3. The seller **can** express which language(s) it can respond in.
     *
     * 4. The seller **must** evaluate any language requested by the buyer and respond in the first language they support.
     *
     * 5. If the seller does not support any requested language, they **can** use their default language.
     *
     * @return self
     * @param string $language
     */
    public function addToLanguage($language)
    {
        $this->language[] = $language;
        return $this;
    }

    /**
     * isset language
     *
     * A language in which communication with the contact is possible.
     *
     * 1. This **must** be a valid ISO 639 Set 1 code.
     *
     * 2. The buyer **can** express which language(s) they (or a recipient) prefer. 
     *
     * 3. The seller **can** express which language(s) it can respond in.
     *
     * 4. The seller **must** evaluate any language requested by the buyer and respond in the first language they support.
     *
     * 5. If the seller does not support any requested language, they **can** use their default language.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetLanguage($index)
    {
        return isset($this->language[$index]);
    }

    /**
     * unset language
     *
     * A language in which communication with the contact is possible.
     *
     * 1. This **must** be a valid ISO 639 Set 1 code.
     *
     * 2. The buyer **can** express which language(s) they (or a recipient) prefer. 
     *
     * 3. The seller **can** express which language(s) it can respond in.
     *
     * 4. The seller **must** evaluate any language requested by the buyer and respond in the first language they support.
     *
     * 5. If the seller does not support any requested language, they **can** use their default language.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetLanguage($index)
    {
        unset($this->language[$index]);
    }

    /**
     * Gets as language
     *
     * A language in which communication with the contact is possible.
     *
     * 1. This **must** be a valid ISO 639 Set 1 code.
     *
     * 2. The buyer **can** express which language(s) they (or a recipient) prefer. 
     *
     * 3. The seller **can** express which language(s) it can respond in.
     *
     * 4. The seller **must** evaluate any language requested by the buyer and respond in the first language they support.
     *
     * 5. If the seller does not support any requested language, they **can** use their default language.
     *
     * @return string[]
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Sets a new language
     *
     * A language in which communication with the contact is possible.
     *
     * 1. This **must** be a valid ISO 639 Set 1 code.
     *
     * 2. The buyer **can** express which language(s) they (or a recipient) prefer. 
     *
     * 3. The seller **can** express which language(s) it can respond in.
     *
     * 4. The seller **must** evaluate any language requested by the buyer and respond in the first language they support.
     *
     * 5. If the seller does not support any requested language, they **can** use their default language.
     *
     * @param string $language
     * @return self
     */
    public function setLanguage(?array $language = null)
    {
        $this->language = $language;
        return $this;
    }
}

