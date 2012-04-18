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
 * EnergyRatingPair
 */
class EnergyRatingPair
{
    protected $current;
    protected $potential;

    /**
     * Constructor
     *
     * @param int $current   The current value
     * @param int $potential The potential value
     */
    public function __construct($current, $potential)
    {
        $this->setCurrent($current);
        $this->setPotential($potential);
    }

    /**
     * get Current
     *
     * @return int $current
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * set Current
     *
     * @param int $current
     *
     * @return object
     */
    public function setCurrent($current)
    {
        $this->current = (int) $current;

        return $this;
    }

    /**
     * get Potential
     *
     * @return int $potential
     */
    public function getPotential()
    {
        return $this->potential;
    }

    /**
     * set Potential
     *
     * @param int $potential
     *
     * @return object
     */
    public function setPotential($potential)
    {
        $this->potential = (int) $potential;

        return $this;
    }
}
