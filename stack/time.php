<?php

require_once __DIR__ . '/../vendor/autoload.php';

$numberOfOperations = 10000;

$timeStart = microtime(true);
$array = [];
for ($i = 0; $i < $numberOfOperations; $i++) {
    array_push($array, random_int(PHP_INT_MIN, PHP_INT_MAX));
}
for ($i = 0; $i < $numberOfOperations; $i++) {
    array_pop($array);
}
$timeEnd = microtime(true);
echo "Using an array as a stack took " . (string) ($timeEnd - $timeStart) . " sec.\n";
unset($array);

$timeStart = microtime(true);
$myStack = new \App\MyStack();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $myStack->push(random_int(PHP_INT_MIN, PHP_INT_MAX));
}
for ($i = 0; $i < $numberOfOperations; $i++) {
    $myStack->pop();
}
$timeEnd = microtime(true);
echo "Using my MyStack object as a stack took " . (string) ($timeEnd - $timeStart) . " sec.\n";
unset($myStack);

$timeStart = microtime(true);
$myStack = new SplStack();
for ($i = 0; $i < $numberOfOperations; $i++) {
    $myStack->push(random_int(PHP_INT_MIN, PHP_INT_MAX));
}
for ($i = 0; $i < $numberOfOperations; $i++) {
    $myStack->pop();
}
$timeEnd = microtime(true);
echo "Using the SplStack object as a stack took " . (string) ($timeEnd - $timeStart) . " sec.\n";
