<!-- Formulario de Registro con estilos Bootstrap -->
<div class="container mt-5">
    <form action="../Controllers/RegistroController.php" method="post" id="registroForm" class="col-md-6 offset-md-3">
        <h2 class="mb-4">Registro de Usuario</h2>

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="rol">Rol:</label>
            <select name="rol" id="rolSelect" class="form-control" required>
                <option value="estudiante">Estudiante</option>
                <option value="profesor">Profesor</option>
            </select>
        </div>

        <!-- Campo específico para Estudiante -->
        <div id="gradoField" style="display: none;" class="form-group">
            <label for="grado">Grado:</label>
            <input type="text" name="grado" class="form-control">
        </div>

        <!-- Campo específico para Profesor -->
        <div id="especialidadField" style="display: none;" class="form-group">
            <label for="especialidad">Especialidad:</label>
            <input type="text" name="especialidad" class="form-control">
        </div>

        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>

<script>
    document.getElementById("rolSelect").addEventListener("change", function() {
        var selectedRol = this.value;
        var gradoField = document.getElementById("gradoField");
        var especialidadField = document.getElementById("especialidadField");

        // Mostrar u ocultar campos según el rol seleccionado
        gradoField.style.display = selectedRol === "estudiante" ? "block" : "none";
        especialidadField.style.display = selectedRol === "profesor" ? "block" : "none";
    });
</script>
