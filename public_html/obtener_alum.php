<?php
/**
 * Obtiene todas las alumnos de la base de datos
 */

require 'Datos.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Manejar petición GET
    $alumnos = Datos::mostrar();

    if ($alumnos) {

       $datos["estado"] = 1;
       $datos["alumnos"] = $alumnos;

        print json_encode($alumnos);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
}


      
