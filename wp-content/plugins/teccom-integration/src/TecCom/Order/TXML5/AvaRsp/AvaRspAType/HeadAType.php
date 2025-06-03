<?php

namespace TecCom\Order\TXML5\AvaRsp\AvaRspAType;

/**
 * Class representing HeadAType
 */
class HeadAType
{
    /**
     * The identifier of the availability response.
     *
     * This **must** be unique over all availability responses the seller sends. That is, no two availability responses may share the same identifier.
     *
     * @var string $documentNumber
     */
    private $documentNumber = null;

    /**
     * The specific point in time when the availability response was created.
     *
     * It **must** include the time zone (which is the number of hours and minutes the given date and time is ahead or behind UTC time).
     *
     * @var \DateTime $issueDate
     */
    private $issueDate = null;

    /**
     * A reference to another document.
     *
     * If the buyer has sent a `DocumentNumber`, then the seller **must** add a reference to the buyer's availability request with the qualifier `BuyerOrderNumber`. Its value **must** be the `DocumentNumber` of the buyer's availability request.
     *
     * @var \TecCom\Order\TXML5\ReferenceHeaderType[] $reference
     */
    private $reference = [
        
    ];

    /**
     * Information about the seller.
     *
     * The `Number` for the seller party is usually assigned by the buyer. It is the number under which the seller is known in the buyer's ERP system.
     *
     * The seller **must** return their own address and contact information.
     *
     * @var \TecCom\Order\TXML5\PartyType1Type $sellerParty
     */
    private $sellerParty = null;

    /**
     * Information about the buyer.
     *
     * The `Number` for the buyer party is usually assigned by the seller. It is the number under which the buyer is known in the seller's ERP system.
     *
     * 1. The seller **must** return the buyer's address and contact information stored in the seller ERP system for the buyer party number sent by the buyer.
     *
     * 2. It is **not allowed** to copy these values from the availability request.
     *
     * @var \TecCom\Order\TXML5\PartyType1Type $buyerParty
     */
    private $buyerParty = null;

    /**
     * Information about the recipient of the availability request.
     *
     * 1. The seller **must** return the recipient's address and contact information stored in the seller ERP system for the delivery party number sent by the buyer.
     *
     * 2. It is **not allowed** to copy these values from the availability request.
     *
     * @var \TecCom\Order\TXML5\PartyType2Type $deliveryParty
     */
    private $deliveryParty = null;

    /**
     * Information about another party involved in the availability request.
     *
     * @var \TecCom\Order\TXML5\AdditionalPartyType[] $additionalParty
     */
    private $additionalParty = [
        
    ];

    /**
     * Information about the currency of the availability response.
     *
     * @var \TecCom\Order\TXML5\CurrencyType $currency
     */
    private $currency = null;

    /**
     * The processing instructions the buyer has sent in the availability request.
     *
     * This **must** be copied from the availability request unchanged.
     *
     * @var \TecCom\Order\TXML5\ProcessingInstructionsType $processingInstructions
     */
    private $processingInstructions = null;

    /**
     * An external resource that applies to the whole availability response.
     *
     * @var \TecCom\Order\TXML5\ExternalDocumentType[] $externalDocument
     */
    private $externalDocument = [
        
    ];

    /**
     * An allowance or charge that applies to the whole availability response.
     *
     * @var \TecCom\Order\TXML5\AllowOrChargeType[] $allowOrCharge
     */
    private $allowOrCharge = [
        
    ];

    /**
     * A tax that applies to the whole availability response.
     *
     * @var \TecCom\Order\TXML5\TaxType[] $tax
     */
    private $tax = [
        
    ];

    /**
     * An additional parameter that conveys specific information that applies to the whole availability response.
     *
     * The seller **must** only use these qualifiers:
     *
     * 1. `StorageLocation`
     * 2. `MinimumOrderValue`
     *
     * @var \TecCom\Order\TXML5\AdditionalParametersType[] $additionalParameters
     */
    private $additionalParameters = [
        
    ];

    /**
     * Information about the terms of payment.
     *
     * 1. The seller **can** use this to inform the buyer how they expect them to pay for the order.
     *
     * 2. If the buyer has sent the mode `PayBeforeOrder` in the availability request, then the seller **must** return a payment reference the buyer can use for pre-paying the order.
     *
     * @var \TecCom\Order\TXML5\PaymentType $payment
     */
    private $payment = null;

