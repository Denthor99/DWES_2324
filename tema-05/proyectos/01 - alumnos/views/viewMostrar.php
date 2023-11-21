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
                <label class="form-label">Id</label>
                <input type="number" class="form-control" value="<?=$alumno['id']?>">
            </div>
            <!-- Nombre -->
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" value="<?=$alumno['nombre']?>">
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" value="<?=$alumno['email']?>">
            </div>
            <!-- Telefono -->
            <div class="mb-3">
                <label class="form-label">Télefono</label>
                <input type="number" class="form-control" value="<?=$alumno['telefono']?>">
            </div>
            <!-- Población -->
            <div class="mb-3">
                <label class="form-label">Población</label>
                <input type="text" class="form-control" value="<?=$alumno['poblacion']?>">
            </div>
            <!-- DNI -->
            <div class="mb-3">
                <label class="form-label">DNI</label>
                <input type="text" class="form-control" value="<?=$alumno['dni']?>">
            </div>
            <!-- Edad -->
            <div class="mb-3">
                <label class="form-label">Edad</label>
                <input type="text" class="form-control" value="<?=$alumno['edad']?>">
            </div>
            <!-- Curso -->
            <div class="mb-3">
                <label class="form-label">Curso</label>
                <input type="text" class="form-control" value="<?=$alumno['curso']?>">
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