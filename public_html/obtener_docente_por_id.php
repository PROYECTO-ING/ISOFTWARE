<?php
/**
 * Obtiene el detalle de un docente especificado por
 * su identificador "iddocente"
 */

require 'Docentes.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['id'])) {

        // Obtener parámetro iddocente
        $parametro = $_GET['id'];

        // Tratar retorno
        $retorno = Docentes::getById($parametro);


        if ($retorno) {

            $docente["estado"] = 1;		// cambio "1" a 1 porque no coge bien la cadena.
            $docente["docente"] = $retorno;
            // Enviar objeto json del docente
            print json_encode($docente);
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

