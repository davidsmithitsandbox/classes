<?php
function random_string_variable($length = 10)
{

    for($i = 0 ; $i < rand(1, $length); $i++){
        $string[] = chr(rand(33, 126));
    }

    return implode('', $string);
}


function random_array($number_of_elements = 10)
{
    for($i = 0; $i < $number_of_elements; $i++)
    {
        $key    = random_string_variable();
        $value  = random_string_variable();
        $random_array[$key] = $value;
    }
    return $random_array;
}

// print_r(random_array(100));
// $i = 1;
// $string = null;
// while($string != 'mom')
// {
//     $string = random_string_variable(3);
//     $i++;
// }
// echo $i . PHP_EOL;

$ascii = [
    '!' = [
        'dec' => 33,
        'hex' => 21,
        'oct' => 41,
        
    ]
]

