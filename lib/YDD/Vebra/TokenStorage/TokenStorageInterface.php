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
 * An interface for storage of Tokens
 */
interface TokenStorageInterface
{
    /**
     * Set the token
     * @param string $token The token
     */
    function setToken($token);

    /**
     * Get the token
     * @return string The token
     */
    function getToken();
}
