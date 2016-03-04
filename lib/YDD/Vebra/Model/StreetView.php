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
 * StreetView
 */
class StreetView
{
    protected $povLatitude;
    protected $povLongitude;
    protected $povPitch;
    protected $povHeading;
    protected $povZoom;

    /**
     * Constructor
     *
     * @param float $povLatitude  The metric value
     * @param float $povLongitude The imperial value
     * @param float $povPitch     The mixed value
     * @param float $povHeading   The mixed value
     * @param int $povZoom        The pov_zoom value
     */
    public function __construct($povLatitude, $povLongitude, $povPitch, $povHeading, $povZoom)
    {
        $this->setPovLatitude($povLatitude);
        $this->setPovLongitude($povLongitude);
        $this->setPovPitch($povPitch);
        $this->setPovHeading($povHeading);
        $this->setPovZoom($povZoom);
    }

    /**
     * get PovLatitude
     *
     * @return float $povLatitude
     */
    public function getPovLatitude()
    {
        return $this->povLatitude;
    }

    /**
     * set PovLatitude
     *
     * @param float $povLatitude
     *
     * @return object
     */
    public function setPovLatitude($povLatitude)
    {
        $this->povLatitude = $povLatitude;

        return $this;
    }

    /**
     * get PovLongitude
     *
     * @return float $povLongitude
     */
    public function getPovLongitude()
    {
        return $this->povLongitude;
    }

    /**
     * set PovLongitude
     *
     * @param float $povLongitude
     *
     * @return object
     */
    public function setPovLongitude($povLongitude)
    {
        $this->povLongitude = $povLongitude;

        return $this;
    }

    /**
     * get PovPitch
     *
     * @return float $povPitch
     */
    public function getPovPitch()
    {
        return $this->povPitch;
    }

    /**
     * set PovPitch
     *
     * @param float $povPitch
     *
     * @return object
     */
    public function setPovPitch($povPitch)
    {
        $this->povPitch = $povPitch;

        return $this;
    }

    /**
     * get PovHeading
     *
     * @return float $povHeading
     */
    public function getPovHeading()
    {
        return $this->povHeading;
    }

    /**
     * set PovHeading
     *
     * @param float $povHeading
     *
     * @return object
     */
    public function setPovHeading($povHeading)
    {
        $this->povHeading = $povHeading;

        return $this;
    }

    /**
     * get PovZoom
     *
     * @return int $povZoom
     */
    public function getPovZoom()
    {
        return $this->povZoom;
    }

    /**
     * set PovZoom
     *
     * @param int $povZoom
     *
     * @return object
     */
    public function setPovZoom($povZoom)
    {
        $this->povZoom = $povZoom;

        return $this;
    }

}
