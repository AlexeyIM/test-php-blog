<?php

namespace Core\System;

use Core\Di\Container;

/**
 * Class AbstractBootstrap
 * @package Core\System
 */
abstract class AbstractBootstrap
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * AbstractBootstrap constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * All custom adapters, helpers, modules should be initiated here
     */
    abstract public function init();
}
