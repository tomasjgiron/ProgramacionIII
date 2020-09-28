<?php

$suma = 0;
$num = 1;

while (($suma + $num) <= 1000) {
    # code...
    echo $num;
    echo "<br>";
    $suma = $suma + $num;
    $num++;
}

echo "Se sumaron $num y el total fue $suma";
