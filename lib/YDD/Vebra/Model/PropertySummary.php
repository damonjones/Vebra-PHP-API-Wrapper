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
 * PropertySummary
 */
class PropertySummary
{
    protected $propId;
    protected $lastChanged;
    protected $url;

    /**
     * set PropId
     *
     * @param int $propId
     *
     * @return object
     */
    public function setPropId($propId)
    {
        $this->propId = (int) $propId;

        return $this;
    }

    /**
     * get PropId
     *
     * @return int $propId
     */
    public function getPropId()
    {
        return $this->propId;
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
}
