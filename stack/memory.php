<?php

require_once __DIR__ . '/../vendor/autoload.php';

$numberOfOperations = 10000;

$memoryBefore = memory_get_usage();
$array = [];
for ($i = 0; $i < $numberOfOperations; $i++) {
    array_push($array, random_int(PHP_INT_MIN, PHP_INT_MAX));
}
$memoryAfter = memory_get_usage();
for ($i = 0; $i < $numberOfOperations; $i++) {
    array_pop($array);
}
echo "Using an array as a stack used " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";
unset($array);

$memoryBefore = memory_get_usage();
$myStack = new \App\MyStack();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $myStack->push(random_int(PHP_INT_MIN, PHP_INT_MAX));
}
$memoryAfter = memory_get_usage();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $myStack->pop();
}
echo "Using my MyStack object as a stack used " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";
unset($myStack);

$memoryBefore = memory_get_usage();
$myStack = new SplStack();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $myStack->push(random_int(PHP_INT_MIN, PHP_INT_MAX));
}
$memoryAfter = memory_get_usage();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $myStack->pop();
}
echo "Using the SplStack object as a stack used " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";