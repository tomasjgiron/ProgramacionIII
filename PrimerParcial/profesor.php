<?php
require_once "../Archivos/fileManager.php";

class Profesor extends FileManager
{

    public $_nombre;
    public $_legajo;

    public function __construct($nombre, $legajo)
    {
        if (!is_null($nombre) && is_string($nombre)) {
            $this->_nombre = $nombre;
        }
        if (!is_null($legajo) && ctype_alnum($legajo)) {
            $this->_legajo = $legajo;
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

    // public function __toString()
    // {
    //     return "$this->_nombre~$this->_legajo";
    // }

    public function __toString()
    {
        return "Profesor. Nombre: $this->_nombre | Legajo: $this->_legajo";
    }

    public static function validateProfesor($profesor)
    {
        $response = [true];

        if (isset($profesor->_legajo) && isset($profesor->_nombre) && !empty($profesor->_legajo) && !empty($profesor->_nombre)) {
            $listaDeProfesores = Profesor::leerJson();
            foreach ($listaDeProfesores as $key) {
                if ($key->_legajo == $profesor->_legajo) {
                    $response = [false, "Profesor repetido. Imposible de guardar"];
                }
            }
        } else {
            $response = [false, "No se permiten campos vacios"];
        }
        return $response;
    }

    public static function guardarTxt($profesor)
    {
        $listaDeProfesores = Profesor::leerTxt();

        array_push($listaDeProfesores, $profesor);

        parent::saveText("profesores.txt", $listaDeProfesores);
    }

    public static function leerTxt()
    {
        $lista = parent::readText("profesores.txt");
        $listaDeProfesores = array();

        foreach ($lista as $datos) {

            if (count((array)$datos) == 2) {
                $profesorNuevo = new Profesor($datos[0], $datos[1]);
                array_push($listaDeProfesores, $profesorNuevo);
            }
        }

        return $listaDeProfesores;
    }

    public static function guardarJson($profesor)
    {
        $listaDeProfesores = Profesor::leerJson();

        array_push($listaDeProfesores, $profesor);

        parent::saveJSON("profesores.json", $listaDeProfesores);
    }

    public static function leerJson()
    {
        $lista = parent::readJSON("profesores.json");
        $listaDeProfesores = array();

        foreach ($lista as $datos) {

            if (count((array)$datos) == 2) {
                $profesorNuevo = new Profesor($datos->_nombre, $datos->_legajo);
                array_push($listaDeProfesores, $profesorNuevo);
            }
        }

        return $listaDeProfesores;
    }

    public static function serializar($profesor)
    {
        $listaDeProfesores = Profesor::deserializar();

        array_push($listaDeProfesores, $profesor);

        parent::serializarObjeto("profesores.ser", $listaDeProfesores);
    }

    public static function deserializar()
    {
        $lista = parent::deserializarObjeto("profesores.ser");
        $listaDeProfesores = array();

        foreach ($lista as $datos) {

            if (count((array)$datos) == 2) {
                $profesorNuevo = new Profesor($datos->_nombre, $datos->_legajo);
                array_push($listaDeProfesores, $profesorNuevo);
            }
        }

        return $listaDeProfesores;
    }
}
