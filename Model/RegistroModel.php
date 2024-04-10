<?php

class Usuario {

    private $database;

    public function __construct(Database $database) {
        $this->database = $database;
    }

    public function insertarUsuario($nombre, $apellido, $email, $rol, $grado, $especialidad, $usuario, $contrasena) {
        $sql = 'INSERT INTO persona (nombre, apellido, email, rol) VALUES (?, ?, ?, ?)';
        $sentencia = $this->database->conectar()->prepare($sql);
        $sentencia->bindParam(1, $nombre);
        $sentencia->bindParam(2, $apellido);
        $sentencia->bindParam(3, $email);
        $sentencia->bindParam(4, $rol);
        $sentencia->execute();

        $idPersona = $this->database->conectar()->lastInsertId();

        if ($rol === 'estudiante') {
            $sql = 'INSERT INTO estudiante (id_persona, grado) VALUES (?, ?)';
            $sentencia = $this->database->conectar()->prepare($sql);
            $sentencia->bindParam(1, $idPersona);
            $sentencia->bindParam(2, $grado);
            $sentencia->execute();
        } else if ($rol === 'profesor') {
            $sql = 'INSERT INTO profesor (id_persona, especialidad) VALUES (?, ?)';
            $sentencia = $this->database->conectar()->prepare($sql);
            $sentencia->bindParam(1, $idPersona);
            $sentencia->bindParam(2, $especialidad);
            $sentencia->execute();
        }

        $sql = 'INSERT INTO login (usuario, password, id_persona) VALUES (?, ?, ?)';
        $sentencia = $this->database->conectar()->prepare($sql);
        $sentencia->bindParam(1, $usuario);
        $sentencia->bindParam(2, $contrasena);
        $sentencia->bindParam(3, $idPersona);
        $sentencia->execute();

        return true;
    }

    public function obtenerUsuarioPorId($id) {
        $sql = 'SELECT * FROM persona WHERE id_persona = ?';
        $sentencia = $this->database->conectar()->prepare($sql);
        $sentencia->bindParam(1, $id);
        $sentencia->execute();

        $usuario = $sentencia->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            return $usuario;
        }

        return null;
    }

    public function obtenerUsuarios() {
        $sql = 'SELECT * FROM persona';
        $sentencia = $this->database->conectar()->prepare($sql);
        $sentencia->execute();

        $usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $usuarios;
    }
}