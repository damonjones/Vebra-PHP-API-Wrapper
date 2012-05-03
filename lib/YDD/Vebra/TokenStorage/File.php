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
     * The unique username to use for finding this specific token
     * @var string
     */
    protected $username;

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
        if (!$username) {
            throw new \InvalidArgumentException('Username must be provided.');
        }

        if (!$path) {
            throw new \InvalidArgumentException('Token file path must be provided.');
        }

        $this->username = $username;
        $this->path = $path;

        parent::__construct();
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
        if (false !== ($token = @file_get_contents($this->getFilename()))) {
            $this->token = trim($token);
        } else {
            throw new \Exception(sprintf('Token could not be loaded from "%s"', $this->getFilename()));
        }
    }

    /**
     * Save the token to a file
     */
    protected function save()
    {
        if (false === ($result = @file_put_contents($this->getFilename(), $this->token))) {
            throw new \Exception(sprintf('Token could not be saved to "%s"', $this->getFilename()));
        }
    }
}
