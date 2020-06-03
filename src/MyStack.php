<?php

namespace App;

/**
 * The simplest stack implementation using an array
 */
class MyStack
{
    private $count;
    private $storage;

    public function __construct()
    {
        $this->count = 0;
        $this->storage = [];
    }

    public function push($value)
    {
        array_push($this->storage, $value);
        $this->count++;
    }

    public function pop()
    {
        if ($this->count === 0) {
            throw new \RuntimeException('Stack underflow');
        }

        $this->count--;
        return array_pop($this->storage);
    }
}