    /**
     * Arbitrary information that relates to the whole document.
     *
     * Free text **must** be agreed between buyer and seller, otherwise the buyer will ignore it.
     *
     * @var \TecCom\Order\TXML5\FreeTextValueType[] $freeText
     */
    private $freeText = [
        
    ];

    /**
     * A status information response that applies to the whole availability response.
     *
     * 1. The seller **must** send status information responses to the buyer to unambiguously inform them about defined situations that occurred during the processing of the availability request.
     *
     * 2. For that, the seller **must** use the pre-defined TecCom status information responses or define their own.
     *
     * 3. The seller **must** communicate their own status information responses to the buyer.
     *
     * 4. The buyer **must** evaluate the status information responses to have their implementation react accordingly.
     *
     * @var \TecCom\Order\TXML5\ResponseType[] $response
     */
    private $response = [
        
    ];

    /**
     * Gets as documentNumber
     *
     * The identifier of the availability response.
     *
     * This **must** be unique over all availability responses the seller sends. That is, no two availability responses may share the same identifier.
     *
     * @return string
     */
    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    /**
     * Sets a new documentNumber
     *
     * The identifier of the availability response.
     *
     * This **must** be unique over all availability responses the seller sends. That is, no two availability responses may share the same identifier.
     *
     * @param string $documentNumber
     * @return self
     */
    public function setDocumentNumber($documentNumber)
    {
        $this->documentNumber = $documentNumber;
        return $this;
    }

    /**
     * Gets as issueDate
     *
     * The specific point in time when the availability response was created.
     *
     * It **must** include the time zone (which is the number of hours and minutes the given date and time is ahead or behind UTC time).
     *
     * @return \DateTime
     */
    public function getIssueDate()
    {
        return $this->issueDate;
    }

    /**
     * Sets a new issueDate
     *
     * The specific point in time when the availability response was created.
     *
     * It **must** include the time zone (which is the number of hours and minutes the given date and time is ahead or behind UTC time).
     *
     * @param \DateTime $issueDate
     * @return self
     */
    public function setIssueDate(\DateTime $issueDate)
    {
        $this->issueDate = $issueDate;
        return $this;
    }

    /**
     * Adds as reference
     *
     * A reference to another document.
     *
     * If the buyer has sent a `DocumentNumber`, then the seller **must** add a reference to the buyer's availability request with the qualifier `BuyerOrderNumber`. Its value **must** be the `DocumentNumber` of the buyer's availability request.
     *
     * @return self
     * @param \TecCom\Order\TXML5\ReferenceHeaderType $reference
     */
    public function addToReference(\TecCom\Order\TXML5\ReferenceHeaderType $reference)
    {
        $this->reference[] = $reference;
        return $this;
    }

    /**
     * isset reference
     *
     * A reference to another document.
     *
     * If the buyer has sent a `DocumentNumber`, then the seller **must** add a reference to the buyer's availability request with the qualifier `BuyerOrderNumber`. Its value **must** be the `DocumentNumber` of the buyer's availability request.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetReference($index)
    {
        return isset($this->reference[$index]);
    }

    /**
     * unset reference
     *
     * A reference to another document.
     *
     * If the buyer has sent a `DocumentNumber`, then the seller **must** add a reference to the buyer's availability request with the qualifier `BuyerOrderNumber`. Its value **must** be the `DocumentNumber` of the buyer's availability request.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetReference($index)
    {
        unset($this->reference[$index]);
    }

    /**
     * Gets as reference
     *
     * A reference to another document.
     *
     * If the buyer has sent a `DocumentNumber`, then the seller **must** add a reference to the buyer's availability request with the qualifier `BuyerOrderNumber`. Its value **must** be the `DocumentNumber` of the buyer's availability request.
     *
     * @return \TecCom\Order\TXML5\ReferenceHeaderType[]
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Sets a new reference
     *
     * A reference to another document.
     *
     * If the buyer has sent a `DocumentNumber`, then the seller **must** add a reference to the buyer's availability request with the qualifier `BuyerOrderNumber`. Its value **must** be the `DocumentNumber` of the buyer's availability request.
     *
     * @param \TecCom\Order\TXML5\ReferenceHeaderType[] $reference
     * @return self
     */
    public function setReference(?array $reference = null)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * Gets as sellerParty
     *
     * Information about the seller.
     *
     * The `Number` for the seller party is usually assigned by the buyer. It is the number under which the seller is known in the buyer's ERP system.
     *
     * The seller **must** return their own address and contact information.
     *
     * @return \TecCom\Order\TXML5\PartyType1Type
     */
    public function getSellerParty()
    {
        return $this->sellerParty;
    }

