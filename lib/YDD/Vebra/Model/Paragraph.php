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
 * Paragraph
 */
class Paragraph extends AttributedModel
{
    protected static $attributeTypeMapping = array(
        'id'   => 'int',
        'type' => 'int'
    );

    protected $name;        // varchar 255
    protected $file;        // int (index of the file, see Property's files property)
    protected $dimension;  // Dimension
    protected $text;

    /**
     * get Name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * set Name
     *
     * @param string $name
     *
     * @return object
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * get File
     *
     * @return int $file
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * set File
     *
     * @param int $file
     *
     * @return object
     */
    public function setFile($file)
    {
        $this->file = (int) $file;

        return $this;
    }

    /**
     * get Dimension
     *
     * @return Dimension $dimension
     */
    public function getDimension()
    {
        return $this->dimension;
    }

    /**
     * set Dimension
     *
     * @param Dimension $dimension
     *
     * @return object
     */
    public function setDimension(Dimension $dimension)
    {
        $this->dimension = $dimension;

        return $this;
    }

    /**
     * get Text
     *
     * @return string $text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * set Text
     *
     * @param string $text
     *
     * @return object
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }
}
