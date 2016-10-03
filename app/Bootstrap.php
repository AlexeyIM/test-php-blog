<?php

namespace App;

use Core\Model\Adapter\Pdo;
use Core\System\AbstractBootstrap;

/**
 * Class Bootstrap
 * @package App
 */
class Bootstrap extends AbstractBootstrap
{
    /**
     * All custom adapters, helpers, modules should be initiated here
     */
    public function init()
    {
        $this->container->publish('mysql', function ($c) {
            return new Pdo($c['config']['main']['database']);
        });
    }
}
