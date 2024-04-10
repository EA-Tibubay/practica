<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <!-- Agrega los enlaces a los archivos de Bootstrap para un estilo básico -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Estilos CSS personalizados -->
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            height: 100%;
            width: 200px;
            background-color: #111;
            padding-top: 20px;
            color: white;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar a {
            padding: 16px;
            text-decoration: none;
            font-size: 20px;
            color: white;
            display: block;
            width: 100%;
            box-sizing: border-box;
        }

        .sidebar a:hover {
            background-color: #ddd;
            color: black;
        }

        main {
            flex: 1;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
        }

        main form {
            max-width: 400px; /* Ajusta el ancho del formulario según tus necesidades */
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <a href="#" id="cerrarSesion">Cerrar Sesión</a>
        <a href="#" id="registroBtn">Registrar</a>
    </div>

    <main id="contenidoPrincipal">
        <!-- Contenido principal de la página -->
    </main >

    <!-- Script JavaScript para gestionar acciones -->
    <script>
        document.getElementById("cerrarSesion").addEventListener("click", function() {
            window.location.href = "../index.php?controller=login&action=cerrarSesion";
        });

        document.getElementById("registroBtn").addEventListener("click", function() {
            cargarContenido("registro.php");
        });

        function cargarContenido(pagina) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("contenidoPrincipal").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", pagina, true);
            xhttp.send();
        }
    </script>

</body>
</html>
