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
 * LandArea
 */
class LandArea extends AttributedModel
{
    protected static $attributeTypeMapping = array(
        'unit'    => 'string'
    );

    protected $area;

    /**
     * Constructor
     *
     * @param float $area The area
     */
    public function __construct($area)
    {
        parent::__construct();

        $this->setArea($area);
    }

    /**
     * get Area
     *
     * @return float $area
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * set Area
     *
     * @param float $area
     *
     * @return object
     */
    public function setArea($area)
    {
        $this->area = (float) $area;

        return $this;
    }

}
