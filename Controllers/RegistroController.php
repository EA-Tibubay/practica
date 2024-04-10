<?php

include_once '../Db/Database.php';
include_once '../Model/RegistroModel.php';

class RegistroController {

    private $database;
    private $usuario;

    public function __construct() {
        $this->database = new Database();
        $this->usuario = new Usuario($this->database);
    }

    public function registrarUsuario() {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $rol = $_POST['rol'];
        $grado = $_POST['grado'] ?? null;
        $especialidad = $_POST['especialidad'] ?? null;
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        $this->usuario->insertarUsuario($nombre, $apellido, $email, $rol, $grado, $especialidad, $usuario, $contrasena);

        // Redireccionar al usuario a la página de inicio
        header('Location: ../index.php');
    }
}
