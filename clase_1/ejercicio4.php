<?php

$operador = array("+","-","*","/","%","!","");
$op1 = rand(0,1000);
$op2 = rand(0,1000);

function Operar($op1, $op2, $operador){
    if(is_numeric($op1) && is_numeric($op2)){
        switch(ValidarOperador($operador)){
            case "+":
                {
                    return $op1 + $op2;
                    break;
                }
            case "-":
                {
                    return $op1 - $op2;
                    break;
                }
            case "*":
                {
                    return $op1 * $op2;
                    break;
                }
            case "/":
                {
                    if($op2 == 0){
                        return "No se puede dividir por 0";
                    }
                    else{
                        return round($op1 / $op2, 4);
                    }
                    break;
                }
            default:
                {
                    return "El operador ingresado no es válido"; 
                }
        }
    }
    else{
        return "La cadena ingresada no es un numero";
    }
}

function ValidarOperador($operador){
    if($operador == "+"){
        return "+";
    }
    else if($operador == "-"){
        return "-";
    }
    else if($operador == "*"){
        return "*";
    }
    else if($operador == "/"){
        return "/";
    }
}
    echo "La suma entre $op1 y $op2 es: ". Operar($op1, $op2, $operador[0])."<br>";
    echo "La resta entre $op1 y $op2 es: ". Operar($op1, $op2, $operador[1])."<br>";
    echo "La multiplicación entre $op1 y $op2 es: ". Operar($op1, $op2, $operador[2])."<br>";
    echo "La división entre $op1 y $op2 es: ". Operar($op1, $op2, $operador[3])."<br>";
    echo "El resultado entre $op1 y $op2 es: ". Operar($op1, $op2, $operador[4])."<br>";
    echo "El resultado entre $op1 y $op2 es: ". Operar($op1, $op2, $operador[5])."<br>";
    echo "El resultado entre $op1 y $op2 es: ". Operar($op1, $op2, $operador[6]);

