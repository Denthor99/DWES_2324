<!DOCTYPE html>
<html lang="es">

<head>
<?php require_once("template/partials/head.php") ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <br><br>
        <!-- Cabecera -->
        <?php require_once("views/cliente/partials/header.php") ?>

        <!-- El menú no es necesario-->

        <!-- Formulario Nuevo Alumno -->
        <form action="<?=URL?>cliente/create" method="POST">
            <!-- id (no se deberá ni mostrar, ni estar oculto-->
            
            <!-- Nombre -->
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <!-- Apellidos -->
            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos">
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" name="email">
            </div>
            <!-- Telefono -->
            <div class="mb-3">
                <label class="form-label">Télefono</label>
                <input type="number" class="form-control" name="telefono">
            </div>
            <!-- Ciudad -->
            <div class="mb-3">
                <label class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad">
            </div>
            <!-- DNI -->
            <div class="mb-3">
                <label class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" pattern="[0-9]{8}[A-Z]{1}">
            </div>

            <div class="mb-3">
                <a class="btn btn-secondary" href="<?=URL?>cliente" role="button">Cancelar</a>
                <button type="reset" class="btn btn-danger">Borrar</button>
                <button type="submit" class="btn btn-primary">Añadir</button>
            </div>

        </form>
        <br>
        <br>
        <br>
        <!-- Pie de documento -->
        <?php require_once("template/partials/footer.php") ?>

    </div>


	<?php require_once("template/partials/javascript.php") ?>
</body>

</html>