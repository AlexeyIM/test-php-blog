<?php

namespace Core\System;

use Core\Di\Container;
use Core\Route\Route;
use Core\Route\Router;

/**
 * Class Dispatcher
 * @package Core\System
 */
class Dispatcher
{
    const CONTROLLER_CLASS_MASK = '\\%s\\Controller\\%sController';

    /**
     * @var Route
     */
    protected $route;

    /**
     * @var string
     */
    protected $controllerName;

    /**
     * @var string
     */
    protected $methodName;

    /**
     * Dispatcher constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->route = $router->load();
        if (!$this->route) {
            throw new \InvalidArgumentException('Unable to load the route');
        }
    }

    /**
     * Dispatching a controller by a route
     *
     * @param Container $container
     * @param string $appNamespace
     * @return mixed
     */
    public function dispatch(Container $container, $appNamespace)
    {
        try {
            $result = $this->processRoute($container, $appNamespace);
        } catch (\BadFunctionCallException $e) {
            // the route was not found. Trying to load error page
            $this->route = new Route('', 'error@error404');
            $result = $this->processRoute($container, $appNamespace);
        }

        return $result;
    }

    /**
     * Link parser function
     *
     * @param string $link
     */
    public function parseLink($link)
    {
        $explodedLink = explode('@', $link);

        if (count($explodedLink) != 2) {
            throw new \InvalidArgumentException('Wrong link definition: ' . $link);
        }

        $this->controllerName = $explodedLink[0];
        $this->methodName = $explodedLink[1];
    }

    /**
     * Finds a controller by a route. Throws an exception if failed
     *
     * @param Container $container
     * @param string $appNamespace
     * @return mixed
     */
    protected function processRoute(Container $container, $appNamespace)
    {
        $this->parseLink($this->route->getLink());
        $fullControllerName = sprintf(
            self::CONTROLLER_CLASS_MASK,
            $appNamespace,
            ucfirst(strtolower($this->controllerName))
        );

        if (class_exists($fullControllerName)) {
            $controller = new $fullControllerName($container);
            $fullMethodName = $this->methodName . 'Action';
            if (method_exists($controller, $fullMethodName)) {
                $result = call_user_func_array(array($controller, $fullMethodName), $this->route->args);
            } else {
                throw new \BadFunctionCallException("The controller '$fullControllerName' doesn't have action '$fullMethodName'");
            }
        } else {
            throw new \BadFunctionCallException("The controller '$fullControllerName' has not been defined");
        }

        return $result;
    }
}
