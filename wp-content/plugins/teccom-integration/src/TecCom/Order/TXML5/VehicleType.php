<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing VehicleType
 *
 * 
 * XSD Type: VehicleType
 */
class VehicleType
{
    /**
     * ID
     *
     * @var int $id
     */
    private $id = null;

    /**
     * RMI type ID
     *
     * @var string $rMITypeId
     */
    private $rMITypeId = null;

    /**
     * Registration field 1
     *
     * @var string $registration1
     */
    private $registration1 = null;

    /**
     * Registration field 2
     *
     * @var string $registration2
     */
    private $registration2 = null;

    /**
     * Type of vehicle
     *
     * @var string $vehicleType
     */
    private $vehicleType = null;

    /**
     * Manufacturer
     *
     * @var string $manufacturer
     */
    private $manufacturer = null;

    /**
     * Model
     *
     * @var string $model
     */
    private $model = null;

    /**
     * Model type e. g. 2.0 TDI
     *
     * @var string $modelType
     */
    private $modelType = null;

    /**
     * Model year
     *
     * @var int $modelYear
     */
    private $modelYear = null;

    /**
     * Version
     *
     * @var string $version
     */
    private $version = null;

    /**
     * Engine power
     *
     * @var int $power
     */
    private $power = null;

    /**
     * Engine power unit
     *
     * @var string $powerUnits
     */
    private $powerUnits = null;

    /**
     * Engine capacity
     *
     * @var int $capacity
     */
    private $capacity = null;

    /**
     * Transmission type
     *
     * @var string $transmission
     */
    private $transmission = null;

    /**
     * Vehicle search
     *
     * @var string $vehicleSearch
     */
    private $vehicleSearch = null;

    /**
     * Country type
     *
     * @var string $country
     */
    private $country = null;

    /**
     * Fuel type
     *
     * @var string $fuelType
     */
    private $fuelType = null;

    /**
     * Vehicle identification number
     *
     * @var string $vIN
     */
    private $vIN = null;

    /**
     * Enfine code
     *
     * @var string $engineCode
     */
    private $engineCode = null;

    /**
     * Engine number
     *
     * @var string $engineNo
     */
    private $engineNo = null;

    /**
     * Error code
     *
     * @var string $errorCode
     */
    private $errorCode = null;

    /**
     * Fitted by
     *
     * @var string $fittedBy
     */
    private $fittedBy = null;

    /**
     * Fitting date
     *
     * @var \DateTime $fittingDate
     */
    private $fittingDate = null;

    /**
     * Mileage fitting
     *
     * @var int $mileageFitting
     */
    private $mileageFitting = null;

    /**
     * Mileage fitting unit
     *
     * @var string $mileageFittingUnits
     */
    private $mileageFittingUnits = null;

    /**
     * Mileage removal
     *
     * @var int $mileageRemoval
     */
    private $mileageRemoval = null;

    /**
     * Mileage removal unit
     *
     * @var string $mileageRemovalUnits
     */
    private $mileageRemovalUnits = null;

    /**
     * Removal date
     *
     * @var \DateTime $removalDate
     */
    private $removalDate = null;

    /**
     * Removed by
     *
     * @var string $removedBy
     */
    private $removedBy = null;

    /**
     * Gets as id
     *
     * ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets a new id
     *
     * ID
     *
     * @param int $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Gets as rMITypeId
     *
     * RMI type ID
     *
     * @return string
     */
    public function getRMITypeId()
    {
        return $this->rMITypeId;
    }

    /**
     * Sets a new rMITypeId
     *
     * RMI type ID
     *
     * @param string $rMITypeId
     * @return self
     */
    public function setRMITypeId($rMITypeId)
    {
        $this->rMITypeId = $rMITypeId;
        return $this;
    }

    /**
     * Gets as registration1
     *
     * Registration field 1
     *
     * @return string
     */
    public function getRegistration1()
    {
        return $this->registration1;
    }

    /**
     * Sets a new registration1
     *
     * Registration field 1
     *
     * @param string $registration1
     * @return self
     */
    public function setRegistration1($registration1)
    {
        $this->registration1 = $registration1;
        return $this;
    }

    /**
     * Gets as registration2
     *
     * Registration field 2
     *
     * @return string
     */
    public function getRegistration2()
    {
        return $this->registration2;
    }

    /**
     * Sets a new registration2
     *
     * Registration field 2
     *
     * @param string $registration2
     * @return self
     */
    public function setRegistration2($registration2)
    {
        $this->registration2 = $registration2;
        return $this;
    }

