<?php
$array = array();
$limite = 0;
$num = 0;

do {
    $num++;
    if($num % 2 != 0){
         array_push($array, $num);
         $limite++;
    }
} while ($limite < 10);

foreach ($array as $key => $value) {
    echo "<br> $key => $value";
}
