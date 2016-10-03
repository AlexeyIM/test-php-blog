<?php

namespace Core\Route;

/**
 * Class Route
 * @package Core\Route
 */
class Route
{
    /**
     * @var array
     */
    public $args = [];

    /**
     * @var string
     */
    private $path;

    /**
     * @var
     */
    private $link;

    /**
     * @var array
     */
    private static $types = [
        '/{int:([a-zA-Z0-9^\/]+)}/' => '(?<$1>[0-9]+)',
        '/{slug:([a-zA-Z0-9^\/]+)}/' => '(?<$1>[a-zA-Z0-9\-]+)',
        '/{all:([a-zA-Z0-9^\/]+)}/' => '(?<$1>[.]+)',
    ];

    /**
     * Route constructor.
     * @param $path
     * @param $link
     */
    public function __construct($path, $link)
    {
        $this->path = trim($path, '/');
        $this->link = $link;
    }

    /**
     * Checks does url match the link
     *
     * @param string $url
     * @return bool
     */
    public function match($url)
    {
        $url = trim($url, '/');
        $regex = preg_replace(array_keys(self::$types), array_values(self::$types), $this->path);
        $regex = str_replace('/', '\/', $regex);
        $regex = "/^$regex$/i";

        if ($url == $this->path) {
            return true;
        }

        if (preg_match($regex, $url, $matches)) {
            array_shift($matches);
            $this->args = $matches;
            return true;
        }
        return false;
    }

    /**
     * Link getter
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }
}
