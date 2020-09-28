<?php

require_once "auto17.php";

class Garage
{

    private $_razonSocial;
    private $_precioHora;
    private $_autos;

    public function __construct($razonSocial, $precioHora = 0)
    {
        if (!is_null($razonSocial) && is_string($razonSocial)) {
            $this->_razonSocial = $razonSocial;
        }
        if (is_numeric($precioHora)) {
            $this->_precioHora = $precioHora;
        }
        $this->_autos = array();
    }

    public function __get($attribute)
    {
        return $this->$attribute;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function mostrarGarage()
    {
        $cadenaGarage = "La razon social es $this->_razonSocial, el precio por hora es $this->_precioHora.<br> Autos: <br>";

        foreach ($this->_autos as $value) {
            $cadenaGarage = $cadenaGarage . $value->__toString() . "<br>";
        }

        return $cadenaGarage;
    }

    public function equals($auto)
    {
        if (!is_null($this->_autos) && !is_null($auto)) {
            return in_array($auto, $this->_autos, true);
        }
    }

    public function add($auto)
    {
        if (!is_null($auto)) {
            if (!$this->equals($auto)) {
                array_push($this->_autos, $auto);
            } else {
                echo "El auto ya está en el garage";
            }
        } else {
            echo "Por favor crea el auto";
        }
    }

    public function remove($auto){
        if(!is_null($auto)){
            if($this->equals($auto)){
                $index = array_search($auto, $this->_autos, true);
                unset($this->_autos[$index]);
            }
            else{
                echo "El auto no está en el garage";
            }
        }
    }
}
