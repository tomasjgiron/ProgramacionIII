<?php

require_once '../Entidades/auto17.php';

$auto1 = new Auto("Hyundai", "negro");
$auto2 = new Auto("Hyundai", "verde oscuro");

$auto3 = new Auto("Nissan", "rojo", 90000);
$auto4 = new Auto("Nissan", "rojo", 135000);

$auto5 = new Auto("Toyota", "azul oscuro", 100000, "25/11/2020");

$auto3->agregarImpuestos(1500);
$auto4->agregarImpuestos(1500);
$auto5->agregarImpuestos(1500);

$resultado = Auto::add($auto1, $auto2);
echo "El importe de los dos primeros autos es: $resultado<br>";

if($auto1->equals($auto2)){
    echo "Son iguales <br>";
}
else{
    echo "Son distintos <br>";
}

if($auto1->equals($auto5)){
    echo "Son iguales <br>";
}
else{
    echo "Son distintos <br>";
}

Auto::mostrarAuto($auto1); echo "<br>";
Auto::mostrarAuto($auto3); echo "<br>";
Auto::mostrarAuto($auto5);