<?php
require_once "../Archivos/fileManager.php";
define("fileName", "../Archivos/Autos");

class Auto extends FileManager
{
    public $_patente;
    public $_marca;
    public $_color;
    public $_precio;
    public $_fecha;



    public function __construct($patente, $marca, $color, $precio = 0, $fecha = null)
    {
        if (!is_null($patente) && is_string($patente)) {
            $this->_patente = $patente;
        }
        if (!is_null($marca) && is_string($marca)) {
            $this->_marca = $marca;
        }
        if (!is_null($color) && is_string($color)) {
            $this->_color = $color;
        }
        if (is_numeric($precio)) {
            $this->_precio = $precio;
        }
        if (is_null($fecha)) {
            $this->_fecha = "--/--/----";
        } else {
            $this->_fecha = $fecha;
        }
    }

    public function __get($attribute) //metodos magicos solo se pueden usar una vez por clase
    {
        return $this->$attribute;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function agregarImpuestos($impuesto)
    {
        if (is_numeric($impuesto)) {
            $this->_precio += $impuesto;
            return true;
        }
        return false;
    }

    public static function mostrarAuto($auto)
    {
        if (!is_null($auto)) {
            echo $auto->__toString();
        } else {
            echo "Por favor cree el objeto primero";
        }
    }

    public function __toString()
    {
        //return json_encode($this);
        return "$this->_patente*$this->_marca*$this->_color*$this->_precio*$this->_fecha";
    }

    public function equals($auto)
    {
        return $auto->_marca == $this->_marca;
    }

    public static function add($auto1, $auto2)
    {
        if (!is_null($auto1) && !is_null($auto2)) {
            if ($auto1->_marca == $auto2->_marca && $auto1->_color == $auto2->_color) {
                return (float)($auto1->_precio + $auto2->_precio);
            } else {
                echo "La marca o el color de los autos no coinciden. ";
                return 0;
            }
        } else {
            echo "Por favor crear los autos";
        }
    }

    public static function guardarAutosText($auto)
    {
        parent::escribirArchivoTexto(fileName, "w", $auto);
    }

    public static function leerAutosText()
    {
        $datos = parent::leerArchivoTexto(fileName, "r");
        $listaAutos = array();

        foreach ($datos as $value) {
            //count -> depende de la cantidad de parametros del objeto
            if (count($value) == 5) {
                $autoNuevo = new Auto($value[0], $value[1], $value[2], $value[3], $value[4]);
                array_push($listaAutos, $autoNuevo);
            }
        }

        return $listaAutos;
    }

    public static function guardarAutosJson($auto)
    {
        parent::escribirArchivoJson(fileName, "w", $auto);
    }

    public static function leerAutosJson()
    {
        $datos = parent::leerArchivoJson(fileName, "r");
        $listaAutos = array();
        var_dump($datos);

        foreach ($datos as $value) {
            //count -> depende de la cantidad de parametros del objeto
            if (count($value) == 5) {
                $autoNuevo = new Auto($value['_patente'], $value['_marca'], $value['_color'], $value['_precio'], $value['_fecha']);
                array_push($listaAutos, $autoNuevo);
            }
        }
        return $listaAutos;
    }
}
