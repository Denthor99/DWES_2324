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
        <form>
            <div class="mb-3">
                <label class="form-label">id</label>
                <input type="text" class="form-control" value="<?= $articulo['id'] ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" class="form-control" value="<?= $articulo['descripcion'] ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Modelo</label>
                <input type="text" class="form-control" value="<?= $articulo['modelo'] ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Marca</label>
                <input type="text" class="form-control" value="<?= $marcas[$articulo['marca']] ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Unidades</label>
                <input type="text" class="form-control" value="<?= $articulo['unidades'] ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="text" class="form-control" value="<?= $articulo['precio'] ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Categorias</label>
                <input type="text" class="form-control" value="<?= implode(', ',mostrarCategorias($categorias,$articulo['categorias'])) ?>" disabled>
            </div>
            <a role="button" class="btn btn-secondary" href="index.php">Volver</a>
        </form>
    </div>
    <br>
    <br>
    <br>

    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>