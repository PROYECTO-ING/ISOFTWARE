<?php
/**
 * Actualiza un alumno especificado por su identificador
 */

require 'Publicaciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {  //al cmbiar post por delete 

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Actualizar alumno
    $retorno = Publicaciones::update(
        $body['id'],
        $body['asunto'],
        $body['descripcion'],
        $body['mensaje'],
        $body['dia'],
        $body['hora'],
        $body['created_at'],
        $body['is_web'],
        $body['publica'],
        $body['payment_id'],
        $body['user_id'],
        $body['pacient_id'],
        $body['status_id']);

    if ($retorno) {
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Actualizacion correcta"));
		echo $json_string;
    } else {
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se actualizo el registro"));
		echo $json_string;
    }
}
?>
