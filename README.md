# kasuser/spl-datastructures-benchmark

The repository contains scripts to test the performance and memory of an SPL data structure against a simple PHP's array, an array encapsulated in an object with the same data structure functionality.

## Requirements

* PHP 5.4+
* Composer

## Installation

```bash
$ git clone https://github.com/kasuser/spl-datastructures-benchmark.git
$ composer install -o
```

## Usage

Run a file with an interesting data structure

```bash
$ php stack.php
```

## Results (on php7 x64)

### Stack

| |memory, bytes|speed, seconds|
|---|---|---|
|array|528464|0.014197826385498|
|SplStack|400200|0.015455007553101|
|MyStack|532568|0.023375034332275|

### Queue

| |memory, bytes|speed, seconds|
|---|---|---|
|array|528464|0.10482406616211|
|SplQueue|400200|0.014147996902466|
|MyQueue|532568|0.11456704139709|

### Fixed Array

| |memory, bytes|speed, seconds|
|---|---|---|
|array|528440|0.015908002853394|
|SplFixedArray|163952|0.0098550319671631|
|MyFixedArray|535936|0.1446578502655|

### Doubly Linked List

| |memory, bytes|speed, seconds|
|---|---|---|
|array|528464|0.18867301940918|
|SplDoublyLinkedList|400200|0.015730857849121|
|MyDoublyLinkedList|534632|0.1896710395813|
