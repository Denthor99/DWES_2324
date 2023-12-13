<!DOCTYPE html>
<html lang="es">
<!-- Cargamos el head del archivo HTML -->
<?php include 'views/layouts/head.html' ?>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Añadimos la cabecera -->
        <?php include 'views/partials/header.php' ?>

        <legend>Formulario Editar Corredor</legend>

        <!-- Creamos el formulario -->
        <form action="update.php?id=<?=$idCorredor?>" method="POST">
            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre: </label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?=$corredor->nombre?>" required>
            </div>
            <!-- Apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos: </label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" value="<?=$corredor->apellidos?>" required>
            </div>
            <!-- Ciudad -->
            <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad: </label>
                <input type="text" name="ciudad" id="ciudad" class="form-control" value="<?=$corredor->ciudad?>" required>
            </div>
            <!-- Sexo -->
            <div class="mb-3">
                <label for="" class="form-label">Sexo</label>
                <div class="form-control">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexo" id="inlineRadio1" value="H" <?=($corredor->sexo === 'H')?'checked':null?>>
                        <label class="form-check-label" for="inlineRadio1">Hombre</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2" value="M" <?=($corredor->sexo === 'M')?'checked':null?>>
                        <label class="form-check-label" for="inlineRadio2">Mujer</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexo" id="inlineRadio3" value="" <?=($corredor->sexo === '')?'checked':null?>>
                        <label class="form-check-label" for="inlineRadio3">Sin Especificar</label>
                    </div>
                </div>
            </div>    
            <!-- Fecha de nacimiento -->
            <div class="mb-3">
                <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" value="<?=$corredor->fechaNacimiento?>" required>
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email: </label>
                <input type="email" name="email" id="email" class="form-control" value="<?=$corredor->email?>" required>
            </div>
            <!-- dni -->
            <div class="mb-3">
                <label for="dni" class="form-label">DNI/NIE/Pasaporte: </label>
                <input type="text" name="dni" id="dni" class="form-control" pattern="[0-9]{8}[A-Z]{1}" value="<?=$corredor->dni?>" required>              
            </div>

            <!-- Categorias -->
            <div class="mb-3">
                <label for="" class="form-label">Categoria</label>
                <select class="form-select" name="id_categoria">
                    <option selected disabled>Selecciona una categoria</option>
                    <?php foreach($categorias AS $categoria):?>
                        <option value="<?=$categoria->id?>"
                        <?=($corredor->id_categoria === $categoria->id)?'selected':null?>>
                        <?=$categoria->nombre?>
                        </option>
                    <?php endforeach;?>
                </select>
            </div>
            <!-- Clubs -->
            <div class="mb-3">
                <label for="" class="form-label">Club</label>
                <select class="form-select" name="id_club">
                    <option selected disabled>Selecciona un club</option>
                    <?php foreach($clubs AS $club):?>
                        <option value="<?=$club->id?>"
                        <?=($corredor->id_club === $club->id)?'selected':null?>>
                        <?=$club->nombre?>
                        </option>
                    <?php endforeach;?>
                </select>
            </div>
            <!-- Botones -->
            <div class="mb-3">
                <a role="button" href="index.php" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar corredor</button>
            </div>
        </form>
        <br>
        <br>
        <br>
        <!-- Cerramos la conexion -->
        <?php $corredores = null;
        $conexion->cerrarConexion() ?>
        <!-- Añadimos el footer -->
        <?php include 'views/partials/footer.php' ?>
    </div>


    <!-- Incluimos el script JS -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>