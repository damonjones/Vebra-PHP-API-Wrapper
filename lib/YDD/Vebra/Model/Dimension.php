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
 * Dimension
 */
class Dimension
{
    protected $metric;      // varchar 50
    protected $imperial;    // varchar 50
    protected $mixed;       // varchar 50

    /**
     * Constructor
     *
     * @param string $metric   The metric value
     * @param string $imperial The imperial value
     * @param string $mixed    The mixed value
     */
    public function __construct($metric, $imperial, $mixed)
    {
        $this->setMetric($metric);
        $this->setImperial($imperial);
        $this->setMixed($mixed);
    }

    /**
     * get Metric
     *
     * @return string $metric
     */
    public function getMetric()
    {
        return $this->metric;
    }

    /**
     * set Metric
     *
     * @param string $metric
     *
     * @return object
     */
    public function setMetric($metric)
    {
        $this->metric = $metric;

        return $this;
    }

    /**
     * get Imperial
     *
     * @return string $imperial
     */
    public function getImperial()
    {
        return $this->imperial;
    }

    /**
     * set Imperial
     *
     * @param string $imperial
     *
     * @return object
     */
    public function setImperial($imperial)
    {
        $this->imperial = $imperial;

        return $this;
    }

    /**
     * get Mixed
     *
     * @return string $mixed
     */
    public function getMixed()
    {
        return $this->mixed;
    }

    /**
     * set Mixed
     *
     * @param string $mixed
     *
     * @return object
     */
    public function setMixed($mixed)
    {
        $this->mixed = $mixed;

        return $this;
    }
}
