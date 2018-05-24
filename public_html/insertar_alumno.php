<?php
/**
 * Insertar un nuevo alumno en la base de datos
 */

require 'Datos.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Insertar Alumno
    $retorno = Datos::insert(
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
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Creacion correcta"));
		echo $json_string;
    } else {
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se creo el registro"));
		echo $json_string;
    }
}

?>