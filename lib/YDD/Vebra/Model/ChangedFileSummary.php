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
 * ChangedFileSummary
 */
class ChangedFileSummary
{
    protected $filePropId;
    protected $lastChanged;
    protected $isDeleted;
    protected $url;
    protected $propUrl;

    /**
     * set FilePropId
     *
     * @param int $propId
     *
     * @return object
     */
    public function setFilePropId($filePropId)
    {
        $this->filePropId = (int) $filePropId;

        return $this;
    }

    /**
     * get FilePropId
     *
     * @return int $filePropId
     */
    public function getFilePropId()
    {
        return $this->filePropId;
    }

    /**
     * set LastChanged
     *
     * @param DateTime $lastChanged
     *
     * @return object
     */
    public function setLastChanged(\DateTime $lastChanged = null)
    {
        $this->lastChanged = $lastChanged;

        return $this;
    }

    /**
     * get lastChanged
     *
     * @return DateTime $lastChanged
     */
    public function getLastChanged()
    {
        return $this->lastChanged;
    }

    /**
     * set isDeleted
     *
     * @param Boolean $isDeleted
     *
     * @return object
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = (bool) $isDeleted;

        return $this;
    }

    /**
     * isDeleted
     *
     * @return Boolean
     */
    public function isDeleted()
    {
        return $this->isDeleted;
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
     * set PropUrl
     *
     * @param string $propUrl
     *
     * @return object
     */
    public function setPropUrl($propUrl)
    {
        $this->propUrl = $propUrl;

        return $this;
    }

    /**
     * get PropUrl
     *
     * @return string
     */
    public function getPropUrl()
    {
        return $this->propUrl;
    }
}
