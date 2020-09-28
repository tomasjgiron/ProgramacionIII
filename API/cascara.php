<?php

require_once '../Entidades/auto17.php';

$method = $_SERVER['REQUEST_METHOD'];
$path_info = $_SERVER['PATH_INFO'];

$autoPrecreado = new Auto("Suzuki", "negro", 90000);
//$autoPrecreado = null;

if ($path_info == "/auto") {
    switch ($method) {
        case 'POST': { //agrega recursos
                if ($_POST['putFlag'] != true) {
                    echo "\~o~ Construyendo auto ~o~/" . PHP_EOL;

                    $autoPost = new Auto($_POST['marca'], $_POST['color'], $_POST['precio'], $_POST['fecha']);

                    echo "La marca es $autoPost->_marca, el color es $autoPost->_color, el precio es $autoPost->_precio y la fecha de salida es $autoPost->_fecha";
                    break;
                }
            }
        case 'PUT': { //modifica recursos
                if ($autoPrecreado != null) {
                    echo "Auto antes - Marca: $autoPrecreado->_marca, color: $autoPrecreado->_color, precio: $autoPrecreado->_precio" . PHP_EOL;

                    echo "Modifique el auto" . PHP_EOL;

                    $autoPrecreado->_color = $_POST['color'];
                    $autoPrecreado->_marca = $_POST['marca'];
                    $autoPrecreado->_precio = $_POST['precio'];

                    echo "La marca nueva es $autoPrecreado->_marca, el color nuevo es $autoPrecreado->_color y el precio nuevo es $autoPrecreado->_precio";
                } else {
                    echo "El auto no existe todavía";
                }

                break;
            }
        case 'GET': { //lista recursos
                if ($autoPrecreado != null) {
                    echo "Muestro mi auto" . PHP_EOL;

                    echo "La marca es $autoPrecreado->_marca, el color es $autoPrecreado->_color y el precio es $autoPrecreado->_precio";
                } else {
                    echo "El auto no existe todavía";
                }
                break;
            }
        case 'DELETE': { //borra recursos

                var_dump($autoPrecreado) . PHP_EOL;
                $autoPrecreado = null;
                var_dump($autoPrecreado);
                break;
            }
        default: {
            }
    }
}
