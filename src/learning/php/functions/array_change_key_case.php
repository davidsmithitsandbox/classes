<?php

/**
 * array_change_key_case
 *
 * Changes the case of all keys in an array

 * Description
 * 
 * array_change_key_case ( array $array [, int $case = CASE_LOWER ] ) : array
 * 
 * Returns an array with all keys from array lowercased or uppercased. Numbered 
 * indices are left as is.

 * Parameters
 * array
 * The array to work on

 * case
 * Either CASE_UPPER or CASE_LOWER (default)
 */

$array = [
    'name'  => 'Tom',
    'Last'  => 'Wood',
    'aliaS' => [
        'NAME' => 'Tommy', 
        'name2' => 'TOM Tom',
    ]
];


print_r(array_change_key_case($array, CASE_UPPER));