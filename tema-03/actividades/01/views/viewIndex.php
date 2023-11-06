<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Incluir head -->
    <title>Actividad 3.1 Formulario Registro</title>
    <?php
    include 'layouts/head.html';
    ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-person-circle"></i>
            <span class="fs-5">Actividad 3.1 Formulario Registro</span>
        </header>

        <legend>Formulario Registro</legend>
        <form method="POST" action="acceso.php">

            <!-- Nombre del usuario -->
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control" name="usuario" aria-describedby="userHelp">
                <div id="userHelp" class="form-text">Entre 8 y 15 caracteres.</div>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="correo" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Introduzca Email valido.</div>
            </div>

            <!-- Contraseña -->
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="contra" class="form-control">
            </div>

            <!-- Confirmar contraseña -->
            <div class="mb-3">
                <label class="form-label">Confirmación de Contraseña</label>
                <input type="password" name="contraConfirm" class="form-control">
            </div>

            <!-- Selección de Perfiles -->
            <select class="form-select" aria-label="Default select example" name="perfiles">
                <option selected disabled>Seleccione un perfil:</option>
                <option value="admin">Administrador</option>
                <option value="editor">Editor</option>
                <option value="usuario">Usuario</option>
            </select>
            <br>

            <!-- Botones de acción -->
            <button type="reset" class="btn btn-primary">Borrar</button>
            <button type="submit" class="btn btn-primary" formaction="acceso.php">Acceso</button>
        </form>
        <br>
        <br>
        <br>


        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>