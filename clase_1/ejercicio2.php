<?php

echo $date = date("d-m-y");
echo "<br>";
echo $date = date("d/m/y");
echo "<br>";
echo $date = date("m/d/y");
echo "<br>";
echo $date = date("d/m/Y");
echo "<br>";
echo $date = date("d.m.y");
echo "<br>";

$day = date("d");
$month = date("m");

switch ($month) {
    case 1:
    case 2: {
        echo "Es verano";
    break;
    }
    case 3: {
        if($day < 21){
            echo "Es verano";
        }
        else{
            echo "Es otoño";
        }
    }
    case 4:
    case 5: {
        echo "Es otoño";
    break;
    }
    case 6: {
        if($day < 21){
            echo "Es otoño";
        }
        else{
            echo "Es invierano";
        }
    }
    case 7:
    case 8: {
        echo "Es invierano";
    break;
    }
    case 9: {
        if($day < 21){
            echo "Es invierano";
        }
        else{
            echo "Es primavera";
        }
    }
    case 10:
    case 11: {
        echo "Es primavera";
    break;
    }
    case 12: {
        if($day < 21){
            echo "Es primavera";
        }
        else{
            echo "Es verano";
        }
    }
}