    /**
     * Gets as vehicleType
     *
     * Type of vehicle
     *
     * @return string
     */
    public function getVehicleType()
    {
        return $this->vehicleType;
    }

    /**
     * Sets a new vehicleType
     *
     * Type of vehicle
     *
     * @param string $vehicleType
     * @return self
     */
    public function setVehicleType($vehicleType)
    {
        $this->vehicleType = $vehicleType;
        return $this;
    }

    /**
     * Gets as manufacturer
     *
     * Manufacturer
     *
     * @return string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Sets a new manufacturer
     *
     * Manufacturer
     *
     * @param string $manufacturer
     * @return self
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
        return $this;
    }

    /**
     * Gets as model
     *
     * Model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Sets a new model
     *
     * Model
     *
     * @param string $model
     * @return self
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Gets as modelType
     *
     * Model type e. g. 2.0 TDI
     *
     * @return string
     */
    public function getModelType()
    {
        return $this->modelType;
    }

    /**
     * Sets a new modelType
     *
     * Model type e. g. 2.0 TDI
     *
     * @param string $modelType
     * @return self
     */
    public function setModelType($modelType)
    {
        $this->modelType = $modelType;
        return $this;
    }

    /**
     * Gets as modelYear
     *
     * Model year
     *
     * @return int
     */
    public function getModelYear()
    {
        return $this->modelYear;
    }

    /**
     * Sets a new modelYear
     *
     * Model year
     *
     * @param int $modelYear
     * @return self
     */
    public function setModelYear($modelYear)
    {
        $this->modelYear = $modelYear;
        return $this;
    }

    /**
     * Gets as version
     *
     * Version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Sets a new version
     *
     * Version
     *
     * @param string $version
     * @return self
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * Gets as power
     *
     * Engine power
     *
     * @return int
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * Sets a new power
     *
     * Engine power
     *
     * @param int $power
     * @return self
     */
    public function setPower($power)
    {
        $this->power = $power;
        return $this;
    }

    /**
     * Gets as powerUnits
     *
     * Engine power unit
     *
     * @return string
     */
    public function getPowerUnits()
    {
        return $this->powerUnits;
    }

    /**
     * Sets a new powerUnits
     *
     * Engine power unit
     *
     * @param string $powerUnits
     * @return self
     */
    public function setPowerUnits($powerUnits)
    {
        $this->powerUnits = $powerUnits;
        return $this;
    }

    /**
     * Gets as capacity
     *
     * Engine capacity
     *
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Sets a new capacity
     *
     * Engine capacity
     *
     * @param int $capacity
     * @return self
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
        return $this;
    }

    /**
     * Gets as transmission
     *
     * Transmission type
     *
     * @return string
     */
    public function getTransmission()
    {
        return $this->transmission;
    }

    /**
     * Sets a new transmission
     *
     * Transmission type
     *
     * @param string $transmission
     * @return self
     */
    public function setTransmission($transmission)
    {
        $this->transmission = $transmission;
        return $this;
    }

    /**
     * Gets as vehicleSearch
     *
     * Vehicle search
     *
     * @return string
     */
    public function getVehicleSearch()
    {
        return $this->vehicleSearch;
    }

    /**
     * Sets a new vehicleSearch
     *
     * Vehicle search
     *
     * @param string $vehicleSearch
     * @return self
     */
    public function setVehicleSearch($vehicleSearch)
    {
        $this->vehicleSearch = $vehicleSearch;
        return $this;
    }

    /**
     * Gets as country
     *
     * Country type
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Sets a new country
     *
     * Country type
     *
     * @param string $country
     * @return self
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Gets as fuelType
     *
     * Fuel type
     *
     * @return string
     */
    public function getFuelType()
    {
        return $this->fuelType;
    }

    /**
     * Sets a new fuelType
     *
     * Fuel type
     *
     * @param string $fuelType
     * @return self
     */
    public function setFuelType($fuelType)
    {
        $this->fuelType = $fuelType;
        return $this;
    }

    /**
     * Gets as vIN
     *
     * Vehicle identification number
     *
     * @return string
     */
    public function getVIN()
    {
        return $this->vIN;
    }

    /**
     * Sets a new vIN
     *
     * Vehicle identification number
     *
     * @param string $vIN
     * @return self
     */
    public function setVIN($vIN)
    {
        $this->vIN = $vIN;
        return $this;
    }

    /**
     * Gets as engineCode
     *
     * Enfine code
     *
     * @return string
     */
    public function getEngineCode()
    {
        return $this->engineCode;
    }

