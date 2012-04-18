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
 * Address
 */
class Address
{
    protected $name;            // varchar 50
    protected $street;          // varchar 50
    protected $locality;        // varchar 150
    protected $town;            // varchar 50
    protected $county;          // varchar 50
    protected $postcode;        // varchar 9
    protected $customLocation;  // varchar 100
    protected $display;         // varchar 255

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
     * get Street
     *
     * @return string $street
     */
    public function getStreet()
    {
        return $this->street;
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
     * get Locality
     *
     * @return string $locality
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * set Locality
     *
     * @param string $locality
     *
     * @return object
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * get Town
     *
     * @return string $town
     */
    public function getTown()
    {
        return $this->town;
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
     * get County
     *
     * @return string $county
     */
    public function getCounty()
    {
        return $this->county;
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
     * get Postcode
     *
     * @return string $postcode
     */
    public function getPostcode()
    {
        return $this->postcode;
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
     * get CustomLocation
     *
     * @return string $customLocation
     */
    public function getCustomLocation()
    {
        return $this->customLocation;
    }

    /**
     * set CustomLocation
     *
     * @param string $customLocation
     *
     * @return object
     */
    public function setCustomLocation($customLocation)
    {
        $this->customLocation = $customLocation;

        return $this;
    }

    /**
     * get Display
     *
     * @return string $display
     */
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * set Display
     *
     * @param string $display
     *
     * @return object
     */
    public function setDisplay($display)
    {
        $this->display = $display;

        return $this;
    }
}
