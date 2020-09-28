<?php
require_once "../Archivos/fileManager.php";
require __DIR__ . '\vendor\autoload.php';
include_once __DIR__ . '.\vendor\Firebase\php-jwt\src\JWK.php';

use \Firebase\JWT\JWT;


class Usuario extends FileManager
{

    public $_email;
    public $_clave;

    public function __construct($email, $clave)
    {
        if (!is_null($email) && is_string($email)) {
            $this->_email = $email;
        }
        if (!is_null($clave) && is_string($clave)) {
            $this->_clave = $clave;
        }
    }

    public function __get($attribute)
    {
        return $this->$attribute;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public static function login($email, $clave)
    {
        $validEncode = false;
        $payload = array();
        $usuarios = Usuario::leerJson();

        foreach ($usuarios as $user) {
            if ($user->_email == $email && password_verify($clave, $user->_clave)) {
                $payload = array(
                    "email" => $email,
                    "clave" => $clave
                );
                $validEncode = JWT::encode($payload, "pro3-parcial");
                break;
            }
        }
        return $validEncode;
    }

    public static function validateToken($token)
    {
        try {
            JWT::decode($token, "pro3-parcial", array('HS256'));
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    public static function validateUsuario($usuario)
    {
        $response = [true];

        if (isset($usuario->_email) && isset($usuario->_clave) && !empty($usuario->_email) && !empty($usuario->_clave)) {

            $listaDeUsuarios = Usuario::leerJson();
            foreach ($listaDeUsuarios as $key) {
                if ($key->_email == $usuario->_email) {
                    $response = [false, "Usuario repetido. Imposible de guardar"];
                }
            }
        } else {
            $response = [false, "No se permiten campos vacios"];
        }
        return $response;
    }

    public function __toString()
    {
        return "$this->_email~$this->_clave";
    }

    public static function guardarTxt($usuario)
    {
        $listaDeMaterias = Usuario::leerTxt();

        array_push($listaDeMaterias, $usuario);

        parent::saveText("users.txt", $listaDeMaterias);
    }

    public static function leerTxt()
    {
        $lista = parent::readText("users.txt");
        $listaDeUsuarios = array();

        foreach ($lista as $datos) {

            if (count((array)$datos) == 2) {
                $usuarioNuevo = new Usuario($datos[0], $datos[1]);
                array_push($listaDeUsuarios, $usuarioNuevo);
            }
        }

        return $listaDeUsuarios;
    }

    public static function guardarJson($usuario)
    {
        $listaDeUsuarios = Usuario::leerJson();

        array_push($listaDeUsuarios, $usuario);

        parent::saveJSON("users.json", $listaDeUsuarios);
    }

    public static function leerJson()
    {
        $lista = parent::readJSON("users.json");
        $listaDeUsuarios = array();

        foreach ($lista as $datos) {

            if (count((array)$datos) == 2) {
                $usuarioNuevo = new Usuario($datos->_email, $datos->_clave);
                array_push($listaDeUsuarios, $usuarioNuevo);
            }
        }

        return $listaDeUsuarios;
    }

    public static function serializar($usuario)
    {
        $listaDeUsuarios = Usuario::deserializar();

        array_push($listaDeUsuarios, $usuario);

        parent::serializarObjeto("users.ser", $listaDeUsuarios);
    }

    public static function deserializar()
    {
        $lista = parent::deserializarObjeto("users.ser");
        $listaDeUsuarios = array();

        foreach ($lista as $datos) {

            if (count((array)$datos) == 2) {
                $usuarioNuevo = new Usuario($datos->_email, $datos->_clave);
                array_push($listaDeUsuarios, $usuarioNuevo);
            }
        }

        return $listaDeUsuarios;
    }
}
