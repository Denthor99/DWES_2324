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
        <legend>Formulario Añadir Artículo</legend>

        <!-- Añadimos el menú -->
        <?php include 'partials/menu.php' ?>

       
         <!-- Formulario Nuevo Artículo -->
         <form>
             <!-- id -->
             <div class="mb-3">
                <label class="form-label">id</label>
                <input type="text" class="form-control" value="<?=$articulo->getId()?>"disabled>
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- descripción -->
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" class="form-control" value="<?=$articulo->getDescripcion()?>"disabled>
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- Modelo -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Modelo</label>
                <input type="text" class="form-control" value="<?=$articulo->getModelo()?>"disabled>
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>
             <!-- Marca -->
             <div class="mb-3">
                <label for="titulo" class="form-label">Marca</label>
                <input type="text" class="form-control" value="<?=$marcas[$articulo->getMarca()]?>"disabled>
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>
            <!-- Categoría -->
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <input type="text" class="form-control" value="<?=implode(', ',ArrayArticulos::mostrarCategorias($categorias,$articulo->getCategorias()))?>"disabled>
            </div>
            <!-- Unidades -->
            <div class="mb-3">
                <label class="form-label">Unidades</label>
                <input type="number" class="form-control" value="<?=$articulo->getUnidades()?>"disabled>
                <!-- <div class="form-text">Género del libro</div> -->
            </div>
            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio (€)</label>
                <input type="number" class="form-control" value="<?=$articulo->getPrecio()?>"disabled>
                <!-- <div class="form-text">Introduzca Precio</div> -->
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