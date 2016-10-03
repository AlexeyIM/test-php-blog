<?php

namespace Core\Di;

/**
 * Class Container
 * @package Core\Di
 */
class Container implements \ArrayAccess
{
    /**
     * @var array
     */
    protected $values = [];

    /**
     * ArrayAccess set function
     *
     * @param mixed $id
     * @param mixed $value
     */
    public function offsetSet($id, $value)
    {
        $this->values[$id] = $value;
    }

    /**
     * ArrayAccess get function
     *
     * @param mixed $id
     * @return mixed
     */
    public function offsetGet($id)
    {
        if (!array_key_exists($id, $this->values)) {
            throw new \InvalidArgumentException(sprintf('Identifier "%s" is not defined.', $id));
        }

        $isFactory = is_object($this->values[$id]) && method_exists($this->values[$id], '__invoke');

        return $isFactory ? $this->values[$id]($this) : $this->values[$id];
    }

    /**
     * ArrayAccess exists function
     *
     * @param mixed $id
     * @return bool
     */
    public function offsetExists($id)
    {
        return array_key_exists($id, $this->values);
    }

    /**
     * ArrayAccess unset function
     *
     * @param mixed $id
     */
    public function offsetUnset($id)
    {
        unset($this->values[$id]);
    }

    /**
     * Creates a static instance to use through the entire app
     *
     * @param string $id
     * @param callable $callable
     */
    public function publish($id, callable $callable)
    {
        $this->values[$id] = function ($c) use ($callable) {

            static $object;
            if (null === $object) {
                $object = $callable($c);
            }

            return $object;
        };
    }
}
