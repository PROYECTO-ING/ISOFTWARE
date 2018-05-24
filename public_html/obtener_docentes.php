<?php
/**
 * Obtiene todas las docentes de la base de datos
 */

require 'Docentes.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Manejar petición GET
    $docentes = Docentes::getDocente();

    if ($docentes) {

        $datos["estado"] = 1;
        $datos["docentes"] = $docentes;

        print json_encode($datos);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
}

