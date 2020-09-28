<?php

function ValidarCaracteres($palabra, $max){
    $palabras = array("Recuperatorio","Parcial","Programacion");
    if(strlen($palabra) <= $max){
        for ($i=0; $i < count($palabras); $i++) { 
            if($palabras[$i] == $palabra){
                return 1;
            }
        }
        return 0;
    }
    else{
        return 0;
    }
}

echo ValidarCaracteres("Programacion", 15)."<br>";
echo ValidarCaracteres("Programacion", 2)."<br>";
echo ValidarCaracteres("Laboratorio", 8);