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
        <legend>Formulario Editar Alumno</legend>

        <!-- Añadimos el menú -->
        <?php include 'partials/menu.php' ?>

       
         <!-- Formulario Nuevo Artículo -->
         <br>
         <form action="update.php?indice=<?=$indice?>" method="POST">
            <!-- Id -->
            <div class="mb-3">
                <label class="form-label">id</label>
                <input type="number" class="form-control" name="id" value="<?=$alumno->id?>" readonly>
            </div>
            <!-- Nombre -->
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?=$alumno->nombre?>">
            </div>
            <!-- Apellidos -->
            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?=$alumno->apellidos?>">
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?=$alumno->email?>">
            </div>
            <!-- Fecha de Nacimiento -->
            <div class="mb-3">
                <label class="form-label">Fecha de Nacimiento</label>
                <!--Creamos una variable intermedia que convierta la fecha en un formato adecuado para la visualización-->
                <?php $fechaForm = date('Y-m-d', strtotime($alumno->fecha_nacimiento));?>
                <input type="date" class="form-control" name="fecha_nacimiento" value="<?=$fechaForm?>">
            </div>
            <!-- Curso -->
            <div class="mb-3">
                <label class="form-label">Curso</label>
                <select class="form-select" aria-label="Default select example" name="curso">
                    <?php foreach($cursos as $key => $curso): ?>
                        <option value="<?=$key?>"
                        <?=($alumno->curso == $key)?'selected':null ?>
                        >
                        <?=$curso?></option>
                    <?php endforeach; ?>
                </select>
            </div>
           
            <!-- Asignaturas -->
            <div class="mb-3">
                <label class="form-label">Asignaturas a escoger</label>
                <div class="form-control">
                    <?php foreach ($asignaturas as $key => $asignatura): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $key ?>" name="asignaturas[]"
                            <?=(in_array($key,$alumno->asignaturas) ? 'checked': null)?>
                            >
                            <!--Al ser múltiples opciones, se deberan recoger dichos valores en un array-->
                            <label class="form-check-label" for="">
                                <?= $asignatura ?>
                                <label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>

        </form>
        <br>
        <br>
        <br>
        

    </div>
    <!-- Pie de documento -->
     <?php include 'partials/footer.html' ?>


    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>