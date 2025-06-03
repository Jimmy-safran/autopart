<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing PkgInfoType
 *
 * 
 * XSD Type: PkgInfoType
 */
class PkgInfoType
{
    /**
     * The type of the packaging material.
     *
     * @var string $packageKind
     */
    private $packageKind = null;

    /**
     * The description of the packaging material.
     *
     * @var string $description
     */
    private $description = null;

    /**
     * The number of directly subordinate inner or intermediate packages contained in this package.
     *
     * @var int $totalPackages
     */
    private $totalPackages = null;

    /**
     * Gets as packageKind
     *
     * The type of the packaging material.
     *
     * @return string
     */
    public function getPackageKind()
    {
        return $this->packageKind;
    }

    /**
     * Sets a new packageKind
     *
     * The type of the packaging material.
     *
     * @param string $packageKind
     * @return self
     */
    public function setPackageKind($packageKind)
    {
        $this->packageKind = $packageKind;
        return $this;
    }

    /**
     * Gets as description
     *
     * The description of the packaging material.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description
     *
     * The description of the packaging material.
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Gets as totalPackages
     *
     * The number of directly subordinate inner or intermediate packages contained in this package.
     *
     * @return int
     */
    public function getTotalPackages()
    {
        return $this->totalPackages;
    }

    /**
     * Sets a new totalPackages
     *
     * The number of directly subordinate inner or intermediate packages contained in this package.
     *
     * @param int $totalPackages
     * @return self
     */
    public function setTotalPackages($totalPackages)
    {
        $this->totalPackages = $totalPackages;
        return $this;
    }
}

