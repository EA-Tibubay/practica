<?php

// index.php

include_once 'Controllers/LoginController.php';

$controller = new LoginController();

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controllerName = $_GET['controller'];
    $action = $_GET['action'];

    $controller->$action($_POST['usuario'], $_POST['contrasena']);
} else {
    $controller->mostrarFormularioLogin();
}


?>
