<?php
/**
 * Obtiene el detalle de un publicacion especificado por
 * su identificador "idpublicacion"
 */

require 'Publicaciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['id'])) {

        // Obtener parámetro idpublicacion
        $parametro = $_GET['id'];

        // Tratar retorno
        $retorno = Publicaciones::getById($parametro);


        if ($retorno) {

            $publicacion["estado"] = 1;		// cambio "1" a 1 porque no coge bien la cadena.
            $publicacion["publicacion"] = $retorno;
            // Enviar objeto json del publicacion
            print json_encode($publicacion);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'estado' => '2',
                    'mensaje' => 'No se obtuvo el registro'
                )
            );
        }

    } else {
        // Enviar respuesta de error
        print json_encode(
            array(
                'estado' => '3',
                'mensaje' => 'Se necesita un identificador'
            )
        );
    }
}

