<?php

$a = rand(0,10);
$b = rand(0,10);
$c = rand(0,10);

$maximo = 0;
$minimo = 0;
$intermedio = 0;

if($a > $b && $a > $c){
    $maximo = $a;
    if($b > $c){
        $intermedio = $b;
        $minimo = $c;
    }
    else{
        $intermedio = $c;
        $minimo = $b;
    }
}
elseif($a > $b || $a > $c){
    $intermedio = $a;
    if($b > $c){
        $maximo = $b;
        $minimo = $c;
    }
    else{
        $maximo = $c;
        $minimo = $b;
    }
}
elseif($b > $c){
    $maximo = $b;
    $intermedio = $c;
    $minimo = $a;
}
else{
    $maximo = $c;
    $intermedio = $b;
    $minimo = $a;
}

if($intermedio != $maximo && $intermedio != $minimo){
    echo "maximo = {$maximo}, intermedio = {$intermedio} y minimo = {$minimo} -> el intermedio es = {$intermedio}";
}
else{
    echo "No hay número intermedio";
}

