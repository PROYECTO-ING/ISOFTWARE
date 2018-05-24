<?php

/**
 * Representa el la estructura de las Alumnoss
 * almacenadas en la base de datos
 */
require 'Database.php';

class Docentes
{
    function __construct()
    {
    }

//////////////////////////////////////////////////////////////////////////////////////////
                    //METODOS PARA DOCENTES
//////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Retorna en la fila especificada de la tabla 'Docentes'
     *
     * @param $idDocente Identificador del registro
     * @return array Datos del registro
     */
    public static function getDocente()
    {
        $consulta = "SELECT * FROM docentes";
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
        $consulta = "SELECT no, nombre, apellido, genero, fecha_de_nac, email, direccion, telefono, is_active, category_id, created_at
                             FROM docentes
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
        $idDocente,
        $no,
        $nombre,
        $apellido,
        $genero,
        $fecha_de_nac,
        $email,
        $direccion,
        $telefono,
        $is_active,
        $category_id,
        $created_at
    )
    {
        $consulta = "UPDATE docentes" .
            " SET no=?, nombre=?, apellido=?, genero=?, fecha_de_nac=?, email=?, direccion=?, telefono=?, is_active=?, category_id=?, created_at=?" .
            "WHERE id=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($no, $nombre, $apellido, $genero, $fecha_de_nac, $email, $direccion, $telefono, $is_active, $category_id, 
            $created_at, $idDocente));

        return $cmd;
    }

    /**
     * Insertar un nuevo Docente
     *
     * @param $nombre      nombre del nuevo registro
     */
    public static function insert(
        $idDocente,
        $no,
        $nombre,
        $apellido,
        $genero,
        $fecha_de_nac,
        $email,
        $direccion,
        $telefono,
        $is_active,
        $category_id,
        $created_at
    )
    {
        // Sentencia INSERT
        $comando = "INSERT INTO docentes ( " .
            "id," .
            "no," .
            "nombre," .
            "apellido," .
            "genero," .
            "fecha_de_nac," .
            "email," .
            "direccion," .
            "telefono," .
            "is_active," .
            "category_id," .
            "created_at)" .
            " VALUES( ?,?,?,?,?,?,?,?,?,?,?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
        $idDocente,
        $no,
        $nombre,
        $apellido,
        $genero,
        $fecha_de_nac,
        $email,
        $direccion,
        $telefono,
        $is_active,
        $category_id,
        $created_at
        )
        );

    }


    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idDocente identificador de la tabla Alumnos
     * @return bool Respuesta de la eliminación
     */
    public static function delete($idDocente)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM docentes WHERE id=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($idDocente));
    }
}

?>