    /**
     * Sets a new sellerParty
     *
     * Information about the seller.
     *
     * The `Number` for the seller party is usually assigned by the buyer. It is the number under which the seller is known in the buyer's ERP system.
     *
     * The seller **must** return their own address and contact information.
     *
     * @param \TecCom\Order\TXML5\PartyType1Type $sellerParty
     * @return self
     */
    public function setSellerParty(\TecCom\Order\TXML5\PartyType1Type $sellerParty)
    {
        $this->sellerParty = $sellerParty;
        return $this;
    }

    /**
     * Gets as buyerParty
     *
     * Information about the buyer.
     *
     * The `Number` for the buyer party is usually assigned by the seller. It is the number under which the buyer is known in the seller's ERP system.
     *
     * 1. The seller **must** return the buyer's address and contact information stored in the seller ERP system for the buyer party number sent by the buyer.
     *
     * 2. It is **not allowed** to copy these values from the availability request.
     *
     * @return \TecCom\Order\TXML5\PartyType1Type
     */
    public function getBuyerParty()
    {
        return $this->buyerParty;
    }

    /**
     * Sets a new buyerParty
     *
     * Information about the buyer.
     *
     * The `Number` for the buyer party is usually assigned by the seller. It is the number under which the buyer is known in the seller's ERP system.
     *
     * 1. The seller **must** return the buyer's address and contact information stored in the seller ERP system for the buyer party number sent by the buyer.
     *
     * 2. It is **not allowed** to copy these values from the availability request.
     *
     * @param \TecCom\Order\TXML5\PartyType1Type $buyerParty
     * @return self
     */
    public function setBuyerParty(\TecCom\Order\TXML5\PartyType1Type $buyerParty)
    {
        $this->buyerParty = $buyerParty;
        return $this;
    }

    /**
     * Gets as deliveryParty
     *
     * Information about the recipient of the availability request.
     *
     * 1. The seller **must** return the recipient's address and contact information stored in the seller ERP system for the delivery party number sent by the buyer.
     *
     * 2. It is **not allowed** to copy these values from the availability request.
     *
     * @return \TecCom\Order\TXML5\PartyType2Type
     */
    public function getDeliveryParty()
    {
        return $this->deliveryParty;
    }

    /**
     * Sets a new deliveryParty
     *
     * Information about the recipient of the availability request.
     *
     * 1. The seller **must** return the recipient's address and contact information stored in the seller ERP system for the delivery party number sent by the buyer.
     *
     * 2. It is **not allowed** to copy these values from the availability request.
     *
     * @param \TecCom\Order\TXML5\PartyType2Type $deliveryParty
     * @return self
     */
    public function setDeliveryParty(?\TecCom\Order\TXML5\PartyType2Type $deliveryParty = null)
    {
        $this->deliveryParty = $deliveryParty;
        return $this;
    }

    /**
     * Adds as additionalParty
     *
     * Information about another party involved in the availability request.
     *
     * @return self
     * @param \TecCom\Order\TXML5\AdditionalPartyType $additionalParty
     */
    public function addToAdditionalParty(\TecCom\Order\TXML5\AdditionalPartyType $additionalParty)
    {
        $this->additionalParty[] = $additionalParty;
        return $this;
    }

    /**
     * isset additionalParty
     *
     * Information about another party involved in the availability request.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAdditionalParty($index)
    {
        return isset($this->additionalParty[$index]);
    }

    /**
     * unset additionalParty
     *
     * Information about another party involved in the availability request.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAdditionalParty($index)
    {
        unset($this->additionalParty[$index]);
    }

    /**
     * Gets as additionalParty
     *
     * Information about another party involved in the availability request.
     *
     * @return \TecCom\Order\TXML5\AdditionalPartyType[]
     */
    public function getAdditionalParty()
    {
        return $this->additionalParty;
    }

    /**
     * Sets a new additionalParty
     *
     * Information about another party involved in the availability request.
     *
     * @param \TecCom\Order\TXML5\AdditionalPartyType[] $additionalParty
     * @return self
     */
    public function setAdditionalParty(?array $additionalParty = null)
    {
        $this->additionalParty = $additionalParty;
        return $this;
    }

