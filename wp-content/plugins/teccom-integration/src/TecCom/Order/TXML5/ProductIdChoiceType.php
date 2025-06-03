<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing ProductIdChoiceType
 *
 * 
 * XSD Type: ProductIdChoiceType
 */
class ProductIdChoiceType
{
    /**
     * The article's brand.
     *
     * This can be used when the seller assigns the same article number to two or more articles which differ only by the brand.
     *
     * @var \TecCom\Order\TXML5\BrandType $brand
     */
    private $brand = null;

    /**
     * The article number assigned by the seller.
     *
     * This is often the number from TecDoc or other catalogues or price lists.
     *
     * @var string $productNumber
     */
    private $productNumber = null;

    /**
     * The international article number (formerly European article number).
     *
     * @var string $ean
     */
    private $ean = null;

    /**
     * An additional type of article number.
     *
     * @var \TecCom\Order\TXML5\QualifierNumberType[] $additionalProductId
     */
    private $additionalProductId = [
        
    ];

    /**
     * The article number the buyer uses in their ERP system.
     *
     * This number **must** be returned unchanged by the seller if it was sent by the buyer.
     *
     * @var string $buyerProductNumber
     */
    private $buyerProductNumber = null;

    /**
     * Gets as brand
     *
     * The article's brand.
     *
     * This can be used when the seller assigns the same article number to two or more articles which differ only by the brand.
     *
     * @return \TecCom\Order\TXML5\BrandType
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Sets a new brand
     *
     * The article's brand.
     *
     * This can be used when the seller assigns the same article number to two or more articles which differ only by the brand.
     *
     * @param \TecCom\Order\TXML5\BrandType $brand
     * @return self
     */
    public function setBrand(?\TecCom\Order\TXML5\BrandType $brand = null)
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * Gets as productNumber
     *
     * The article number assigned by the seller.
     *
     * This is often the number from TecDoc or other catalogues or price lists.
     *
     * @return string
     */
    public function getProductNumber()
    {
        return $this->productNumber;
    }

    /**
     * Sets a new productNumber
     *
     * The article number assigned by the seller.
     *
     * This is often the number from TecDoc or other catalogues or price lists.
     *
     * @param string $productNumber
     * @return self
     */
    public function setProductNumber($productNumber)
    {
        $this->productNumber = $productNumber;
        return $this;
    }

    /**
     * Gets as ean
     *
     * The international article number (formerly European article number).
     *
     * @return string
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * Sets a new ean
     *
     * The international article number (formerly European article number).
     *
     * @param string $ean
     * @return self
     */
    public function setEan($ean)
    {
        $this->ean = $ean;
        return $this;
    }

    /**
     * Adds as additionalProductId
     *
     * An additional type of article number.
     *
     * @return self
     * @param \TecCom\Order\TXML5\QualifierNumberType $additionalProductId
     */
    public function addToAdditionalProductId(\TecCom\Order\TXML5\QualifierNumberType $additionalProductId)
    {
        $this->additionalProductId[] = $additionalProductId;
        return $this;
    }

    /**
     * isset additionalProductId
     *
     * An additional type of article number.
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAdditionalProductId($index)
    {
        return isset($this->additionalProductId[$index]);
    }

    /**
     * unset additionalProductId
     *
     * An additional type of article number.
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAdditionalProductId($index)
    {
        unset($this->additionalProductId[$index]);
    }

    /**
     * Gets as additionalProductId
     *
     * An additional type of article number.
     *
     * @return \TecCom\Order\TXML5\QualifierNumberType[]
     */
    public function getAdditionalProductId()
    {
        return $this->additionalProductId;
    }

    /**
     * Sets a new additionalProductId
     *
     * An additional type of article number.
     *
     * @param \TecCom\Order\TXML5\QualifierNumberType[] $additionalProductId
     * @return self
     */
    public function setAdditionalProductId(?array $additionalProductId = null)
    {
        $this->additionalProductId = $additionalProductId;
        return $this;
    }

    /**
     * Gets as buyerProductNumber
     *
     * The article number the buyer uses in their ERP system.
     *
     * This number **must** be returned unchanged by the seller if it was sent by the buyer.
     *
     * @return string
     */
    public function getBuyerProductNumber()
    {
        return $this->buyerProductNumber;
    }

    /**
     * Sets a new buyerProductNumber
     *
     * The article number the buyer uses in their ERP system.
     *
     * This number **must** be returned unchanged by the seller if it was sent by the buyer.
     *
     * @param string $buyerProductNumber
     * @return self
     */
    public function setBuyerProductNumber($buyerProductNumber)
    {
        $this->buyerProductNumber = $buyerProductNumber;
        return $this;
    }
}

