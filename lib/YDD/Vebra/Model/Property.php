<?php

/*
 * This file is part of the YDD\Vebra package.
 *
 * (c) 2012 Damon Jones <damon@yummyduckdesign.co.uk> and Matthew Davis <matt@yummyduckdesign.co.uk>

 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace YDD\Vebra\Model;

/**
 * Property
 */
class Property extends AttributedModel
{
    protected static $attributeTypeMapping = array(
        'id'            => 'int',
        'propertyid'    => 'int',
        'system'        => 'string',
        'firmid'        => 'int',
        'branchid'      => 'int',
        'database'      => 'int',
        'featured'      => 'bool'
    );

    protected $agentReference;          // varchar 30
    protected $address;                 // Address
    protected $price;                   // Price
    protected $rentalFees;              // varchar 400
    protected $lettingsFee;             // varchar 4000
    protected $rmQualifier;             // enum
    protected $available;               // string
    protected $uploaded;                // string
    protected $longitude;               // float
    protected $latitude;                // float
    protected $easting;                 // int
    protected $northing;                // int
    protected $streetView;              // StreetView
    protected $webStatus;               // enum
    protected $customStatus;            // varchar 30
    protected $commRent;                // varchar 30
    protected $premium;                 // varchar 30
    protected $serviceCharge;           // varchar 30
    protected $rateableValue;           // varchar 30
    protected $type;                    // varchar 50
    protected $furnished;               // enum
    protected $rmType;                  // int
    protected $letBond;                 // int
    protected $rmLetTypeId;             // enum
    protected $bedrooms;                // int
    protected $receptions;              // int
    protected $bathrooms;               // int
    protected $userField1;              // varchar 150
    protected $userField2;              // int
    protected $soldDate;                // date
    protected $leaseEnd;                // date
    protected $instructed;              // date
    protected $soldPrice;               // int
    protected $garden;                  // boolean
    protected $parking;                 // boolean
    protected $newBuild;                // boolean
    protected $groundRent;              // varchar 50
    protected $commission;              // varchar 30
    protected $area;                    // Area
    protected $landArea;                // LandArea
    protected $description;             // varchar
    protected $energyEfficiency;        // EnergyRatingPair
    protected $environmentalImpact;     // EnergyRatingPair
    protected $paragraphs;              // array
    protected $bullets;                 // array (max 12)
    protected $files;                   // array
    protected $queriedAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->setQueriedAt(new \DateTime);
    }

    /**
     * get AgentReference
     *
     * @return string $agentReference
     */
    public function getAgentReference()
    {
        return $this->agentReference;
    }

    /**
     * set AgentReference
     *
     * @param string $agentReference
     *
     * @return object
     */
    public function setAgentReference($agentReference)
    {
        $this->agentReference = $agentReference;

        return $this;
    }

    /**
     * get Address
     *
     * @return Address $address
     */

    public function getAddress()
    {
        return $this->address;
    }

    /**
     * set Address
     *
     * @param Address $address
     *
     * @return object
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * get Price
     *
     * @return Price $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * set Price
     *
     * @param Price $price
     *
     * @return object
     */
    public function setPrice(Price $price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * get RentalFees
     *
     * @return string $rentalFees
     */
    public function getRentalFees()
    {
        return $this->rentalFees;
    }

    /**
     * set RentalFees
     *
     * @param string $rentalFees
     *
     * @return object
     */
    public function setRentalFees($rentalFees)
    {
        $this->rentalFees = $rentalFees;

        return $this;
    }

    /**
     * get LettingsFee
     *
     * @return string $lettingsFee
     */
    public function getLettingsFee()
    {
        return $this->lettingsFee;
    }

    /**
     * set LettingsFee
     *
     * @param string $lettingsFee
     *
     * @return object
     */
    public function setLettingsFee($lettingsFee)
    {
        $this->lettingsFee = $lettingsFee;

        return $this;
    }

    /**
     * get RmQualifier
     *
     * @return int $rmQualifier
     */
    public function getRmQualifier()
    {
        return $this->rmQualifier;
    }

    /**
     * set RmQualifier
     *
     * @param int $rmQualifier
     *
     * @return object
     */
    public function setRmQualifier($rmQualifier)
    {
        $this->rmQualifier = (int) $rmQualifier;

        return $this;
    }

    /**
     * get Available
     *
     * @return string $available
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * set Available
     *
     * @param string $available
     *
     * @return object
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * get Uploaded
     *
     * @return string $uploaded
     */
    public function getUploaded()
    {
        return $this->uploaded;
    }

    /**
     * set Uploaded
     *
     * @param string $uploaded
     *
     * @return object
     */
    public function setUploaded($uploaded)
    {
        $this->uploaded = $uploaded;

        return $this;
    }

    /**
     * get Longitude
     *
     * @return float $longitude
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * set Longitude
     *
     * @param float $longitude
     *
     * @return object
     */
    public function setLongitude($longitude)
    {
        $this->longitude = (float) $longitude;

        return $this;
    }

    /**
     * get Latitude
     *
     * @return float $latitude
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * set Latitude
     *
     * @param float $latitude
     *
     * @return object
     */
    public function setLatitude($latitude)
    {
        $this->latitude = (float) $latitude;

        return $this;
    }

    /**
     * get Easting
     *
     * @return int $easting
     */
    public function getEasting()
    {
        return $this->easting;
    }

    /**
     * set Easting
     *
     * @param int $easting
     *
     * @return object
     */
    public function setEasting($easting)
    {
        $this->easting = (int) $easting;

        return $this;
    }

    /**
     * get Northing
     *
     * @return int $northing
     */
    public function getNorthing()
    {
        return $this->northing;
    }

    /**
     * set Northing
     *
     * @param int $northing
     *
     * @return object
     */
    public function setNorthing($northing)
    {
        $this->northing = (int) $northing;

        return $this;
    }

    /**
     * get StreetView
     *
     * @return StreetView $streetView
     */
    public function getStreetView()
    {
        return $this->streetView;
    }

    /**
     * set StreetView
     *
     * @param StreetView $streetView
     *
     * @return object
     */
    public function setStreetView(StreetView $streetView)
    {
        $this->streetView = $streetView;

        return $this;
    }

    /**
     * get WebStatus
     *
     * @return int $webStatus
     */
    public function getWebStatus()
    {
        return $this->webStatus;
    }

    /**
     * set WebStatus
     *
     * @param int $webStatus
     *
     * @return object
     */
    public function setWebStatus($webStatus)
    {
        $this->webStatus = (int) $webStatus;

        return $this;
    }

    /**
     * get CustomStatus
     *
     * @return $customStatus
     */
    public function getCustomStatus()
    {
        return $this->customStatus;
    }

    /**
     * set CustomStatus
     *
     * @param string $customStatus
     *
     * @return object
     */
    public function setCustomStatus($customStatus)
    {
        $this->customStatus = $customStatus;

        return $this;
    }

    /**
     * get CommRent
     *
     * @return string $commRent
     */
    public function getCommRent()
    {
        return $this->commRent;
    }

    /**
     * set CommRent
     *
     * @param string $commRent
     *
     * @return object
     */
    public function setCommRent($commRent)
    {
        $this->commRent = $commRent;

        return $this;
    }

    /**
     * get Premium
     *
     * @return string $premium
     */
    public function getPremium()
    {
        return $this->premium;
    }

    /**
     * set Premium
     *
     * @param string $premium
     *
     * @return object
     */
    public function setPremium($premium)
    {
        $this->premium = $premium;

        return $this;
    }

    /**
     * get ServiceCharge
     *
     * @return string $serviceCharge
     */
    public function getServiceCharge()
    {
        return $this->serviceCharge;
    }

    /**
     * set ServiceCharge
     *
     * @param string $serviceCharge
     *
     * @return object
     */
    public function setServiceCharge($serviceCharge)
    {
        $this->serviceCharge = $serviceCharge;

        return $this;
    }

    /**
     * get RateableValue
     *
     * @return string $rateableValue
     */
    public function getRateableValue()
    {
        return $this->rateableValue;
    }

    /**
     * set RateableValue
     *
     * @param string $rateableValue
     *
     * @return object
     */
    public function setRateableValue($rateableValue)
    {
        $this->rateableValue = $rateableValue;

        return $this;
    }

    /**
     * get Type
     *
     * @return string $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * set Type
     *
     * @param string $type
     *
     * @return object
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * get Furnished
     *
     * @return int $furnished
     */
    public function getFurnished()
    {
        return $this->furnished;
    }

    /**
     * set Furnished
     *
     * @param int $furnished
     *
     * @return object
     */
    public function setFurnished($furnished)
    {
        $this->furnished = (int) $furnished;

        return $this;
    }

    /**
     * get RmType
     *
     * @return int $rmType
     */
    public function getRmType()
    {
        return $this->rmType;
    }

    /**
     * set RmType
     *
     * @param int $rmType
     *
     * @return object
     */
    public function setRmType($rmType)
    {
        $this->rmType = (int) $rmType;

        return $this;
    }

    /**
     * get LetBond
     *
     * @return int $letBond
     */
    public function getLetBond()
    {
        return $this->letBond;
    }

    /**
     * set LetBond
     *
     * @param int $letBond
     *
     * @return object
     */
    public function setLetBond($letBond)
    {
        $this->letBond = (int) $letBond;

        return $this;
    }

    /**
     * get RmLetTypeId
     *
     * @return int $rmLetTypeId
     */
    public function getRmLetTypeId()
    {
        return $this->rmLetTypeId;
    }

    /**
     * set RmLetTypeId
     *
     * @param int $rmLetTypeId
     *
     * @return object
     */
    public function setRmLetTypeId($rmLetTypeId)
    {
        $this->rmLetTypeId = (int) $rmLetTypeId;

        return $this;
    }

    /**
     * get Bedrooms
     *
     * @return int $bedrooms
     */
    public function getBedrooms()
    {
        return $this->bedrooms;
    }

    /**
     * set Bedrooms
     *
     * @param int $bedrooms
     *
     * @return objects
     */
    public function setBedrooms($bedrooms)
    {
        $this->bedrooms = (int) $bedrooms;

        return $this;
    }

    /**
     * get Receptions
     *
     * @return int $receptions
     */
    public function getReceptions()
    {
        return $this->receptions;
    }

    /**
     * set Receptions
     *
     * @param int $receptions
     *
     * @return object
     */
    public function setReceptions($receptions)
    {
        $this->receptions = (int) $receptions;

        return $this;
    }

    /**
     * get Bathrooms
     *
     * @return int $bathrooms
     */
    public function getBathrooms()
    {
        return $this->bathrooms;
    }

    /**
     * set Bathrooms
     *
     * @param int $bathrooms
     *
     * @return object
     */
    public function setBathrooms($bathrooms)
    {
        $this->bathrooms = (int) $bathrooms;

        return $this;
    }

    /**
     * get UserField1
     *
     * @return string $userField1
     */
    public function getUserField1()
    {
        return $this->userField1;
    }

    /**
     * set UserField1
     *
     * @param string $userField1
     *
     * @return object
     */
    public function setUserField1($userField1)
    {
        $this->userField1 = $userField1;

        return $this;
    }

    /**
     * get UserField2
     *
     * @return int $userField2
     */
    public function getUserField2()
    {
        return $this->userField2;
    }

    /**
     * set UserField2
     *
     * @param int $userField2
     *
     * @return object
     */
    public function setUserField2($userField2)
    {
        $this->userField2 = (int) $userField2;

        return $this;
    }

    /**
     * get SoldDate
     *
     * @return DateTime $soldDate
     */
    public function getSoldDate()
    {
        return $this->soldDate;
    }

    /**
     * set SoldDate
     *
     * @param DateTime $soldDate
     *
     * @return object
     */
    public function setSoldDate(\DateTime $soldDate = null)
    {
        $this->soldDate = $soldDate;

        return $this;
    }

    /**
     * get LeaseEnd
     *
     * @return DateTime $leaseEnd
     */
    public function getLeaseEnd()
    {
        return $this->leaseEnd;
    }

    /**
     * set LeaseEnd
     *
     * @param DateTime $leaseEnd
     *
     * @return object
     */
    public function setLeaseEnd(\DateTime $leaseEnd = null)
    {
        $this->leaseEnd = $leaseEnd;

        return $this;
    }

    /**
     * get Instructed
     *
     * @return DateTime $instructed
     */
    public function getInstructed()
    {
        return $this->instructed;
    }

    /**
     * set Instructed
     *
     * @param DateTime $instructed
     *
     * @return object
     */
    public function setInstructed(\DateTime $instructed = null)
    {
        $this->instructed = $instructed;

        return $this;
    }

    /**
     * get SoldPrice
     *
     * @return int $soldPrice
     */
    public function getSoldPrice()
    {
        return $this->soldPrice;
    }

    /**
     * set SoldPrice
     *
     * @param int $soldPrice
     *
     * @return object
     */
    public function setSoldPrice($soldPrice)
    {
        $this->soldPrice = (int) $soldPrice;

        return $this;
    }

    /**
     * get Garden
     *
     * @return Boolean $garden
     */
    public function getGarden()
    {
        return $this->garden;
    }

    /**
     * set Garden
     *
     * @param Boolean $garden
     *
     * @return object
     */
    public function setGarden($garden)
    {
        $this->garden = (bool) $garden;

        return $this;
    }

    /**
     * get Parking
     *
     * @return Boolean $parking
     */
    public function getParking()
    {
        return $this->parking;
    }

    /**
     * set Parking
     *
     * @param Boolean $parking
     *
     * @return object
     */
    public function setParking($parking)
    {
        $this->parking = (bool) $parking;

        return $this;
    }

    /**
     * get NewBuild
     *
     * @return Boolean $newBuild
     */
    public function getNewBuild()
    {
        return $this->newBuild;
    }

    /**
     * set NewBuild
     *
     * @param Boolean $newBuild
     *
     * @return object
     */
    public function setNewBuild($newBuild)
    {
        $this->newBuild = (bool) $newBuild;

        return $this;
    }

    /**
     * get GroundRent
     *
     * @return string $groundRent
     */
    public function getGroundRent()
    {
        return $this->groundRent;
    }

    /**
     * set GroundRent
     *
     * @param string $groundRent
     *
     * @return object
     */
    public function setGroundRent($groundRent)
    {
        $this->groundRent = $groundRent;

        return $this;
    }

    /**
     * get Commission
     *
     * @return string $commission
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * set Commission
     *
     * @param string $commission
     *
     * @return object
     */
    public function setCommission($commission)
    {
        $this->commission = $commission;

        return $this;
    }

    /**
     * get Area
     *
     * @return array $area
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * set Area
     *
     * @param array $area
     *
     * @return object
     */
    public function setArea(array $area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * get LandArea
     *
     * @return LandArea $landArea
     */
    public function getLandArea()
    {
        return $this->landArea;
    }

    /**
     * set LandArea
     *
     * @param LandArea $landArea
     *
     * @return object
     */
    public function setLandArea(LandArea $landArea)
    {
        $this->landArea = $landArea;

        return $this;
    }

    /**
     * get Description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * set Description
     *
     * @param string $description
     *
     * @return object
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * get EnergyEfficiency
     *
     * @return EnergyRatingPair $energyEfficiency
     */
    public function getEnergyEfficiency()
    {
        return $this->energyEfficiency;
    }

    /**
     * set EnergyEfficiency
     *
     * @param EnergyRatingPair $energyEfficiency
     *
     * @return object
     */
    public function setEnergyEfficiency(EnergyRatingPair $energyEfficiency)
    {
        $this->energyEfficiency = $energyEfficiency;

        return $this;
    }

    /**
     * get EnvironmentalImpact
     *
     * @return EnergyRatingPair $environmentalImpact
     */
    public function getEnvironmentalImpact()
    {
        return $this->environmentalImpact;
    }

    /**
     * set EnvironmentalImpact
     *
     * @param EnergyRatingPair $environmentalImpact
     *
     * @return object
     */
    public function setEnvironmentalImpact(EnergyRatingPair $environmentalImpact)
    {
        $this->environmentalImpact = $environmentalImpact;

        return $this;
    }

    /**
     * get Paragraphs
     *
     * @return array $paragraphs
     */
    public function getParagraphs()
    {
        return $this->paragraphs;
    }

    /**
     * set Paragraphs
     *
     * @param array $paragraphs
     *
     * @return object
     */
    public function setParagraphs(array $paragraphs)
    {
        $this->paragraphs = $paragraphs;

        return $this;
    }

    /**
     * get Bullets
     *
     * @return array $bullets
     */
    public function getBullets()
    {
        return $this->bullets;
    }

    /**
     * set Bullets
     *
     * @param array $bullets
     *
     * @return object
     */
    public function setBullets(array $bullets)
    {
        $this->bullets = $bullets;

        return $this;
    }

    /**
     * get Files
     *
     * @return array $files
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * set Files
     *
     * @param array $files
     *
     * @return object
     */
    public function setFiles(array $files)
    {
        $this->files = $files;

        return $this;
    }

    /**
     * get QueriedAt
     *
     * @return DateTime $queriedAt
     */
    public function getQueriedAt()
    {
        return $this->queriedAt;
    }

    /**
     * set QueriedAt
     *
     * @param DateTime $queriedAt
     *
     * @return object
     */
    public function setQueriedAt(\DateTime $queriedAt = null)
    {
        $this->queriedAt = $queriedAt;

        return $this;
    }

    /**
     * Import object properties from an associative array
     *
     * @param array $arr An associative array
     */
    public function fromArray(array $arr)
    {
        foreach ($arr as $key => $value) {
            $method = 'set' . $key;
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * Export the object properties to an associative array
     *
     * @return array An associative array
     */
    public function toArray()
    {
        $arr = array();
        foreach ($this as $key => $value) {
            $method = 'get' . $key;
            if (method_exists($this, $method)) {
                $arr[$key] = $this->$method();
            }
        }

        return $arr;
    }
}
