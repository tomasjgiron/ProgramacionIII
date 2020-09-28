<?php
require_once "./asignacion.php";
require_once "./materia.php";
require_once "./profesor.php";
require_once "./usuario.php";

require __DIR__ . "./vendor/autoload.php";

function getToken()
{
    $headers = getallheaders();
    return $headers['token'];
}

$method = $_SERVER['REQUEST_METHOD'];
$path_info = $_SERVER['PATH_INFO'];

switch ($method) {
    case 'GET': {
            if (Usuario::validateToken(getToken())) {
                switch ($path_info) {
                    case '/usuario': {
                            Usuario::leerJson();
                            break;
                        }
                    case '/materia': {
                            Materia::leerJson();
                            break;
                        }
                    case '/profesor': {
                            Profesor::leerJson();
                            break;
                        }
                    case '/asignacion': {
                            $profesores = Profesor::leerJson();
                            $materias = Materia::leerJson();
                            $asignaciones = Asignacion::leerJson();

                            foreach ($asignaciones as $asignacion) {
                                $cadena = "Turno: $asignacion->_turno ";
                                foreach ($profesores as $profesor) {
                                    if ($profesor->_legajo == $asignacion->_legajoProfe) {
                                        $cadena = $cadena . $profesor;
                                    }
                                }
                                foreach ($materias as $materia) {
                                    if ($materia->_id == $asignacion->_idMateria) {
                                        $cadena = $cadena . $materia;
                                    }
                                }

                                $cadena = $cadena . PHP_EOL;
                            }
                            break;
                        }
                    default: {
                            echo "Clase no implementada";
                            break;
                        }
                }
            } else {
                echo "No autorizado"; //se podria cambiar con un HTTP response 401
            }
            break;
        }
    case 'POST': {
            switch ($path_info) {
                case '/usuario': {
                        $clave = $_POST['clave'] != null ? password_hash($_POST['clave'], PASSWORD_DEFAULT) : "";
                        $usuario = new Usuario($_POST['email'], $_POST['clave']);
                        $response = Usuario::validateUsuario($usuario);
                        if ($response == true) {
                            Usuario::guardarJson($usuario);
                        } else {
                            echo $response[1];
                        }
                        break;
                    }
                case '/login': {
                        $response = Usuario::login($_POST['email'], $_POST['clave']);
                        if ($response == true) {
                            echo $response;
                        } else {
                            echo "Usuario o clave incorrectos";
                        }
                        break;
                    }
                case '/materia': {
                        if (Usuario::validateToken(getToken())) {
                            $materia = new Materia($_POST['nombre'], $_POST['cuatrimestre']);
                            $response = Materia::validateMateria($materia);
                            if ($response == true) {
                                Materia::guardarJson($materia);
                            } else {
                                echo $response[1];
                            }
                        } else {
                            echo "No autorizado"; //se podria cambiar con un HTTP response 401
                        }
                        break;
                    }
                case '/profesor': {
                        if (Usuario::validateToken(getToken())) {
                            $profesor = new Profesor($_POST['nombre'], $_POST['legajo']);
                            $response = Profesor::validateProfesor($profesor);
                            if ($response == true) {
                                Profesor::guardarJson($profesor);
                            } else {
                                echo $response[1];
                            }
                        } else {
                            echo "No autorizado"; //se podria cambiar con un HTTP response 401
                        }
                        break;
                    }
                case '/asignacion': {
                        if (Usuario::validateToken(getToken())) {
                            $asignacion = new Asignacion($_POST['legajoProfe'], $_POST['idMateria'], $_POST['turno']);
                            $response = Asignacion::validateAsignacion($asignacion);
                            if ($response == true) {
                                Asignacion::guardarJson($asignacion);
                            } else {
                                echo $response[1];
                            }
                        } else {
                            echo "No autorizado"; //se podria cambiar con un HTTP response 401
                        }
                        break;
                    }
                default: {
                        echo "Clase no implementada";
                        break;
                    }
            }
            break;
        }
    default: {
            echo "Metodo no implementado";
            break;
        }
}
