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
    array_shift($array);
}
echo "Using an array as a queue used " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";
unset($array);

$memoryBefore = memory_get_usage();
$myQueue = new \App\MyQueue();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $myQueue->enqueue(random_int(PHP_INT_MIN, PHP_INT_MAX));
}
$memoryAfter = memory_get_usage();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $myQueue->dequeue();
}
echo "Using my MyQueue object as a queue used " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";
unset($myQueue);

$memoryBefore = memory_get_usage();
$splQueue = new SplQueue();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $splQueue->enqueue(random_int(PHP_INT_MIN, PHP_INT_MAX));
}
$memoryAfter = memory_get_usage();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $splQueue->dequeue();
}
echo "Using the SplQueue object as a queue used " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";