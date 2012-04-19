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
     * @param int $min The minimum
     * @param int $max The maximum
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
     * @return int $min
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * set Min
     *
     * @param int $min
     *
     * @return object
     */
    public function setMin($min)
    {
        $this->min = (int) $min;

        return $this;
    }

    /**
     * get Max
     *
     * @return string $max
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * set Max
     *
     * @param string $max
     *
     * @return object
     */
    public function setMax($max)
    {
        $this->max = (int) $max;

        return $this;
    }
}
