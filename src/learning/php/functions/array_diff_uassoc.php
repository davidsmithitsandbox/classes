<?php

/**
 * array_diff_uassoc
 * 
 * Computes the difference of arrays with additional index check which is 
 * performed by a user supplied callback function

 * Description 
 * 
 * array_diff_uassoc ( array $array1 , array $array2 [, array $... ], callable 
 * $key_compare_func ) : array
 * 
 * Compares array1 against array2 and returns the difference. Unlike 
 * array_diff() the array keys are used in the comparison.
 * 
 * Unlike array_diff_assoc() a user supplied callback function is used for the 
 * indices comparison, not internal function.
 * 
 * Parameters
 * array1
 * The array to compare from
 * 
 * array2
 * An array to compare against
 * ...
 * More arrays to compare against
 * 
 * key_compare_func
 * The comparison function must return an integer less than, equal to, or
 * greater than zero if the first argument is considered to be respectively 
 * ess than, equal to, or greater than the second. Note that before PHP 7.0.0 
 * this integer had to be in the range from -2147483648 to 2147483647.
 * 
 * callback ( mixed $a, mixed $b ) : int
 */

function key_compare_func($a, $b)
{
    if ($a === $b) {
        return 0;
    }
    return ($a > $b)? 1:-1;
}

$array1 = [
    "a" => "green", 
    "b" => "brown", 
    "c" => "blue", 
    "red"
];

$array2 = [
    "a" => "green", 
    "yellow", 
    "red"
];

print_r(array_diff_uassoc($array1, $array2, "key_compare_func"));