<?php

require_once __DIR__ . '/../vendor/autoload.php';

$numberOfOperations = 10000;

$memoryBefore = memory_get_usage();
$array = [];
for ($i = 0; $i < $numberOfOperations; $i++) {
    $array[$i] = random_int(PHP_INT_MIN, PHP_INT_MAX);
}
$memoryAfter = memory_get_usage();
for ($i = 0; $i < $numberOfOperations; $i++) {
    unset($array[$i]);
}
echo "Using an array as a fixed length array used " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";
unset($array);

$memoryBefore = memory_get_usage();
$myFixedArray = new \App\MyFixedArray($numberOfOperations);
for ($i = 0; $i < $numberOfOperations; $i++) {
    $myFixedArray[$i] = random_int(PHP_INT_MIN, PHP_INT_MAX);
}
$memoryAfter = memory_get_usage();
for ($i = 0; $i < $numberOfOperations; $i++) {
    unset($myFixedArray[$i]);
}
echo "Using my MyFixedArray object as a fixed length array used " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";
unset($myFixedArray);

$memoryBefore = memory_get_usage();
$splFixedArray = new SplFixedArray($numberOfOperations);
for ($i = 0; $i < $numberOfOperations; $i++) {
    $splFixedArray[$i] = random_int(PHP_INT_MIN, PHP_INT_MAX);
}
$memoryAfter = memory_get_usage();
for ($i = 0; $i < $numberOfOperations; $i++) {
    unset($splFixedArray[$i]);
}
echo "Using the SplQueue object as a fixed length array used " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";