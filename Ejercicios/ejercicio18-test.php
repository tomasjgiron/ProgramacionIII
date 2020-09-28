<?php

require_once '../Entidades/garage18.php';

$auto1 = new Auto("Hyundai", "negro");
$auto2 = new Auto("Hyundai", "verde oscuro");
$auto3 = new Auto("Nissan", "rojo", 90000);
$garage = new Garage("TomiCenter", 150);

echo "Agrego primer auto";
$garage->add($auto1);
echo "<br>";

echo "Agrego segundo auto";
$garage->add($auto2);
echo "<br>";

echo "Agrego tercer auto";
$garage->add($auto3);
echo "<br>";

echo "Muestro el garage";
echo "<br>";
echo $garage->mostrarGarage();

echo "Agrego primer auto";
echo "<br>";
$garage->add($auto1);
echo "<br>";

echo "El segundo auto está en el garage? ";
if($garage->equals($auto2)){
    echo "Sí";
}
else{
    echo "No";
}
echo "<br>";

echo "Saco el segundo auto";
$garage->remove($auto2);
echo "<br>";

echo "El segundo auto está en el garage? ";
if($garage->equals($auto2)){
    echo "Sí";
}
else{
    echo "No";
}
echo "<br>";