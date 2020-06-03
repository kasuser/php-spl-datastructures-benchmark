<?php

require_once __DIR__ . '/../vendor/autoload.php';

$numberOfOperations = 10000;

$timeStart = microtime(true);
$array = [];
for ($i = 0; $i < $numberOfOperations; $i++) {
    $array[$i] = random_int(PHP_INT_MIN, PHP_INT_MAX);
}
for ($i = 0; $i < $numberOfOperations; $i++) {
    unset($array[$i]);
}
$timeEnd = microtime(true);
echo "Using an array as a fixed length array took " . (string) ($timeEnd - $timeStart) . " sec.\n";
unset($array);

$timeStart = microtime(true);
$myFixedArray = new \App\MyFixedArray($numberOfOperations);
for ($i = 0; $i < $numberOfOperations; $i++) {
    $myFixedArray[$i] = random_int(PHP_INT_MIN, PHP_INT_MAX);
}
for ($i = 0; $i < $numberOfOperations; $i++) {
    unset($myFixedArray[$i]);
}
$timeEnd = microtime(true);
echo "Using my MyFixedArray object as a fixed length array took " . (string) ($timeEnd - $timeStart) . " sec.\n";
unset($myFixedArray);

$timeStart = microtime(true);
$splFixedArray = new SplFixedArray($numberOfOperations);
for ($i = 0; $i < $numberOfOperations; $i++) {
    $splFixedArray[$i] = random_int(PHP_INT_MIN, PHP_INT_MAX);
}
for ($i = 0; $i < $numberOfOperations; $i++) {
    unset($splFixedArray[$i]);
}
$timeEnd = microtime(true);
echo "Using the SplFixedArray object as a fixed length array took " . (string) ($timeEnd - $timeStart) . " sec.\n";
