<?php

namespace Core\Controller;

use Core\Di\Container;
use Core\Http;
use Core\View\Render;

/**
 * Class AbstractController
 * @package Core\Controller
 */
class AbstractController
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @var Render
     */
    private $view;

    /**
     * AbstractController constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Dependency Container getter
     *
     * @param string|null $id
     * @return Container|mixed
     */
    protected function getContainer($id = null)
    {
        return $id === null ? $this->container : $this->container[$id];
    }

    /**
     * Request getter
     *
     * @return Http\Request
     */
    protected function getRequest()
    {
        return $this->getContainer('request');
    }

    /**
     * Returns rendered data
     *
     * @param string $filePath
     * @param array $data
     * @return Http\Response
     */
    protected function render($filePath, $data = [])
    {
        if (!$this->view) {
            $this->view = new Render($this->container['appRoot']);
        }

        $content = $this->view->process($filePath, $data);

        return new Http\Response($content);
    }
}
