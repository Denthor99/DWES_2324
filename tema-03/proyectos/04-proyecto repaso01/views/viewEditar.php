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
        <legend>Tabla con Artículos Informáticos</legend>

        <!-- Añadimos el menú -->
        <?php include 'partials/menuPrincipal.php' ?>
        <br>
        <br>

        <!-- Pie de documento -->
        <?php include 'partials/footer.html' ?>

        <!-- Añadimos un formulario -->
        <form action="update.php?id=<?= $idArticulo ?>" method="POST">
            <div class="mb-3">
                <label class="form-label">id</label>
                <input type="text" class="form-control" name="descripcion" value="<?=$articulo['id']?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="<?=$articulo['descripcion']?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo" value="<?=$articulo['modelo']?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Marca</label>
                <select class="form-select" name="marca">
                    <option selected disabled>Seleccione una marca</option>
                    <?php foreach ($marcas as $clave => $marca): ?>
                        <option value="<?= $clave ?>"
                        <?=($articulo['marca'] == $clave)?'selected':null ?>>
                            <?= $marca ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Unidades</label>
                <input type="text" class="form-control" name="unidades" value="<?=$articulo['unidades']?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="text" class="form-control" name="precio" value="<?=$articulo['precio']?>">
            </div>
            <div class="mb-3">
                <label class="form-check-label">Seleccionar categorías</label>
                <div class="form-control">
                    <?php foreach ($categorias as $clave => $categoria): ?>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="<?= $clave ?>" name="categorias[]" 
                            <?=in_array($clave,$articulo['categorias'])?'checked':null ?>>
                            <label class="form-check-label">
                                <?= $categoria ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <a role="button" class="btn btn-secondary" href="index.php">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
    <br>
    <br>
    <br>

    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>