<?php

/**
 * array_diff_ukey
 * 
 * Computes the difference of arrays using a callback function on the keys for 
 * comparison
 * 
 * Description
 * 
 * array_diff_ukey ( array $array1 , array $array2 [, array $... ], callable 
 * $key_compare_func ) : array
 * 
 * Compares the keys from array1 against the keys from array2 and returns the 
 * difference. This function is like array_diff() except the comparison is done 
 * on the keys instead of the values.
 * 
 * Unlike array_diff_key() a user supplied callback function is used for the 
 * indices comparison, not internal function.
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
 * 
 * key_compare_func
 * The comparison function must return an integer less than, equal to, or 
 * greater than zero if the first argument is considered to be respectively 
 * less than, equal to, or greater than the second. Note that before PHP 7.0.0 
 * this integer had to be in the range from -2147483648 to 2147483647.
 * 
 * callback ( mixed $a, mixed $b ) : int
 */

function key_compare_func($key1, $key2)
{
    if ($key1 == $key2)
        return 0;
    else if ($key1 > $key2)
        return 1;
    else
        return -1;
}

$array1 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);
$array2 = array('green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8);

print_r(array_diff_ukey($array1, $array2, 'key_compare_func'));