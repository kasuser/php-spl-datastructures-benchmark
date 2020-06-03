<?php

namespace App;

/**
 * The simplest queue implementation using an array
 */
class MyQueue
{
    private $count;
    private $storage;

    public function __construct()
    {
        $this->count = 0;
        $this->storage = [];
    }

    public function enqueue($value)
    {
        array_push($this->storage, $value);
        $this->count++;
    }

    public function dequeue()
    {
        if ($this->count === 0) {
            throw new \RuntimeException('Stack underflow');
        }

        $this->count--;
        return array_shift($this->storage);
    }

    public function isEmpty()
    {
        return $this->count == 0;
    }
}