<?php

namespace Core\Http;

/**
 * Class Request
 * @package Core\Http
 */
class Request
{
    const HTTP_METHOD_POST = 'POST';

    /**
     * @var mixed
     */
    protected $input;

    /**
     * @var ParameterContainer
     */
    protected $content;

    /**
     * @var ParameterContainer
     */
    protected $query;

    /**
     * @var ParameterContainer
     */
    protected $cookies;

    /**
     * @var ParameterContainer
     */
    protected $files;

    /**
     * @var ParameterContainer
     */
    protected $server;

    /**
     * @return ParameterContainer
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return ParameterContainer
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @return ParameterContainer
     */
    public function getCookies()
    {
        return $this->cookies;
    }

    /**
     * @return ParameterContainer
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @return ParameterContainer
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * Request constructor.
     * @param array $query
     * @param array $content
     * @param array $cookies
     * @param array $files
     * @param array $server
     */
    public function __construct(
        array $query = [],
        array $content = [],
        array $cookies = [],
        array $files = [],
        array $server = []
    ) {
        $this->content = new ParameterContainer($content);
        $this->query = new ParameterContainer($query);
        $this->cookies = new ParameterContainer($cookies);
        $this->files = new ParameterContainer($files);
        $this->server = new ParameterContainer($server);

        if (0 === strpos($this->server->get('CONTENT_TYPE'), 'application/x-www-form-urlencoded')
            && in_array(strtoupper($this->server->get('REQUEST_METHOD', 'GET')), array('PUT', 'DELETE', 'PATCH'))
        ) {
            parse_str($this->getInput(), $data);
            $this->content = new ParameterContainer($data);
        }
    }

    public static function createFromGlobals()
    {
        return new self($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    }

    protected function getInput()
    {
        if (null === $this->input || false === $this->input) {
            $this->input = file_get_contents('php://input');
        }

        return $this->input;
    }
}
