<!DOCTYPE html>
<html lang="es">

<head>
<?php require_once("template/partials/head.php") ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera -->
        <?php require_once("views/alumno/partials/header.php") ?>
        <legend><?=$this->title?></legend>

        <!-- El menú no es necesario-->

        <!-- Formulario Nuevo Alumno -->
        <form action="<?=URL?>alumno/update/<?=$this->id?>" method="POST">
            <!-- id (no se deberá ni mostrar, ni estar oculto-->
            
            <!-- Nombre -->
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?=$this->alumno->nombre?>">
            </div>
            <!-- Apellidos -->
            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?=$this->alumno->apellidos?>">
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" name="mail" value="<?=$this->alumno->email?>">
            </div>
            <!-- Telefono -->
            <div class="mb-3">
                <label class="form-label">Télefono</label>
                <input type="number" class="form-control" name="telefono" value="<?=$this->alumno->telefono?>">
            </div>
            <!-- Dirección -->
            <div class="mb-3">
                <label class="form-label">Dirección</label>
                <input type="text" class="form-control" name="direccion" value="<?=$this->alumno->direccion?>">
            </div>
            <!-- Población -->
            <div class="mb-3">
                <label class="form-label">Población</label>
                <input type="text" class="form-control" name="poblacion" value="<?=$this->alumno->poblacion?>">
            </div>
            <!-- Provincia -->
            <div class="mb-3">
                <label class="form-label">Provincia</label>
                <input type="text" class="form-control" name="provincia" value="<?=$this->alumno->provincia?>">
            </div>
            <!-- Nacionalidad -->
            <div class="mb-3">
                <label class="form-label">Nacionalidad</label>
                <input type="text" class="form-control" name="nacionalidad" value="<?=$this->alumno->nacionalidad?>">
            </div>
            <!-- DNI -->
            <div class="mb-3">
                <label class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" pattern="[0-9]{8}[A-Z]{1}" value="<?=$this->alumno->dni?>">
            </div>
            <!-- Fecha Nacimiento -->
            <div class="mb-3">
                <label class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fechaNac" value="<?=$this->alumno->fechaNac?>">
            </div>
            <!-- Curso -->
            <div class="mb-3">
                <label class="form-label">Curso</label>
                <select class="form-select" aria-label="Default select example" name="id_curso">
                    <option selected disabled>Selecciona un curso:</option>
                    <?php foreach ($this->cursos as $curso): ?>
                        <option value="<?= $curso->id ?>"
                        <?=($this->alumno->id_curso===$curso->id)?'selected':null?>>
                            <?= $curso->curso ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>



            <div class="mb-3">
                <a class="btn btn-secondary" href="<?=URL?>alumno" role="button">Cancelar</a>
                <button type="reset" class="btn btn-danger">Restaurar</button>
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