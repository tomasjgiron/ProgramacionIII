<?php
require_once "../Archivos/fileManager.php";

class Materia extends FileManager
{

    public $_nombre;
    public $_cuatrimestre;
    public $_id;

    public function __construct($nombre, $cuatrimestre, $id = 0)
    {
        if (!is_null($nombre) && is_string($nombre)) {
            $this->_nombre = $nombre;
        }
        if (!is_null($cuatrimestre) && is_numeric($cuatrimestre)) {
            $this->_cuatrimestre = $cuatrimestre;
        }
        $this->_id = $id;
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
    //     return "$this->_nombre~$this->_cuatrimestre~$this->_id" . PHP_EOL;
    // }

    public function __toString()
    {
        return "Materia. Nombre: $this->_nombre | Cuatrimestre: $this->_cuatrimestre | Id: $this->_id" . PHP_EOL;
    }

    public static function asignarId($listaDeMaterias, $materia)
    {
        if (count($listaDeMaterias) == 0) {
            $materia->_id = 1;
        } else {
            $ultimaMateria = end($listaDeMaterias);
            $materia->_id = $ultimaMateria->_id + 1;
        }
        return $materia;
    }

    public static function validateMateria($materia)
    {
        $response = [true];

        if (isset($materia->_nombre) && isset($materia->_cuatrimestre) && !empty($materia->_nombre) && !empty($materia->_cuatrimestre)) {
            $listaDeMaterias = Materia::leerJson();
            foreach ($listaDeMaterias as $key) {
                if ($key->_nombre == $materia->_nombre && $key->_cuatrimestre == $materia->_cuatrimestre) {
                    $response = [false, "Materia repetida. Imposible de guardar"];
                }
            }
        } else {
            $response = [false, "No se permiten campos vacios"];
        }
        return $response;
    }

    public static function guardarTxt($materia)
    {
        $listaDeMaterias = Materia::leerTxt();
        $materia = Materia::asignarId($listaDeMaterias, $materia);

        array_push($listaDeMaterias, $materia);

        parent::saveText("materias.txt", $listaDeMaterias);
    }

    public static function leerTxt()
    {
        $lista = parent::readText("materias.txt");
        $listaDeMaterias = array();

        foreach ($lista as $datos) {

            if (count((array)$datos) == 3) {
                $materiaNueva = new Materia($datos[0], $datos[1], $datos[2]);
                array_push($listaDeMaterias, $materiaNueva);
            }
        }

        return $listaDeMaterias;
    }

    public static function guardarJson($materia)
    {
        $listaDeMaterias = Materia::leerJson();
        $materia = Materia::asignarId($listaDeMaterias, $materia);

        array_push($listaDeMaterias, $materia);

        parent::saveJSON("materias.json", $listaDeMaterias);
    }

    public static function leerJson()
    {
        $lista = parent::readJSON("materias.json");
        $listaDeMaterias = array();

        foreach ($lista as $datos) {

            if (count((array)$datos) == 3) {
                $materiaNueva = new Materia($datos->_nombre, $datos->_cuatrimestre, $datos->_id);
                array_push($listaDeMaterias, $materiaNueva);
            }
        }

        return $listaDeMaterias;
    }

    public static function serializar($materia)
    {
        $listaDeMaterias = Materia::deserializar();
        $materia = Materia::asignarId($listaDeMaterias, $materia);

        array_push($listaDeMaterias, $materia);

        parent::serializarObjeto("materias.ser", $listaDeMaterias);
    }

    public static function deserializar()
    {
        $lista = parent::deserializarObjeto("materias.ser");
        $listaDeMaterias = array();

        foreach ($lista as $datos) {

            if (count((array)$datos) == 3) {
                $materiaNueva = new Materia($datos->_nombre, $datos->_cuatrimestre, $datos->_id);
                array_push($listaDeMaterias, $materiaNueva);
            }
        }

        return $listaDeMaterias;
    }
}
