<?php

require_once __DIR__ . '/vendor/autoload.php';

$numberOfOperations = 10000;
$memoryBefore = $memoryAfter = 0;

$memoryBefore = memory_get_usage();
$timeStart = microtime(true);
$array = [];
for ($i = 0; $i < $numberOfOperations; $i++) {
    array_push($array, random_int(PHP_INT_MIN, PHP_INT_MAX));
}
$memoryAfter = memory_get_usage();
for ($i = 0; $i < $numberOfOperations; $i++) {
    array_shift($array);
}
$timeEnd = microtime(true);
echo "Using an array as a queue take " . (string) ($timeEnd - $timeStart) . " sec and use " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";
unset($array);

$memoryBefore = memory_get_usage();
$timeStart = microtime(true);
$myQueue = new \App\MyQueue();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $myQueue->enqueue(random_int(PHP_INT_MIN, PHP_INT_MAX));
}
$memoryAfter = memory_get_usage();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $myQueue->dequeue();
}
$timeEnd = microtime(true);
echo "Using MyQueue object as a queue take " . (string) ($timeEnd - $timeStart) . " sec and use " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";
unset($myQueue);

$memoryBefore = memory_get_usage();
$timeStart = microtime(true);
$splQueue = new SplQueue();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $splQueue->enqueue(random_int(PHP_INT_MIN, PHP_INT_MAX));
}
$memoryAfter = memory_get_usage();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $splQueue->dequeue();
}
$timeEnd = microtime(true);
echo "Using the SplQueue object as a queue take " . (string) ($timeEnd - $timeStart) . " sec and use " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";
