<?php

namespace Core\Http;

/**
 * Class ParameterContainer
 * @package Core\Http
 */
class ParameterContainer implements \IteratorAggregate, \Countable
{
    /**
     * @var array
     */
    protected $parameters;

    /**
     * ParameterContainer constructor.
     * @param array $parameters
     */
    public function __construct(array $parameters = array())
    {
        $this->parameters = $parameters;
    }

    /**
     * Countable function implementation
     *
     * @return int
     */
    public function count()
    {
        return count($this->parameters);
    }

    /**
     * IteratorAggregate function implementation
     *
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->parameters);
    }

    /**
     * Getter function
     *
     * @param string $key
     * @param mixed $default
     * @return mixed|null
     */
    public function get($key, $default = null)
    {
        return array_key_exists($key, $this->parameters) ? $this->parameters[$key] : $default;
    }

    /**
     * Setter function
     *
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    /**
     * Isset checker
     *
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        return array_key_exists($key, $this->parameters);
    }

    /**
     * Unset function
     *
     * @param string $key
     */
    public function remove($key)
    {
        unset($this->parameters[$key]);
    }
}
