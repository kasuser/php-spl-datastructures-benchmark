<?php

namespace App;

/**
 * The simplest doubly linked list implementation using an array
 */
class MyDoublyLinkedList
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

    public function unshift($value)
    {
        array_unshift($this->storage, $value);
        $this->count++;
    }

    public function pop()
    {
        if ($this->count === 0) {
            throw new \RuntimeException('List underflow');
        }

        $this->count--;
        return array_pop($this->storage);
    }

    public function shift()
    {
        if ($this->count === 0) {
            throw new \RuntimeException('List underflow');
        }

        $this->count--;
        return array_shift($this->storage);
    }

    public function isEmpty()
    {
        return $this->count == 0;
    }
}