<?php

/**
 * array_combine

 * array_combine — Creates an array by using one array for keys and another for
 * its values

 * Description
 * 
 * array_combine ( array $keys , array $values ) : array
 * 
 * Creates an array by using the values from the keys array as keys and 
 * the values from the values array as the corresponding values.

 * Parameters
 * keys
 * Array of keys to be used. Illegal values for key will be converted to string.
 *
 * values 
 * Array of values to be used
 */

$keys   = ['one', 'two', 'three'];
$values = [1, 2, 3];

// If two keys are the same, the second one prevails. 
print_r(array_combine($keys, $values));
