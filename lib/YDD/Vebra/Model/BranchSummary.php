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
 * BranchSummary
 */
class BranchSummary
{
    protected $name;
    protected $firmId;
    protected $branchId;
    protected $url;

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
     * set Url
     *
     * @param string $url
     *
     * @return object
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * get Url
     *
     * @return string $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * get ClientId
     *
     * @return int $clientId
     */
    public function getClientId()
    {
        if ($this->url) {
            return (int) substr($this->url, strrpos($this->url, '/') + 1);
        }
    }
}
