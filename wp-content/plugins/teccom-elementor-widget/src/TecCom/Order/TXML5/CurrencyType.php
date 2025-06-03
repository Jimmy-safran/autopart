<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing CurrencyType
 *
 * 
 * XSD Type: CurrencyType
 */
class CurrencyType
{
    /**
     * The currency sent by the buyer.
     *
     * This **must** be a valid ISO 4217 code.
     *
     * @var string $request
     */
    private $request = null;

    /**
     * The currency in which the seller has processed the transaction.
     *
     * 1. This **must** be a valid ISO 4217 code.
     *
     * 2. If it is different from the request currency, then it **must** be specified by the seller.
     *
     * 3. A buyer **must not** send this.
     *
     * @var string $response
     */
    private $response = null;

    /**
     * The exchange rate value used for conversion of prices from response to request currency.
     *
     * The seller **can** send this as additional information if the response currency is different from the request currency.
     *
     * @var float $exchangeRate
     */
    private $exchangeRate = null;

    /**
     * Gets as request
     *
     * The currency sent by the buyer.
     *
     * This **must** be a valid ISO 4217 code.
     *
     * @return string
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Sets a new request
     *
     * The currency sent by the buyer.
     *
     * This **must** be a valid ISO 4217 code.
     *
     * @param string $request
     * @return self
     */
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * Gets as response
     *
     * The currency in which the seller has processed the transaction.
     *
     * 1. This **must** be a valid ISO 4217 code.
     *
     * 2. If it is different from the request currency, then it **must** be specified by the seller.
     *
     * 3. A buyer **must not** send this.
     *
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Sets a new response
     *
     * The currency in which the seller has processed the transaction.
     *
     * 1. This **must** be a valid ISO 4217 code.
     *
     * 2. If it is different from the request currency, then it **must** be specified by the seller.
     *
     * 3. A buyer **must not** send this.
     *
     * @param string $response
     * @return self
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * Gets as exchangeRate
     *
     * The exchange rate value used for conversion of prices from response to request currency.
     *
     * The seller **can** send this as additional information if the response currency is different from the request currency.
     *
     * @return float
     */
    public function getExchangeRate()
    {
        return $this->exchangeRate;
    }

    /**
     * Sets a new exchangeRate
     *
     * The exchange rate value used for conversion of prices from response to request currency.
     *
     * The seller **can** send this as additional information if the response currency is different from the request currency.
     *
     * @param float $exchangeRate
     * @return self
     */
    public function setExchangeRate($exchangeRate)
    {
        $this->exchangeRate = $exchangeRate;
        return $this;
    }
}

