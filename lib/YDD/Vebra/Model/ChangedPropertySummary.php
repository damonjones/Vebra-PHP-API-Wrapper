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
 * ChangedPropertySummary
 */
class ChangedPropertySummary extends PropertySummary
{
    protected $lastAction;

    /**
     * set LastAction
     *
     * @param string $lastAction
     *
     * @return object
     */
    public function setLastAction($lastAction)
    {
        $this->lastAction = $lastAction;

        return $this;
    }

    /**
     * get LastAction
     *
     * @return string
     */
    public function getLastAction()
    {
        return $this->lastAction;
    }

    /**
     * get ClientId
     *
     * @return int $clientId
     */
    public function getClientId()
    {
        preg_match('#branch\/(\d+)/#', $this->url, $matches);

        return isset($matches[1]) ? (int) $matches[1] : null;
    }
}
