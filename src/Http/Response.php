<?php

namespace Core\Http;

/**
 * Class Response
 * @package Core\Http
 */
class Response
{
    const RESPONSE_CODE_OK = 200;
    const RESPONSE_CODE_MOVED_PERMANENTLY = 301;

    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var array
     */
    protected $headers;

    /**
     * @var string
     */
    protected $content;

    /**
     * Response constructor.
     * @param string $content
     * @param int $statusCode
     * @param array $headers
     */
    public function __construct($content = '', $statusCode = self::RESPONSE_CODE_OK, $headers = [])
    {
        $this->content = $content;
        $this->statusCode = $statusCode;
        $this->headers = $headers;
    }

    /**
     * Sends all prepared data to the client
     */
    public function send()
    {
        http_response_code($this->statusCode);

        foreach ($this->headers as $name => $value) {
            header("$name: $value");
        }

        echo $this->content;
    }

    /**
     * Http status code setter
     *
     * @param int $code
     */
    public function setStatusCode($code)
    {
        $this->statusCode = $code;
    }

    /**
     * Http header setter
     *
     * @param string $name
     * @param string $value
     */
    public function setHeader($name, $value)
    {
        $this->headers[$name] = $value;
    }

    /**
     * Http body response setter
     *
     * @param string $content
     */
    public function setContent($content = '')
    {
        $this->setContent($content);
    }

    /**
     * Helper function to do redirect
     *
     * @param string $url
     * @param int $statusCode
     */
    public function setRedirect($url, $statusCode = self::RESPONSE_CODE_MOVED_PERMANENTLY)
    {
        $this->setHeader('Location', $url);
        $this->setStatusCode($statusCode);
    }
}
