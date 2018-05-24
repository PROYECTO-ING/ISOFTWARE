<?php
/**
 * Insertar un nuevo docente en la base de datos
 */

require 'Docentes.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Insertar docente
    $retorno = Docentes::insert(
        $body['id'],
        $body['no'],
        $body['nombre'],
        $body['apellido'],
        $body['genero'],
        $body['fecha_de_nac'],
        $body['email'],
        $body['direccion'],
        $body['telefono'],
        $body['is_active'],
        $body['category_id'],
        $body['created_at']);

    if ($retorno) {
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Creacion correcta"));
		echo $json_string;
    } else {
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se creo el registro"));
		echo $json_string;
    }
}

?>