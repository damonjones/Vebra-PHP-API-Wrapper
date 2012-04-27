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
 * Bullet
 */
class Bullet extends AttributedModel
{
    protected static $attributeTypeMapping = array(
        'id' => 'int'
    );

    protected $value;   // varchar 50

    /**
     * Constructor
     *
     * @param string $value The bullet text
     */
    public function __construct($value)
    {
        parent::__construct();

        $this->value = $value;
    }

    /**
     * get Value
     *
     * @return string $value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * set Value
     *
     * @param string $value
     *
     * @return object
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
