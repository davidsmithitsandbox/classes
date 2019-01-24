<?php

/**
 * 
 * array_diff_key
 * Computes the difference of arrays using keys for compariso
 * 
 * Description
 * 
 * array_diff_key ( array $array1 , array $array2 [, array $... ] ) : array
 * 
 * Compares the keys from array1 against the keys from array2 and returns the 
 * difference. This function is like array_diff() except the comparison is done
 * on the keys instead of the values.
 * 
 * Parameters
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
    'one'   => '1',
    'four'  => '4',
    'five'  => '5',
    'six'   => '6'
];

print_r(array_diff_key($array1, $array2));