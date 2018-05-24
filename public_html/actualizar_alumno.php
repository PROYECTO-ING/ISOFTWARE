<?php
/**
 * Actualiza un alumno especificado por su identificador
 */

require 'Datos.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Actualizar alumno
    $retorno = Datos::update(
        $body['id'],
        $body['nombre'],
        $body['apellido'],
        $body['edad'],
        $body['telefono'],
        $body['direccion'],
        $body['carne'],
        $body['grado'],
        $body['genero'],
        $body['es_favorito'],
        $body['is_active'],
        $body['carrera'],
        $body['created_at']);

    if ($retorno) {
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Actualizacion correcta"));
		echo $json_string;
    } else {
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se actualizo el registro"));
		echo $json_string;
    }
}
?>
