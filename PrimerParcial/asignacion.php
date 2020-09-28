<?php
require_once "../Archivos/fileManager.php";

class Asignacion extends FileManager
{

    public $_legajoProfe;
    public $_idMateria;
    public $_turno;

    public function __construct($legajoProfe, $idMateria, $turno)
    {
        if (!is_null($legajoProfe) && ctype_alnum($legajoProfe)) {
            $this->_legajoProfe = $legajoProfe;
        }
        if (!is_null($idMateria) && is_numeric($idMateria)) {
            $this->_idMateria = $idMateria;
        }
        if (!is_null($turno) && is_string($turno)) {
            $this->_turno = $turno;
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

    public function __toString()
    {
        return "$this->_legajoProfe~$this->_idMateria~$this->__turno";
    }

    public static function validateAsignacion($asignacion)
    {
        $response = [true];

        if (isset($asignacion->_legajoProfe) && isset($asignacion->_idMateria) && isset($asignacion->_turno) && !empty($asignacion->_legajoProfe) && !empty($asignacion->_idMateria) && !empty($asignacion->_turno)) {

            $listaDeProfesores = Asignacion::leerJson();
            foreach ($listaDeProfesores as $key) {
                if ($key->_legajoProfe == $asignacion->_legajoProfe && $key->_idMateria == $asignacion->_idMateria && $key->_turno == $asignacion->_turno) {
                    $response = [false, "Asignacion repetida. Imposible de guardar"];
                }
            }
        } else {
            $response = [false, "No se permiten campos vacios"];
        }
        return $response;
    }

    public static function guardarTxt($asignacion)
    {
        $listaDeAsignaciones = Asignacion::leerTxt();

        array_push($listaDeAsignaciones, $asignacion);

        parent::saveText("materias-profesores.txt", $listaDeAsignaciones);
    }

    public static function leerTxt()
    {
        $lista = parent::readText("materias-profesores.txt");
        $listaDeAsignaciones = array();

        foreach ($lista as $datos) {

            if (count((array)$datos) == 3) {
                $asignacionNueva = new Asignacion($datos[0], $datos[1], $datos[2]);
                array_push($listaDeAsignaciones, $asignacionNueva);
            }
        }

        return $listaDeAsignaciones;
    }

    public static function guardarJson($asignacion)
    {
        $listaDeAsignaciones = Asignacion::leerJson();

        array_push($listaDeAsignaciones, $asignacion);

        parent::saveJSON("materias-profesores.json", $listaDeAsignaciones);
    }

    public static function leerJson()
    {
        $lista = parent::readJSON("materias-profesores.json");
        $listaDeAsignaciones = array();

        foreach ($lista as $datos) {

            if (count((array)$datos) == 3) {
                $asignacionNueva = new Asignacion($datos->_legajoProfe, $datos->_idMateria, $datos->_turno);
                array_push($listaDeAsignaciones, $asignacionNueva);
            }
        }

        return $listaDeAsignaciones;
    }

    public static function serializar($asignacion)
    {
        $listaDeAsignaciones = Asignacion::deserializar();

        array_push($listaDeAsignaciones, $asignacion);

        parent::serializarObjeto("materias-profesores.ser", $listaDeAsignaciones);
    }

    public static function deserializar()
    {
        $lista = parent::deserializarObjeto("materias-profesores.ser");
        $listaDeAsignaciones = array();

        foreach ($lista as $datos) {

            if (count((array)$datos) == 3) {
                $asignacionNueva = new Asignacion($datos->_legajoProfe, $datos->_idMateria, $datos->_turno);
                array_push($listaDeAsignaciones, $asignacionNueva);
            }
        }

        return $listaDeAsignaciones;
    }
}
