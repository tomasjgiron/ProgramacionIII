<?php

$var1 = rand(1,10);
$var2 = rand(1,10);
$var3 = rand(1,10);
$var4 = rand(1,10);
$var5 = rand(1,10);
$prom = 0;
$acumulador = 0;
$contador = 0;

$arrayForeach = array($var1,$var2,$var3,$var4,$var5);

/*
$arrayFor = array();

for ($i=0; $i < 5; $i++) { 
    # code...
    $arrayFor[$i] = rand(1,10);
}

$prom = $array_sum($arrayFor) / count($arrayFor);
*/

foreach ($arrayForeach as $value) {
    # code...
    $acumulador = $acumulador + $value;
    $contador++;
}
$prom = $acumulador / $contador;



if ($prom > 6) {
    # code...
    echo "El promedio es $prom y mayor a 6";
} elseif($prom < 6){
    echo "<br> El promedio es $prom y menor a 6";
}
else {
    # code...
    echo "<br> El promedio es $prom y es igual a 6";
}
