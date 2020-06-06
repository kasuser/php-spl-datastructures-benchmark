<?php

namespace App;

/**
 * The simplest fixed length array implementation using an array
 */
class MyFixedArray implements \ArrayAccess
{
    private $size;
    private $storage;

    public function __construct($size = 0)
    {
        $this->size = $size;
        $this->storage = array_fill(0, $size - 1, null);
    }

    public function offsetExists($offset)
    {
        if (is_numeric($offset) === false || $offset > $this->size) {
            throw new \RuntimeException('Index invalid or out of range');
        }

        return array_key_exists($offset, $this->storage);
    }

    public function offsetGet($offset)
    {
        if (is_numeric($offset) === false || $offset > $this->size) {
            throw new \RuntimeException('Index invalid or out of range');
        }

        return $this->storage[$offset];
    }

    public function offsetSet($offset, $value)
    {
        if (is_numeric($offset) === false || $offset > $this->size) {
            throw new \RuntimeException('Index invalid or out of range');
        }

        $this->storage[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        if (is_numeric($offset) === false || $offset > $this->size) {
            throw new \RuntimeException('Index invalid or out of range');
        }

        $this->storage[$offset] = null;
    }
}