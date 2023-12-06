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
        <legend>Formulario Editar Corredor</legend>

        <!-- El menú no es necesario-->

        <!-- Formulario Nuevo Alumno -->
        <form action="update.php?id=<?=$id?>" method="POST">
            <!-- id (no se deberá ni mostrar, ni estar oculto-->

            <!-- Nombre -->
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?=$corredor->nombre?>">
            </div>
            <!-- Apellidos -->
            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?=$corredor->apellidos?>">
            </div>
            <!-- ciudad -->
            <div class="mb-3">
                <label class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" value="<?=$corredor->ciudad?>">
            </div>
            <!-- Sexo -->
            <div class="mb-3">
                <label class="form-label">Sexo</label>
                <div class="form-control">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo"
                        value="H" <?=($corredor->sexo === 'H')?'checked':null?>>
                    <label class="form-check-label">Hombre</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo"
                        value="M" <?=($corredor->sexo === 'M')?'checked':null?>>
                    <label class="form-check-label">Mujer</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo"
                        value="" <?=($corredor->sexo === '')?'checked':null?>>
                    <label class="form-check-label">Sin Especificar</label>
                </div>
                </div>
                
            </div>
            <!-- Fecha de Nacimiento -->
            <div class="mb-3">
                <label class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fechaNacimiento" value="<?=$corredor->fechaNacimiento?>">
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" name="email" value="<?=$corredor->email?>">
            </div>

            <!-- DNI -->
            <div class="mb-3">
                <label class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" pattern="[0-9]{8}[A-Z]{1}" value="<?=$corredor->dni?>">
            </div>
            <!-- Categorias -->
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <select class="form-select" aria-label="Default select example" name="id_categoria">
                <option selected disabled>Selecciona una categoria</option>
                <?php foreach($categorias as $categoria):?>
                    <option value="<?=$categoria->id?>"
                    <?=($corredor->id_categoria === $categoria->id)?'selected':null?>>
                    <?=$categoria->categoria?>
                    </option>    
                <?php endforeach; ?>
                </select>
            </div>

            <!-- Clubs -->
            <div class="mb-3">
                <label class="form-label">Club</label>
                <select class="form-select" aria-label="Default select example" name="id_club">
                <option selected disabled>Selecciona una club</option>
                <?php foreach($clubs as $club):?>
                    <option value="<?=$club->id?>"
                    <?=($corredor->id_club === $club->id)?'selected':null?>>
                    <?=$club->club?>
                    </option>    
                <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
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