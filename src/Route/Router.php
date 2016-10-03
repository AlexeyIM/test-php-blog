<?php

namespace Core\Route;

/**
 * Class Router
 * @package Core\Route
 */
class Router
{
    /**
     * @var array
     */
    protected $routes;

    /**
     * @var string
     */
    protected $httpMethod;

    /**
     * @var string
     */
    protected $uri;

    /**
     * Router constructor.
     * @param string $httpMethod
     * @param string $uri
     */
    public function __construct($httpMethod, $uri)
    {
        $this->httpMethod = $httpMethod;
        $this->uri = $uri;
    }

    /**
     * Defines a link for any http method
     *
     * @param string $path
     * @param string $link
     */
    public function any($path, $link)
    {
        $this->get($path, $link);
        $this->post($path, $link);
    }

    /**
     * Defines a link for GET http method
     *
     * @param string $path
     * @param string $link
     */
    public function get($path, $link)
    {
        $this->add('GET', $path, $link);
    }

    /**
     * Route collector
     *
     * @param string $type
     * @param string $path
     * @param string $link
     * @return Route
     */
    public function add($type, $path, $link)
    {
        $route = new Route($path, $link);
        $this->routes[$type][] = $route;
        return $route;
    }

    /**
     * Defines a link for POST http method
     *
     * @param string $path
     * @param string $link
     */
    public function post($path, $link)
    {
        $this->add('POST', $path, $link);
    }

    /**
     * Tries to match collected routes
     *
     * @return Route
     */
    public function load()
    {
        $httpMethod = $this->httpMethod;
        /** @var Route $route */
        foreach ($this->routes[$httpMethod] as $route) {
            if ($route->match($this->uri)) {
                return $route;
            }
        }

        $parts = explode('/', trim($this->uri, '/'));

        $controller = isset($parts[0]) ? $parts[0] : 'index';
        $method = isset($parts[1]) ? $parts[1] : 'index';
        $args = isset($parts[2]) ? array_slice($parts, 2) : [];

        $route = new Route($this->uri, $controller . '@' . $method);
        $route->args = $args;

        return $route;
    }
}
