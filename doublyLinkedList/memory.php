<?php

require_once __DIR__ . '/../vendor/autoload.php';

$numberOfOperations = 10000;

$memoryBefore = memory_get_usage();
$array = [];
for ($i = 0; $i < $numberOfOperations; $i++) {
    if ($i % 2 == 0) {
        array_push($array, random_int(PHP_INT_MIN, PHP_INT_MAX));
    } else {
        array_unshift($array, random_int(PHP_INT_MIN, PHP_INT_MAX));
    }
}
$memoryAfter = memory_get_usage();
for ($i = 0; $i < $numberOfOperations; $i++) {
    if ($i % 2 == 0) {
        array_shift($array);
    } else {
        array_pop($array);
    }
}
echo "Using an array as a doubly linked list used " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";
unset($array);

$memoryBefore = memory_get_usage();
$myDoublyLinkedList = new \App\MyDoublyLinkedList();
for ($i = 0; $i < $numberOfOperations; $i++) {
    if ($i % 2 == 0) {
        $myDoublyLinkedList->push(random_int(PHP_INT_MIN, PHP_INT_MAX));
    } else {
        $myDoublyLinkedList->unshift(random_int(PHP_INT_MIN, PHP_INT_MAX));
    }
}
$memoryAfter = memory_get_usage();
for ($i = 0; $i < $numberOfOperations; $i++) {
    if ($i % 2 == 0) {
        $myDoublyLinkedList->shift();
    } else {
        $myDoublyLinkedList->pop();
    }
}
echo "Using my MyDoublyLinkedList object as a doubly linked list used " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";
unset($myDoublyLinkedList);

$memoryBefore = memory_get_usage();
$splDoublyLinkedList = new SplDoublyLinkedList();
for ($i = 0; $i < $numberOfOperations; $i++) {
    if ($i % 2 == 0) {
        $splDoublyLinkedList->push(random_int(PHP_INT_MIN, PHP_INT_MAX));
    } else {
        $splDoublyLinkedList->unshift(random_int(PHP_INT_MIN, PHP_INT_MAX));
    }
}
$memoryAfter = memory_get_usage();
for ($i = 0; $i < $numberOfOperations; $i++) {
    if ($i % 2 == 0) {
        $splDoublyLinkedList->shift();
    } else {
        $splDoublyLinkedList->pop();
    }
}
echo "Using the SplDoublyLinkedList object as a doubly linked list used " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";