<?php
/**
 * Returns a variable string with ascii printing characters.
 * DEL      is not returned.
 * Space    is not returned.
 *
 * @param  Integer $length Number of printing character returned
 * @return String
 */
function random_string_var_len(Int $length = 10)
{
    for($i = 0 ; $i < rand(1, $length); $i++){
        $string[] = chr(rand(33, 126));
    }
    return implode('', $string);
}