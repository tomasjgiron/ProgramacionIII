<?php
$array = "HolaMundo";
function InvertirArray($array)
{
        $reverseArray = array_reverse(str_split($array, 1));
        return implode("",$reverseArray);//convierte un array en un string
}

echo InvertirArray($array);