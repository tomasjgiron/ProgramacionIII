<?php
$array = "AmoraRoma";
function InvertirArray($array)
{
        $splitArray = explode(",", $array);
        $reverseArray = array_reverse($splitArray);
        $joinArray = join(",", $reverseArray);

    return $joinArray;
}

echo InvertirArray($array);

