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
    array_pop($array);
}
$timeEnd = microtime(true);
echo "Using an array as a stack take " . (string) ($timeEnd - $timeStart) . " sec and use " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";
unset($array);

$memoryBefore = memory_get_usage();
$timeStart = microtime(true);
$myStack = new \App\MyStack();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $myStack->push(random_int(PHP_INT_MIN, PHP_INT_MAX));
}
$memoryAfter = memory_get_usage();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $myStack->pop();
}
$timeEnd = microtime(true);
echo "Using MyStack object as a stack take " . (string) ($timeEnd - $timeStart) . " sec and use " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";
unset($myStack);

$memoryBefore = memory_get_usage();
$timeStart = microtime(true);
$splStack = new SplStack();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $splStack->push(random_int(PHP_INT_MIN, PHP_INT_MAX));
}
$memoryAfter = memory_get_usage();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $splStack->pop();
}
$timeEnd = microtime(true);
echo "Using the SplStack object as a stack take " . (string) ($timeEnd - $timeStart) . " sec and use " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";
