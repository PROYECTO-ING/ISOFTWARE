<?php

/**
 * Representa el la estructura de las Alumnoss
 * almacenadas en la base de datos
 */
require 'Database.php';

class Publicaciones 
{
    function __construct()
    {
    }

//////////////////////////////////////////////////////////////////////////////////////////
                    //METODOS PARA publicaciones
//////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Retorna en la fila especificada de la tabla 'publicaciones'
     *
     * @param $idDocente Identificador del registro
     * @return array Datos del registro
     */
    public static function getPublicacion()
    {
        $consulta = "SELECT * FROM publicaciones";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }



     /**
     * Obtiene los campos de un Alumno con un identificador
     * determinado
     *
     * @param $idAlumno Identificador del alumno
     * @return mixed
     */
    public static function getById($idDocente)
    {
        // Consulta de la tabla Alumnos
        $consulta = "SELECT asunto, descripcion, mensaje, dia, hora, created_at, is_web, publica, payment_id, user_id, pacient_id, status_id
                             FROM publicaciones
                             WHERE id = ?;";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($idDocente));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }


    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $idDocente      identificador
     */
    
    public static function update(
        $idPublicacion,
        $asunto,
        $descripcion,
        $mensaje,
        $dia,
        $hora,
        $created_at,
        $is_web,
        $publica,
        $payment_id,
        $user_id,
        $pacient_id,
        $status_id
    )
    {
        $consulta = "UPDATE publicaciones" .
            " SET asunto=?, descripcion=?, mensaje=?, dia=?, hora=?, created_at=?, is_web=?, publica=?, payment_id=?, user_id=?, pacient_id=?, status_id=?" .
            "WHERE id=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($asunto, $descripcion, $mensaje, $dia, $hora, $created_at, $is_web, $publica, $payment_id, $user_id, 
            $pacient_id, $status_id, $idPublicacion));

        return $cmd;
    }

    /**
     * Insertar un nuevo Docente
     *
     * @param $nombre      nombre del nuevo registro
     */
    public static function insert(
        $idPublicacion,
        $asunto,
        $descripcion,
        $mensaje,
        $dia,
        $hora,
        $created_at,
        $is_web,
        $publica,
        $payment_id,
        $user_id,
        $pacient_id,
        $status_id
    )
    {
        // Sentencia INSERT
        $comando = "INSERT INTO publicaciones ( " .
            "id," .
            "asunto," .
            "descripcion," .
            "mensaje," .
            "dia," .
            "hora," .
            "created_at," .
            "is_web," .
            "publica," .
            "payment_id," .
            "user_id," .
            "pacient_id," .
            "status_id)" .
            " VALUES( ?,?,?,?,?,?,?,?,?,?,?,?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
        $idPublicacion,
        $asunto,
        $descripcion,
        $mensaje,
        $dia,
        $hora,
        $created_at,
        $is_web,
        $publica,
        $payment_id,
        $user_id,
        $pacient_id,
        $status_id
        )
        );

    }


    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idDocente identificador de la tabla Alumnos
     * @return bool Respuesta de la eliminación
     */
    public static function delete($idPublicacion)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM publicaciones WHERE id=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($idPublicacion));
    }
}

?>