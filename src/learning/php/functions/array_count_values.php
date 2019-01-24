<?php

/**
 * array_diff_assoc

 * Computes the difference of arrays with additional index check

 * Description
 * 
 * array_diff_assoc ( array $array1 , array $array2 [, array $... ] ) : array
 * 
 * Compares array1 against array2 and returns the difference. Unlike array_diff
 * () the array keys are also used in the comparison.
 * 
 */

$keys   = ['one', 'two', 'two', 'three', 'three', 'three'];

print_r(array_count_values($keys));