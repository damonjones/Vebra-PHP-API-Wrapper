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
 * A base implementation of TokenStorageInterface
 */
abstract class Base implements TokenStorageInterface
{
    /**
     * The token
     * @var string
     */
    protected $token;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->load();
    }

    /**
     * Set the token
     * @param string $token Set the token
     */
    public function setToken($token)
    {
        $this->token = $token;
        $this->save();
    }

    /**
     * Get the token
     * @return string Get the token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Load the token
     */
    abstract protected function load();

    /**
     * Save the token
     */
    abstract protected function save();
}
