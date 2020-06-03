<?php

require_once __DIR__ . '/../vendor/autoload.php';

$numberOfOperations = 10000;

$timeStart = microtime(true);
$array = [];
for ($i = 0; $i < $numberOfOperations; $i++) {
    array_push($array, random_int(PHP_INT_MIN, PHP_INT_MAX));
}
for ($i = 0; $i < $numberOfOperations; $i++) {
    array_shift($array);
}
$timeEnd = microtime(true);
echo "Using an array as a queue took " . (string) ($timeEnd - $timeStart) . " sec.\n";
unset($array);

$timeStart = microtime(true);
$myQueue = new \App\MyQueue();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $myQueue->enqueue(random_int(PHP_INT_MIN, PHP_INT_MAX));
}
for ($i = 0; $i < $numberOfOperations; $i++) {
    $myQueue->dequeue();
}
$timeEnd = microtime(true);
echo "Using my MyQueue object as a queue took " . (string) ($timeEnd - $timeStart) . " sec.\n";
unset($myQueue);

$timeStart = microtime(true);
$splQueue = new SplQueue();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $splQueue->enqueue(random_int(PHP_INT_MIN, PHP_INT_MAX));
}
for ($i = 0; $i < $numberOfOperations; $i++) {
    $splQueue->dequeue();
}
$timeEnd = microtime(true);
echo "Using the SplQueue object as a queue took " . (string) ($timeEnd - $timeStart) . " sec.\n";