    /**
     * Sets a new engineCode
     *
     * Enfine code
     *
     * @param string $engineCode
     * @return self
     */
    public function setEngineCode($engineCode)
    {
        $this->engineCode = $engineCode;
        return $this;
    }

    /**
     * Gets as engineNo
     *
     * Engine number
     *
     * @return string
     */
    public function getEngineNo()
    {
        return $this->engineNo;
    }

    /**
     * Sets a new engineNo
     *
     * Engine number
     *
     * @param string $engineNo
     * @return self
     */
    public function setEngineNo($engineNo)
    {
        $this->engineNo = $engineNo;
        return $this;
    }

    /**
     * Gets as errorCode
     *
     * Error code
     *
     * @return string
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * Sets a new errorCode
     *
     * Error code
     *
     * @param string $errorCode
     * @return self
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    /**
     * Gets as fittedBy
     *
     * Fitted by
     *
     * @return string
     */
    public function getFittedBy()
    {
        return $this->fittedBy;
    }

    /**
     * Sets a new fittedBy
     *
     * Fitted by
     *
     * @param string $fittedBy
     * @return self
     */
    public function setFittedBy($fittedBy)
    {
        $this->fittedBy = $fittedBy;
        return $this;
    }

    /**
     * Gets as fittingDate
     *
     * Fitting date
     *
     * @return \DateTime
     */
    public function getFittingDate()
    {
        return $this->fittingDate;
    }

    /**
     * Sets a new fittingDate
     *
     * Fitting date
     *
     * @param \DateTime $fittingDate
     * @return self
     */
    public function setFittingDate(?\DateTime $fittingDate = null)
    {
        $this->fittingDate = $fittingDate;
        return $this;
    }

    /**
     * Gets as mileageFitting
     *
     * Mileage fitting
     *
     * @return int
     */
    public function getMileageFitting()
    {
        return $this->mileageFitting;
    }

    /**
     * Sets a new mileageFitting
     *
     * Mileage fitting
     *
     * @param int $mileageFitting
     * @return self
     */
    public function setMileageFitting($mileageFitting)
    {
        $this->mileageFitting = $mileageFitting;
        return $this;
    }

    /**
     * Gets as mileageFittingUnits
     *
     * Mileage fitting unit
     *
     * @return string
     */
    public function getMileageFittingUnits()
    {
        return $this->mileageFittingUnits;
    }

    /**
     * Sets a new mileageFittingUnits
     *
     * Mileage fitting unit
     *
     * @param string $mileageFittingUnits
     * @return self
     */
    public function setMileageFittingUnits($mileageFittingUnits)
    {
        $this->mileageFittingUnits = $mileageFittingUnits;
        return $this;
    }

    /**
     * Gets as mileageRemoval
     *
     * Mileage removal
     *
     * @return int
     */
    public function getMileageRemoval()
    {
        return $this->mileageRemoval;
    }

    /**
     * Sets a new mileageRemoval
     *
     * Mileage removal
     *
     * @param int $mileageRemoval
     * @return self
     */
    public function setMileageRemoval($mileageRemoval)
    {
        $this->mileageRemoval = $mileageRemoval;
        return $this;
    }

    /**
     * Gets as mileageRemovalUnits
     *
     * Mileage removal unit
     *
     * @return string
     */
    public function getMileageRemovalUnits()
    {
        return $this->mileageRemovalUnits;
    }

    /**
     * Sets a new mileageRemovalUnits
     *
     * Mileage removal unit
     *
     * @param string $mileageRemovalUnits
     * @return self
     */
    public function setMileageRemovalUnits($mileageRemovalUnits)
    {
        $this->mileageRemovalUnits = $mileageRemovalUnits;
        return $this;
    }

    /**
     * Gets as removalDate
     *
     * Removal date
     *
     * @return \DateTime
     */
    public function getRemovalDate()
    {
        return $this->removalDate;
    }

    /**
     * Sets a new removalDate
     *
     * Removal date
     *
     * @param \DateTime $removalDate
     * @return self
     */
    public function setRemovalDate(?\DateTime $removalDate = null)
    {
        $this->removalDate = $removalDate;
        return $this;
    }

    /**
     * Gets as removedBy
     *
     * Removed by
     *
     * @return string
     */
    public function getRemovedBy()
    {
        return $this->removedBy;
    }

    /**
     * Sets a new removedBy
     *
     * Removed by
     *
     * @param string $removedBy
     * @return self
     */
    public function setRemovedBy($removedBy)
    {
        $this->removedBy = $removedBy;
        return $this;
    }
}

