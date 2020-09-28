<?php

$lapicera1 = array("color" => "", "marca" => "", "trazo" => "", "precio" => 0);
$lapicera2 = array("color" => "", "marca" => "", "trazo" => "", "precio" => 0);
$lapicera3 = array("color" => "", "marca" => "", "trazo" => "", "precio" => 0);

$lapicera1["color"] = "Azul";
$lapicera1["marca"] = "Bic";
$lapicera1["trazo"] = "Medio";
$lapicera1["precio"] = 15.60;

$lapicera2["color"] = "Negro";
$lapicera2["marca"] = "Micro";
$lapicera2["trazo"] = "Fino";
$lapicera2["precio"] = 300.85;

$lapicera3["color"] = "Rojo";
$lapicera3["marca"] = "Parker";
$lapicera3["trazo"] = "Ultrafino";
$lapicera3["precio"] = 1000.99;

$papiLapicera = [$lapicera1, $lapicera2, $lapicera3];

foreach ($papiLapicera as $papiKey) {
    foreach ($papiKey as $key => $value) {
        echo "key: {$key} - value: {$value} <br>";
    }
}