<?php

class MdMaker
{
    protected $flag_character = '@';

    public function create(String $string)
    {
        $flag_character = $this->flag_character;
        $array          = explode( "\n", $string);
        $array          = array_map('trim', $array);
        foreach($array as $line)
        {
            $line = $this->removeWhitespace($line) . PHP_EOL;

            if(strpos($line, $flag_character))
            {
                
                $flag = $this->returnWordWithCharacter($line, $flag_character);
                $flag_position = strpos($line, $flag) + strlen($flag);
                $output[$flag] = substr($line, ++$flag_position);
            }
        }
        return $output;
    }

    private function returnWordWithCharacter(String $string, String $character)
    {
       $array = explode(' ', $string);

       foreach($array as $value) {
           if(strpos($value, $character) === 0)
           {
               return $value;
           }
       }
    }

    private function removeWhitespace(String $string)
    {
        return preg_replace('/\s+/', ' ', $string);
    }

}

$MdMaker = new MdMaker;

$string = '
/**
    * Undocumented    function    
*
* @param     Type     $var
* @return void
*/
';

print_r($MdMaker->create($string));
