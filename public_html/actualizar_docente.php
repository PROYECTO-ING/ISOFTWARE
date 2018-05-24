<?php
/**
 * Actualiza un docente especificado por su identificador
 */

require 'Docentes.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {  //al cmbiar post por delete 

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Actualizar docente
    $retorno = Docentes::update(
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
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Actualizacion correcta"));
		echo $json_string;
    } else {
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se actualizo el registro"));
		echo $json_string;
    }
}
?>
