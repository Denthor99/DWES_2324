<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera -->
        <?php include 'views/partials/header.php' ?>
        <legend>Formulario Mostrar Corredor</legend>

        <!-- El menú no es necesario-->

        <!-- Formulario Nuevo Alumno -->
        <form>
            <!-- id (no se deberá ni mostrar, ni estar oculto-->

            <!-- Nombre -->
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?=$corredor->nombre?>" disabled>
            </div>
            <!-- Apellidos -->
            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?=$corredor->apellidos?>" disabled>
            </div>
            <!-- ciudad -->
            <div class="mb-3">
                <label class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" value="<?=$corredor->ciudad?>" disabled>
            </div>
            <!-- Sexo -->
            <div class="mb-3">
                <label class="form-label">Sexo</label>
                <?php if($corredor->sexo === 'H') :?>
                    <input type="text" class="form-control" value="Hombre" disabled>
                <?php elseif ($corredor->sexo ==='M'): ?>
                    <input type="text" class="form-control" value="Mujer" disabled>
                <?php else :?>
                    <input type="text" class="form-control" value="Sin especificar" disabled>
                <?php endif;?>
            </div>
            <!-- Fecha de Nacimiento -->
            <div class="mb-3">
                <label class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fechaNacimiento" value="<?=$corredor->fechaNacimiento?>" disabled>
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" name="email" value="<?=$corredor->email?>" disabled>
            </div>

            <!-- DNI -->
            <div class="mb-3">
                <label class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" value="<?=$corredor->dni?>" disabled>
            </div>
            <!-- Categorias -->
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <input type="text" class="form-control" value="<?=$categoria->nombre?>" disabled>
            </div>

            <!-- Clubs -->
            <div class="mb-3">
                <label class="form-label">Club</label>
                <input type="text" class="form-control" value="<?=$club->nombre?>" disabled>
            </div>

            <div class="mb-3">
                <a class="btn btn-secondary" href="index.php" role="button">Volver</a>
            </div>

        </form>
        <br>
        <br>
        <br>
        <!-- Pie de documento -->
        <?php include 'views/partials/footer.php' ?>

    </div>


    <!-- js bootstrap 532-->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>