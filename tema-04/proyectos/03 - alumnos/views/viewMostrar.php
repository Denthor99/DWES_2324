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
        <legend>Detalles del alumno</legend>

        <!-- Añadimos el menú -->
        <?php include 'partials/menu.php' ?>

       
         <!-- Formulario Mostrar Alumno -->
         <form>
             <!-- id -->
             <div class="mb-3">
                <label class="form-label">id</label>
                <input type="text" class="form-control" value="<?=$alumno->id?>"disabled>
            </div>
            <!-- Nombre -->
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" value="<?=$alumno->nombre?>"disabled>
            </div>
            <!-- Apellidos -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Apellidos</label>
                <input type="text" class="form-control" value="<?=$alumno->apellidos?>"disabled>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" value="<?=$alumno->email?>"disabled>
            </div>

            <!-- Edad -->
            <div class="mb-3">
                <label class="form-label">Edad</label>
                <input type="text" class="form-control" value="<?=$alumno->getEdad() ?>"disabled>
            </div>

            <!-- Curso -->
            <div class="mb-3">
                <label class="form-label">Curso</label>
                <input type="text" class="form-control" value="<?=$cursos[$alumno->curso]?>"disabled>
            </div>
            <!-- Asignaturas -->
            <div class="mb-3">
                <label for="precio" class="form-label">Asignaturas</label>
                <input type="text" class="form-control" value="<?=implode(', ',ArrayAlumnos::mostrarAsignaturas($asignaturas,$alumno->asignaturas))?>"disabled>
            </div>


            <a class="btn btn-secondary" href="index.php" role="button">Volver</a>
        </form>
        

    </div>
    <!-- Pie de documento -->
     <?php include 'partials/footer.html' ?>


    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>