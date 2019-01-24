<?php

/**
 * array_chunk

 * Split an array into chunks

 * Description
 * 
 * array_chunk ( array $array , int $size [, bool $preserve_keys = FALSE ] )
 * : array
 * 
 *Chunks an array into arrays with size elements. The last chunk may contain less than size elements.

 * Parameters
 * array
 * The array to work on

 * size
 * The size of each chunk

 * preserve_keys
 * When set to TRUE keys will be preserved. Default is FALSE which will reindex 
 * the chunk numerically
 * 
 */

$array = [
    'one'   => '1',
    'two'   => '2',
    'three' => '3',
    'four'  => '4',
    'five'  => '5'
];

print_r(array_chunk($array, 2, true));