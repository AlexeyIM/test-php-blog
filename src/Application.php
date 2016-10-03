<?php

namespace Core;

use Core\Http;
use Core\Route\Router;
use Core\System\AbstractBootstrap;
use Core\System\Config\Loader as ConfigLoader;
use Core\System\Dispatcher;

/**
 * Class Application
 * @package Core
 */
class Application
{
    /**
     * @var Router
     */
    protected $router;

    /**
     * @var Di\Container
     */
    protected $container;

    /**
     * Application constructor.
     */
    public function __construct()
    {
        $request = Http\Request::createFromGlobals();

        $this->router = new Router(
            $request->getServer()->get('REQUEST_METHOD'),
            $request->getServer()->get('REQUEST_URI')
        );

        $this->container = new Di\Container();
        $this->container['request'] = $request;
        $this->container['appRoot'] = $this->identifyRootDirectory();

        $configDirectory = $this->container['appRoot'] . '/config/';
        $this->container['config'] = ConfigLoader::load($configDirectory);
    }

    /**
     * Main function
     */
    public function run()
    {
        $namespace = $this->getBaseNamespace();

        $this->loadBootstrap($namespace);
        $this->sendResponse($namespace);
    }

    /**
     * Route getter
     *
     * @return Router
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * Bootstrap loader
     *
     * @param string $namespace
     */
    protected function loadBootstrap($namespace)
    {
        $bootstrapClassName = "\\$namespace\\Bootstrap";
        if (class_exists($bootstrapClassName)) {
            $bootstrap = new $bootstrapClassName($this->container);
            if ($bootstrap instanceof AbstractBootstrap) {
                $bootstrap->init();
            }
        }
    }

    /**
     * Sends response to the client
     *
     * @param string $namespace
     */
    protected function sendResponse($namespace)
    {
        $dispatcher = new Dispatcher($this->router);
        $response = $dispatcher->dispatch($this->container, $namespace);
        if ($response instanceof Http\Response) {
            $response->send();
        } else {
            echo $response;
        }
    }

    /**
     * Root directory getter
     *
     * @return string
     */
    protected function identifyRootDirectory()
    {
        return dirname(__DIR__);
    }

    /**
     * Namespace getter
     *
     * @return string
     */
    protected function getBaseNamespace()
    {
        return ucfirst($this->container['config']['main']['namespace']);
    }
}
