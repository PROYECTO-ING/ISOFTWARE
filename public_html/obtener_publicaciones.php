<?php
/**
 * Obtiene todas las publicacion de la base de datos
 */

require 'Publicaciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Manejar petición GET
    $publicacion = Publicaciones::getPublicacion();

    if ($publicacion) {

        $datos["estado"] = 1;
        $datos["publicacion"] = $publicacion;

        print json_encode($datos);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
}
