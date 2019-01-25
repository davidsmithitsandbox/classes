<?php

/**
 * Removes all whitespace
 *
 * @param  String $string
 * @return String
 */
function remove_whitespace(String $string)
{
    return trim(preg_replace('/\s+/', ' ', $string));
}