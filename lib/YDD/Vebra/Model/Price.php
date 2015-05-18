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
 * Price
 */
class Price extends AttributedModel
{
    protected static $attributeTypeMapping = array(
        'rent'      => 'string',
        'currency'  => 'string',
        'qualifier' => 'string',
        'display'   => 'boolean'
    );

    protected $value;

    /**
     * Constructor
     *
     * @param int $value The price
     */
    public function __construct($value)
    {
        parent::__construct();

        $this->value = $value;
    }

    /**
     * get Value
     *
     * @return int $value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * set Value
     *
     * @param int $value
     *
     * @return object
     */
    public function setValue($value)
    {
        $this->value = (int) $value;

        return $this;
    }
}
