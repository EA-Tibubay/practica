<?php

class Database {
    private $host = 'localhost';
    private $usuario = 'root';
    private $contrasena = '';
    private $nombreBaseDatos = 'sysnotas1';
    private $conexion;

    public function conectar() {
        $this->conexion = null;

        try {
            $this->conexion = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->nombreBaseDatos,
                $this->usuario,
                $this->contrasena
            );
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
        }

        return $this->conexion;
    }
}
?>
