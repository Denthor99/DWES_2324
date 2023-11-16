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
        <legend>Formulario Añadir Alumno</legend>

        <!-- Añadimos el menú -->
        <?php include 'partials/menu.php' ?>


        <!-- Formulario Nuevo Artículo -->
        <form action="create.php" method="POST">
            <!-- id -->
            <div class="mb-3">
                <label class="form-label">Id</label>
                <input type="number" class="form-control" name="id">
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- Nombre -->
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- Apellidos -->
            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos">
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>
             <!-- Email -->
             <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
                <!-- <div class="form-text">Género del libro</div> -->
            </div>
            <!-- Fecha de Nacimiento -->
            <div class="mb-3">
                <label class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento">
                <!-- <div class="form-text">Introduzca Precio</div> -->
            </div>
            <!-- Curso -->
            <div class="mb-3">
                <label class="form-label">Curso Academico</label>
                <select class="form-select" aria-label="Default select example" name="curso">
                    <option selected disabled>Selecciona un curso academico:</option>
                    <?php foreach ($cursos as $key => $curso): ?>
                        <option value="<?= $key ?>">
                            <?= $curso ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Asignaturas -->
            <div class="mb-3">
                <label class="form-label">Asignaturas a escoger</label>
                <div class="form-control">
                    <?php foreach ($asignaturas as $key => $asignatura): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $key ?>" name="asignaturas[]">
                            <!--Al ser múltiples opciones, se deberan recoger dichos valores en un array-->
                            <label class="form-check-label" for="">
                                <?= $asignatura ?>
                                <label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


            <div class="mb-3">
                <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
                <button type="reset" class="btn btn-danger">Borrar</button>
                <button type="submit" class="btn btn-primary">Añadir</button>
            </div>

        </form>
        <br>
        <br>
        <br>
        <!-- Pie de documento -->
    <?php include 'partials/footer.html' ?>

    </div>


    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>