    /**
     * Gets as currency
     *
     * Information about the currency of the availability response.
     *
     * @return \TecCom\Order\TXML5\CurrencyType
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Sets a new currency
     *
     * Information about the currency of the availability response.
     *
     * @param \TecCom\Order\TXML5\CurrencyType $currency
     * @return self
     */
    public function setCurrency(\TecCom\Order\TXML5\CurrencyType $currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * Gets as processingInstructions
     *
     * The processing instructions the buyer has sent in the availability request.
     *
     * This **must** be copied from the availability request unchanged.
     *
     * @return \TecCom\Order\TXML5\ProcessingInstructionsType
     */
    public function getProcessingInstructions()
    {
        return $this->processingInstructions;
    }

    /**
     * Sets a new processingInstructions
     *
     * The processing instructions the buyer has sent in the availability request.
     *
     * This **must** be copied from the availability request unchanged.
     *
     * @param \TecCom\Order\TXML5\ProcessingInstructionsType $processingInstructions
     * @return self
     */
    public function setProcessingInstructions(\TecCom\Order\TXML5\ProcessingInstructionsType $processingInstructions)
    {
        $this->processingInstructions = $processingInstructions;
        return $this;
    }

    /**
     * Adds as externalDocument
     *
     * An external resource that applies to the whole availability response.
     *
     * @return self
     * @param \TecCom\Order\TXML5\ExternalDocumentType $externalDocument
     */
    public function addToExternalDocument(\TecCom\Order\TXML5\ExternalDocumentType $externalDocument)
    {
        $this->externalDocument[] = $externalDocument;
        return $this;
    }

    /**
     * isset externalDocument
     *
     * An external resource that applies to the whole availability response.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetExternalDocument($index)
    {
        return isset($this->externalDocument[$index]);
    }

    /**
     * unset externalDocument
     *
     * An external resource that applies to the whole availability response.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetExternalDocument($index)
    {
        unset($this->externalDocument[$index]);
    }

    /**
     * Gets as externalDocument
     *
     * An external resource that applies to the whole availability response.
     *
     * @return \TecCom\Order\TXML5\ExternalDocumentType[]
     */
    public function getExternalDocument()
    {
        return $this->externalDocument;
    }

    /**
     * Sets a new externalDocument
     *
     * An external resource that applies to the whole availability response.
     *
     * @param \TecCom\Order\TXML5\ExternalDocumentType[] $externalDocument
     * @return self
     */
    public function setExternalDocument(?array $externalDocument = null)
    {
        $this->externalDocument = $externalDocument;
        return $this;
    }

    /**
     * Adds as allowOrCharge
     *
     * An allowance or charge that applies to the whole availability response.
     *
     * @return self
     * @param \TecCom\Order\TXML5\AllowOrChargeType $allowOrCharge
     */
    public function addToAllowOrCharge(\TecCom\Order\TXML5\AllowOrChargeType $allowOrCharge)
    {
        $this->allowOrCharge[] = $allowOrCharge;
        return $this;
    }

    /**
     * isset allowOrCharge
     *
     * An allowance or charge that applies to the whole availability response.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAllowOrCharge($index)
    {
        return isset($this->allowOrCharge[$index]);
    }

    /**
     * unset allowOrCharge
     *
     * An allowance or charge that applies to the whole availability response.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAllowOrCharge($index)
    {
        unset($this->allowOrCharge[$index]);
    }

    /**
     * Gets as allowOrCharge
     *
     * An allowance or charge that applies to the whole availability response.
     *
     * @return \TecCom\Order\TXML5\AllowOrChargeType[]
     */
    public function getAllowOrCharge()
    {
        return $this->allowOrCharge;
    }

    /**
     * Sets a new allowOrCharge
     *
     * An allowance or charge that applies to the whole availability response.
     *
     * @param \TecCom\Order\TXML5\AllowOrChargeType[] $allowOrCharge
     * @return self
     */
    public function setAllowOrCharge(?array $allowOrCharge = null)
    {
        $this->allowOrCharge = $allowOrCharge;
        return $this;
    }

    /**
     * Adds as tax
     *
     * A tax that applies to the whole availability response.
     *
     * @return self
     * @param \TecCom\Order\TXML5\TaxType $tax
     */
    public function addToTax(\TecCom\Order\TXML5\TaxType $tax)
    {
        $this->tax[] = $tax;
        return $this;
    }

    /**
     * isset tax
     *
     * A tax that applies to the whole availability response.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTax($index)
    {
        return isset($this->tax[$index]);
    }

    /**
     * unset tax
     *
     * A tax that applies to the whole availability response.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTax($index)
    {
        unset($this->tax[$index]);
    }

    /**
     * Gets as tax
     *
     * A tax that applies to the whole availability response.
     *
     * @return \TecCom\Order\TXML5\TaxType[]
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Sets a new tax
     *
     * A tax that applies to the whole availability response.
     *
     * @param \TecCom\Order\TXML5\TaxType[] $tax
     * @return self
     */
    public function setTax(?array $tax = null)
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * Adds as additionalParameters
     *
     * An additional parameter that conveys specific information that applies to the whole availability response.
     *
     * The seller **must** only use these qualifiers:
     *
     * 1. `StorageLocation`
     * 2. `MinimumOrderValue`
     *
     * @return self
     * @param \TecCom\Order\TXML5\AdditionalParametersType $additionalParameters
     */
    public function addToAdditionalParameters(\TecCom\Order\TXML5\AdditionalParametersType $additionalParameters)
    {
        $this->additionalParameters[] = $additionalParameters;
        return $this;
    }

    /**
     * isset additionalParameters
     *
     * An additional parameter that conveys specific information that applies to the whole availability response.
     *
     * The seller **must** only use these qualifiers:
     *
     * 1. `StorageLocation`
     * 2. `MinimumOrderValue`
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAdditionalParameters($index)
    {
        return isset($this->additionalParameters[$index]);
    }

    /**
     * unset additionalParameters
     *
     * An additional parameter that conveys specific information that applies to the whole availability response.
     *
     * The seller **must** only use these qualifiers:
     *
     * 1. `StorageLocation`
     * 2. `MinimumOrderValue`
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAdditionalParameters($index)
    {
        unset($this->additionalParameters[$index]);
    }

    /**
     * Gets as additionalParameters
     *
     * An additional parameter that conveys specific information that applies to the whole availability response.
     *
     * The seller **must** only use these qualifiers:
     *
     * 1. `StorageLocation`
     * 2. `MinimumOrderValue`
     *
     * @return \TecCom\Order\TXML5\AdditionalParametersType[]
     */
    public function getAdditionalParameters()
    {
        return $this->additionalParameters;
    }

    /**
     * Sets a new additionalParameters
     *
     * An additional parameter that conveys specific information that applies to the whole availability response.
     *
     * The seller **must** only use these qualifiers:
     *
     * 1. `StorageLocation`
     * 2. `MinimumOrderValue`
     *
     * @param \TecCom\Order\TXML5\AdditionalParametersType[] $additionalParameters
     * @return self
     */
    public function setAdditionalParameters(?array $additionalParameters = null)
    {
        $this->additionalParameters = $additionalParameters;
        return $this;
    }

    /**
     * Gets as payment
     *
     * Information about the terms of payment.
     *
     * 1. The seller **can** use this to inform the buyer how they expect them to pay for the order.
     *
     * 2. If the buyer has sent the mode `PayBeforeOrder` in the availability request, then the seller **must** return a payment reference the buyer can use for pre-paying the order.
     *
     * @return \TecCom\Order\TXML5\PaymentType
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * Sets a new payment
     *
     * Information about the terms of payment.
     *
     * 1. The seller **can** use this to inform the buyer how they expect them to pay for the order.
     *
     * 2. If the buyer has sent the mode `PayBeforeOrder` in the availability request, then the seller **must** return a payment reference the buyer can use for pre-paying the order.
     *
     * @param \TecCom\Order\TXML5\PaymentType $payment
     * @return self
     */
    public function setPayment(?\TecCom\Order\TXML5\PaymentType $payment = null)
    {
        $this->payment = $payment;
        return $this;
    }

    /**
     * Adds as freeText
     *
     * Arbitrary information that relates to the whole document.
     *
     * Free text **must** be agreed between buyer and seller, otherwise the buyer will ignore it.
     *
     * @return self
     * @param \TecCom\Order\TXML5\FreeTextValueType $freeText
     */
    public function addToFreeText(\TecCom\Order\TXML5\FreeTextValueType $freeText)
    {
        $this->freeText[] = $freeText;
        return $this;
    }

    /**
     * isset freeText
     *
     * Arbitrary information that relates to the whole document.
     *
     * Free text **must** be agreed between buyer and seller, otherwise the buyer will ignore it.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetFreeText($index)
    {
        return isset($this->freeText[$index]);
    }

    /**
     * unset freeText
     *
     * Arbitrary information that relates to the whole document.
     *
     * Free text **must** be agreed between buyer and seller, otherwise the buyer will ignore it.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetFreeText($index)
    {
        unset($this->freeText[$index]);
    }

    /**
     * Gets as freeText
     *
     * Arbitrary information that relates to the whole document.
     *
     * Free text **must** be agreed between buyer and seller, otherwise the buyer will ignore it.
     *
     * @return \TecCom\Order\TXML5\FreeTextValueType[]
     */
    public function getFreeText()
    {
        return $this->freeText;
    }

    /**
     * Sets a new freeText
     *
     * Arbitrary information that relates to the whole document.
     *
     * Free text **must** be agreed between buyer and seller, otherwise the buyer will ignore it.
     *
     * @param \TecCom\Order\TXML5\FreeTextValueType[] $freeText
     * @return self
     */
    public function setFreeText(?array $freeText = null)
    {
        $this->freeText = $freeText;
        return $this;
    }

    /**
     * Adds as response
     *
     * A status information response that applies to the whole availability response.
     *
     * 1. The seller **must** send status information responses to the buyer to unambiguously inform them about defined situations that occurred during the processing of the availability request.
     *
     * 2. For that, the seller **must** use the pre-defined TecCom status information responses or define their own.
     *
     * 3. The seller **must** communicate their own status information responses to the buyer.
     *
     * 4. The buyer **must** evaluate the status information responses to have their implementation react accordingly.
     *
     * @return self
     * @param \TecCom\Order\TXML5\ResponseType $response
     */
    public function addToResponse(\TecCom\Order\TXML5\ResponseType $response)
    {
        $this->response[] = $response;
        return $this;
    }

    /**
     * isset response
     *
     * A status information response that applies to the whole availability response.
     *
     * 1. The seller **must** send status information responses to the buyer to unambiguously inform them about defined situations that occurred during the processing of the availability request.
     *
     * 2. For that, the seller **must** use the pre-defined TecCom status information responses or define their own.
     *
     * 3. The seller **must** communicate their own status information responses to the buyer.
     *
     * 4. The buyer **must** evaluate the status information responses to have their implementation react accordingly.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetResponse($index)
    {
        return isset($this->response[$index]);
    }

    /**
     * unset response
     *
     * A status information response that applies to the whole availability response.
     *
     * 1. The seller **must** send status information responses to the buyer to unambiguously inform them about defined situations that occurred during the processing of the availability request.
     *
     * 2. For that, the seller **must** use the pre-defined TecCom status information responses or define their own.
     *
     * 3. The seller **must** communicate their own status information responses to the buyer.
     *
     * 4. The buyer **must** evaluate the status information responses to have their implementation react accordingly.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetResponse($index)
    {
        unset($this->response[$index]);
    }

    /**
     * Gets as response
     *
     * A status information response that applies to the whole availability response.
     *
     * 1. The seller **must** send status information responses to the buyer to unambiguously inform them about defined situations that occurred during the processing of the availability request.
     *
     * 2. For that, the seller **must** use the pre-defined TecCom status information responses or define their own.
     *
     * 3. The seller **must** communicate their own status information responses to the buyer.
     *
     * 4. The buyer **must** evaluate the status information responses to have their implementation react accordingly.
     *
     * @return \TecCom\Order\TXML5\ResponseType[]
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Sets a new response
     *
     * A status information response that applies to the whole availability response.
     *
     * 1. The seller **must** send status information responses to the buyer to unambiguously inform them about defined situations that occurred during the processing of the availability request.
     *
     * 2. For that, the seller **must** use the pre-defined TecCom status information responses or define their own.
     *
     * 3. The seller **must** communicate their own status information responses to the buyer.
     *
     * 4. The buyer **must** evaluate the status information responses to have their implementation react accordingly.
     *
     * @param \TecCom\Order\TXML5\ResponseType[] $response
     * @return self
     */
    public function setResponse(?array $response = null)
    {
        $this->response = $response;
        return $this;
    }
}

