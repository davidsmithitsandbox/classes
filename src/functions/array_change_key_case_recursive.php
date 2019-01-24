<?php

/**
 * Changes the key case recursively
 *
 * @param Array $input
 * @param const CASE_UPPER, CASE_LOWER
 * @return void
 */
function array_change_key_case_recursive(Array $input, $case = null)
{
    $input = array_change_key_case($input, $case); 
    foreach($input as $key=>$array){ 
        if(is_array($array)){ 
            $input[$key] = array_change_key_case_recursive($array, $case); 
        } 
    } 
    return $input; 
}
