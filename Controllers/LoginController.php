<?php

include_once 'Model/Usuario.php';
include_once 'Db/Database.php';

class LoginController {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function mostrarFormularioLogin() {
        include 'View/login.php';
    }

    public function login($usuario, $contrasena) {
    $conexion = $this->db->conectar();

    if (!$conexion) {
        die('Error de conexión a la base de datos');
    }

    // Cambié la columna 'contraseña' a 'password' para evitar conflictos con la palabra reservada
    $stmt = $conexion->prepare('SELECT * FROM login WHERE usuario = ? AND password = ?');

    if (!$stmt) {
        die('Error en la preparación de la consulta');
    }

    $stmt->execute([$usuario, $contrasena]);

    // Cambié la verificación de fetch para manejar casos donde no hay resultados
    $usuarioValido = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuarioValido !== false) {
        // Iniciar sesión (puedes implementar tu lógica de inicio de sesión aquí)
        //echo "Inicio de sesión exitoso";
        session_start();
        header("Location: View/inicio.php");
        exit(); // Asegura que el script se detenga después de la redirección
        } else {
        echo '<script>alert("Credenciales incorrectas");</script>';
        echo '<script>window.location.href = "index.php";</script>';
        }
    }
    
    public function cerrarSesion() {
        // Implementa la lógica para cerrar sesión aquí
        // Destruye cualquier sesión o información de usuario almacenada
        // Redirige a login.php después de cerrar sesión
        session_start();
        session_destroy();
        header("Location: index.php");
        exit();
    }
}
?>
