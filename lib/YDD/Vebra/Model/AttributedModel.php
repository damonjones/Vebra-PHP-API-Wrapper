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
 * AttributedModel
 */
class AttributedModel
{
    protected $attributes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attributes = array();
    }

    /**
     * get Attribute
     *
     * @param string $key
     *
     * @return string
     */
    public function getAttribute($key)
    {
        if (array_key_exists($key, $this->attributes)) {
            return $this->attributes[$key];
        }
    }

    /**
     * set Attribute
     *
     * @param string            $key   The attribute name
     * @param \SimpleXMLElement $value The attribute value
     *
     * @return object
     */
    public function setAttribute($key, $value)
    {
        if (array_key_exists($key, static::$attributeTypeMapping)) {
            $type = strtolower(static::$attributeTypeMapping[$key]);
            switch ($type) {
                case 'boolean':
                case 'bool':
                    $value = (bool) filter_var($value, FILTER_VALIDATE_BOOLEAN);
                    break;
                case 'integer':
                case 'int':
                    $value = (int) $value;
                    break;
                case 'float':
                    $value = (float) $value;
                    break;
                case 'string':
                default:
                    $value = (string) $value;
                    break;
            }

            $this->attributes[$key] = $value;
        } else {
            throw new \InvalidArgumentException("Unexpected attribute '$key'.");
        }

        return $this;
    }

    /**
     * get Attributes
     *
     * @return array $attributes
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * set Attributes
     *
     * @param object|array $attributes
     *
     * @return object
     */
    public function setAttributes($attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }

        return $this;
    }
}
