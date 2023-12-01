<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.html' ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera -->
        <?php include 'partials/header.html' ?>
        <legend>Mostrar Alumno</legend>

        <!-- Añadimos el menú -->
        <?php include 'partials/menu.php' ?>

       
         <!-- Formulario Mostrar Alumno -->
        <form >
            <div class="mb-3">
                <label class="form-label">id</label>
                <input type="number" class="form-control" name="id" value="<?=$alumno->id?>" disabled>
            </div>
            <!-- Nombre -->
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?=$alumno->nombre?>" disabled>
            </div>
            <!-- Apellidos -->
            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?=$alumno->apellidos?>" disabled>
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" name="mail" value="<?=$alumno->email?>" disabled>
            </div>
            <!-- Telefono -->
            <div class="mb-3">
                <label class="form-label">Télefono</label>
                <input type="number" class="form-control" name="telefono" value="<?=$alumno->telefono?>" disabled>
            </div>
            <!-- Dirección -->
            <div class="mb-3">
                <label class="form-label">Dirección</label>
                <input type="text" class="form-control" name="direccion" value="<?=$alumno->direccion?>" disabled>
            </div>
            <!-- Población -->
            <div class="mb-3">
                <label class="form-label">Población</label>
                <input type="text" class="form-control" name="poblacion" value="<?=$alumno->poblacion?>" disabled>
            </div>
            <!-- Provincia -->
            <div class="mb-3">
                <label class="form-label">Provincia</label>
                <input type="text" class="form-control" name="provincia" value="<?=$alumno->provincia?>" disabled>
            </div>
            <!-- Nacionalidad -->
            <div class="mb-3">
                <label class="form-label">Nacionalidad</label>
                <input type="text" class="form-control" name="nacionalidad" value="<?=$alumno->nacionalidad?>" disabled>
            </div>
            <!-- DNI -->
            <div class="mb-3">
                <label class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" pattern="[0-9]{8}[A-Z]{1}" value="<?=$alumno->dni?>" disabled>
            </div>
            <!-- Fecha Nacimiento -->
            <div class="mb-3">
                <label class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fechaNacimiento" value="<?=$alumno->fechaNac?>" disabled>
            </div>
            <!-- Curso -->
            <div class="mb-3">
                <label class="form-label">Curso</label>
                <input type="text" class="form-control" value="<?=$alumnoCurso?>" disabled> 
            </div>

            <div class="mb-3">
                <a class="btn btn-secondary" href="index.php" role="button">Volver</a>
            </div>
        </form>
    </div>
    <br>
    <br>
    <br>
    <!-- Pie de documento -->
     <?php include 'partials/footer.html' ?>


    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>