<?php

/**
 * array_diff
 * 
 * Computes the difference of arrays
 * 
 * Description
 * 
 * array_diff ( array $array1 , array $array2 [, array $... ] ) : array
 
 * Compares array1 against one or more other arrays and returns the values in 
 * array1 that are not present in any of the other arrays.
 * 
 * Parameters
 * 
 * array1
 * The array to compare from
 * 
 * array2
 * An array to compare against
 * 
 * ...
 * More arrays to compare against
 */

$array1 = [
    'one'   => '1',
    'two'   => '2',
    'three' => '3'
];

$array2 = [
    'a',
    'b',
    'one' => '1',
    'four'  => '4',
    'five'  => '5',
    'six'   => '6'
];

print_r(array_diff($array1, $array2));