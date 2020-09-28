<?php
require_once "./auto17.php";

$auto1 = new Auto("AAABBB", "Ford", "azul", rand(10000, 100000));
$auto2 = new Auto("AAACCC", "Fiat", "azul", rand(10000, 100000));
$auto3 = new Auto("AAADDD", "Ford", "azul", rand(10000, 100000));
$auto4 = new Auto("AAAEEE", "Ford", "azul", rand(10000, 100000));

//Auto::guardarAutosJson($auto1);
var_dump(Auto::leerAutosJson());
//Auto::guardarAutosJson($auto2);
//Auto::guardarAutosJson($auto3);


//Auto::guardarAutosText($auto1);
//var_dump(Auto::leerAutosText());
//Auto::guardarAutosText($auto2);
//Auto::guardarAutosText($auto3);
