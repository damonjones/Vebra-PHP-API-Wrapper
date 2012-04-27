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
 * File
 */
class File extends AttributedModel
{
    protected $name;    // varchar 255
    protected $url;     // varchar 255
    protected $updated; // varchar 255

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->keyTypeMapping = array(
            'id'   => 'int',
            'type' => 'int',
        );
    }

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
     * get Url
     *
     * @return string $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * set Url
     *
     * @param string $url
     *
     * @return object
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * get Updated
     *
     * @return string $updated
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * set Updated
     *
     * @param string $updated
     *
     * @return object
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * get FileId
     *
     * @return int $fileId
     */
    public function getFileId()
    {
        if ($this->url) {
            return (int) substr($this->url, strrpos($this->url, '/') + 1);
        }
    }
}
