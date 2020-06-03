<?php

require_once __DIR__ . '/../vendor/autoload.php';

$numberOfOperations = 10000;

$timeStart = microtime(true);
$array = [];
for ($i = 0; $i < $numberOfOperations; $i++) {
    if ($i % 2 == 0) {
        array_push($array, random_int(PHP_INT_MIN, PHP_INT_MAX));
    } else {
        array_unshift($array, random_int(PHP_INT_MIN, PHP_INT_MAX));
    }
}
for ($i = 0; $i < $numberOfOperations; $i++) {
    if ($i % 2 == 0) {
        array_shift($array);
    } else {
        array_pop($array);
    }
}
$timeEnd = microtime(true);
echo "Using an array as a doubly linked list took " . (string) ($timeEnd - $timeStart) . " sec.\n";
unset($array);

$timeStart = microtime(true);
$myDoublyLinkedList = new \App\MyDoublyLinkedList();
for ($i = 0; $i < $numberOfOperations; $i++) {
    if ($i % 2 == 0) {
        $myDoublyLinkedList->push(random_int(PHP_INT_MIN, PHP_INT_MAX));
    } else {
        $myDoublyLinkedList->unshift(random_int(PHP_INT_MIN, PHP_INT_MAX));
    }
}
for ($i = 0; $i < $numberOfOperations; $i++) {
    if ($i % 2 == 0) {
        $myDoublyLinkedList->shift();
    } else {
        $myDoublyLinkedList->pop();
    }
}
$timeEnd = microtime(true);
echo "Using my MyDoublyLinkedList object as a doubly linked list took " . (string) ($timeEnd - $timeStart) . " sec.\n";
unset($myDoublyLinkedList);

$timeStart = microtime(true);
$splDoublyLinkedList = new SplDoublyLinkedList();
for ($i = 0; $i < $numberOfOperations; $i++) {
    if ($i % 2 == 0) {
        $splDoublyLinkedList->push(random_int(PHP_INT_MIN, PHP_INT_MAX));
    } else {
        $splDoublyLinkedList->unshift(random_int(PHP_INT_MIN, PHP_INT_MAX));
    }
}
for ($i = 0; $i < $numberOfOperations; $i++) {
    if ($i % 2 == 0) {
        $splDoublyLinkedList->shift();
    } else {
        $splDoublyLinkedList->pop();
    }
}
$timeEnd = microtime(true);
echo "Using the SplDoublyLinkedList object as a doubly linked list took " . (string) ($timeEnd - $timeStart) . " sec.\n";
