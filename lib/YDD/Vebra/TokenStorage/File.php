<?php

/*
 * This file is part of the YDD\Vebra package.
 *
 * (c) 2012 Damon Jones <damon@yummyduckdesign.co.uk> and Matthew Davis <matt@yummyduckdesign.co.uk>

 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace YDD\Vebra\TokenStorage;

/**
 * A filesystem based Token Storage system
 */
class File extends Base
{
    /**
     * The path where the token files are stored
     * @var string
     */
    protected $path;

    /**
     * Constructor
     * @param string $username The username to use to identify this specific token
     * @param string $path     The path where the token files are stored
     */
    public function __construct($username, $path)
    {
        $this->path = $path;
        parent::__construct($username);
    }

    /**
     * Get the filename of the file containing this token
     * @return string The path and filename of the file containing this token
     */
    protected function getFilename()
    {
        return $this->path . md5($this->username) . '.txt';
    }

    /**
     * Load the token from a file
     */
    protected function load()
    {
        $this->token = trim(file_get_contents($this->getFilename()));
    }

    /**
     * Save the token to a file
     */
    protected function save()
    {
        file_put_contents($this->getFilename(), $this->token);
    }
}
