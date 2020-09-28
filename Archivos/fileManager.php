<?php

class FileManager
{

    // Modos:
    // 'r' 	L -> puntero al principio del fichero.
    // 'r+' L/E -> puntero al principio del fichero.
    // 'w' 	E -> puntero al principio del fichero y "suprime" el archivo. Si no existe se intenta crear.
    // 'w+' L/E -> puntero al principio del fichero y "suprime" el archivo. Si no existe se intenta crear.
    // append
    // 'a' 	E -> puntero del fichero al final. Si no existe, se intenta crear.
    // 'a+' L/E -> puntero del fichero al final. Si no existe, se intenta crear.

    public static function serializarObjeto($archivo, $arraySer)
    {
        $file = fopen($archivo, 'w');
        $rta = fwrite($file, serialize($arraySer));
        fclose($file);
        return $rta;
    }

    public static function deserializarObjeto($archivo)
    {
        $lista = array();
        if (file_exists($archivo)) {
            $file = fopen($archivo, 'r');
            if (filesize($archivo) != 0) {
                $arrayString = fread($file, filesize($archivo));
                $lista = unserialize($arrayString);
                fclose($file);
                return $lista;
            }
            fclose($file);
        }
        return $lista;
    }

    public static function readText($fileName)
    {
        $listaDeDatos = array();

        if (!file_exists($fileName))
            return $listaDeDatos;

        $fileStream = fopen($fileName, 'r');

        while (!feof($fileStream)) {
            $linea = fgets($fileStream);
            $objeto = explode('~', $linea);
            if (count($objeto) > 0) {
                array_push($listaDeDatos, $objeto);
            }
        }

        fclose($fileStream);

        return $listaDeDatos;
    }

    public static function saveText($fileName, $arrayText)
    {
        $fileStream = fopen($fileName, 'w');
        if ($fileStream != null) {
            foreach ($arrayText as $item) {
                fwrite($fileStream, $item);
            }
        }
        fclose($fileStream);
    }

    public static function readJSON($archivo)
    {
        $lista = array();
        if (file_exists($archivo)) {
            $file = fopen($archivo, 'r');
            if (filesize($archivo) != 0) {
                $arrayString = fread($file, filesize($archivo));
                $lista = json_decode($arrayString);
                fclose($file);
                return $lista;
            }
            fclose($file);
        }
        return $lista;
    }

    public static function saveJSON($archivo, $arrayJson)
    {
        $file = fopen($archivo, 'w');
        $rta = fwrite($file, json_encode($arrayJson));
        fclose($file);
        return $rta;
    }
}
