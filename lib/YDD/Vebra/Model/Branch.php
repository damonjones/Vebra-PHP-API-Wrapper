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
 * Branch
 */
class Branch
{
    protected $clientId;
    protected $firmId;
    protected $branchId;
    protected $name;
    protected $street;
    protected $town;
    protected $county;
    protected $postcode;
    protected $phone;
    protected $email;
    protected $queriedAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setQueriedAt(new \DateTime);
    }

    /**
     * set ClientId
     *
     * @param int $clientId
     *
     * @return object
     */
    public function setClientId($clientId)
    {
        $this->clientId = (int) $clientId;

        return $this;
    }

    /**
     * get ClientId
     *
     * @return int $value
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * set FirmId
     *
     * @param int $firmId
     *
     * @return object
     */
    public function setFirmId($firmId)
    {
        $this->firmId = (int) $firmId;

        return $this;
    }

    /**
     * get FirmId
     *
     * @return int $firmId
     */
    public function getFirmId()
    {
        return $this->firmId;
    }

    /**
     * set BranchId
     *
     * @param int $branchId
     *
     * @return object
     */
    public function setBranchId($branchId)
    {
        $this->branchId = (int) $branchId;

        return $this;
    }

    /**
     * get BranchId
     *
     * @return int $branchId
     */
    public function getBranchId()
    {
        return $this->branchId;
    }

    /**
     * set Name
     *
     * @param string $name
     *
     * @return object
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * get Name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * set Street
     *
     * @param string $street
     *
     * @return object
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * get Street
     *
     * @return string $street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * set Town
     *
     * @param string $town
     *
     * @return object
     */
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * get Town
     *
     * @return string $towm
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * set County
     *
     * @param string $county
     *
     * @return object
     */
    public function setCounty($county)
    {
        $this->county = $county;

        return $this;
    }

    /**
     * get County
     *
     * @return string $county
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * set Postcode
     *
     * @param string $postcode
     *
     * @return object
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * get Postcode
     *
     * @return string $postcode
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * set Phone
     *
     * @param string $phone
     *
     * @return object
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * get Phone
     *
     * @return string $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * set Email
     *
     * @param string $email
     *
     * @return object
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * get Email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
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
     * get QueriedAt
     *
     * @return DateTime $queriedAt
     */
    public function getQueriedAt()
    {
        return $this->queriedAt;
    }

    /**
     * Import object properties from an associative array
     *
     * @param  array  $arr An associative array
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
