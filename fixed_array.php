<?php

require_once __DIR__ . '/vendor/autoload.php';

$numberOfOperations = 10000;
$memoryBefore = $memoryAfter = 0;

$memoryBefore = memory_get_usage();
$timeStart = microtime(true);
$array = array_fill(0, $numberOfOperations - 1, null);;
for ($i = 0; $i < $numberOfOperations; $i++) {
    $array[$i] = random_int(PHP_INT_MIN, PHP_INT_MAX);
}
$memoryAfter = memory_get_usage();
for ($i = 0; $i < $numberOfOperations; $i++) {
    unset($array[$i]);
}
$timeEnd = microtime(true);
echo "Using an array as a fixed length array take " . (string) ($timeEnd - $timeStart) . " sec and use " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";
unset($array);

$memoryBefore = memory_get_usage();
$timeStart = microtime(true);
$myFixedArray = new \App\MyFixedArray($numberOfOperations);
for ($i = 0; $i < $numberOfOperations; $i++) {
    $myFixedArray[$i] = random_int(PHP_INT_MIN, PHP_INT_MAX);
}
$memoryAfter = memory_get_usage();
for ($i = 0; $i < $numberOfOperations; $i++) {
    unset($myFixedArray[$i]);
}
$timeEnd = microtime(true);
echo "Using MyFixedArray object as a fixed length array take " . (string) ($timeEnd - $timeStart) . " sec and use " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";
unset($myFixedArray);

$memoryBefore = memory_get_usage();
$timeStart = microtime(true);
$splFixedArray = new SplFixedArray($numberOfOperations);
for ($i = 0; $i < $numberOfOperations; $i++) {
    $splFixedArray[$i] = random_int(PHP_INT_MIN, PHP_INT_MAX);
}
$memoryAfter = memory_get_usage();
for ($i = 0; $i < $numberOfOperations; $i++) {
    unset($splFixedArray[$i]);
}
$timeEnd = microtime(true);
echo "Using the SplFixedArray object as a fixed length array take " . (string) ($timeEnd - $timeStart) . " sec and use " . (string) ($memoryAfter - $memoryBefore) . " bytes.\n";
