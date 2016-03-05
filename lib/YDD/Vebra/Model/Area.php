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
 * Area
 */
class Area extends AttributedModel
{
    protected static $attributeTypeMapping = array(
        'measure' => 'string',
        'unit'    => 'string'
    );

    protected $min;
    protected $max;

    /**
     * Constructor
     *
     * @param float $min The minimum
     * @param float $max The maximum
     */
    public function __construct($min, $max)
    {
        parent::__construct();

        $this->setMin($min);
        $this->setMax($max);
    }

    /**
     * get Min
     *
     * @return float $min
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * set Min
     *
     * @param float $min
     *
     * @return object
     */
    public function setMin($min)
    {
        $this->min = (float) $min;

        return $this;
    }

    /**
     * get Max
     *
     * @return float $max
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * set Max
     *
     * @param float $max
     *
     * @return object
     */
    public function setMax($max)
    {
        $this->max = (float) $max;

        return $this;
    }
}
