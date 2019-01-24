<?php

/**
 * 
 * array_diff_assoc
 * Computes the difference of arrays with additional index check
 * 
 * Description
 * 
 * array_diff_assoc ( array $array1 , array $array2 [, array $... ] ) : array
 * 
 * Compares array1 against array2 and returns the difference. Unlike array_diff
 * () the array keys are also used in the comparison.

 * Parameters
 * array1
 * The array to compare from
 * 
 * array2
 * An array to compare against
 * ...
 * More arrays to compare against
 */

$array1 = [
    'one'   => '1',
    'two'   => '2',
    'three' => '3'
];

$array2 = [
    'one'   => '1',
    'four'  => '4',
    'five'  => '5',
    'six'   => '6'
];

// THE INDEX KEY AND VALUE MUST BE EXACTLY THE SAME

print_r(array_diff_assoc($array1, $array2));