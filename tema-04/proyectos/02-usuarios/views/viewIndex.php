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
        <?php include 'partials/menu.php' ?>

        <!-- Pie de documento -->
        <?php include 'partials/footer.html' ?>

        <!-- Añadimos la notificación -->
        <?php include 'partials/notificacion.php'?>

        <!-- Añadimos una tabla con los artículos -->
        <table class="table">
            <!-- Mostremos el nombre de las columnas, para nuestra comodidad y personalizción introduciremos lo datos manualmente -->
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Categorias</th>
                    <th scope="col" class="text-end">Unidades</th>
                    <th scope="col" class="text-end">Precio</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <!-- Mostraremos el contenido de cada artículo -->
            <tbody>
                <?php foreach ($articulos->getTabla() as $indice => $articulo): ?>
                    <tr>
                        <th>
                            <?= $articulo->getId() ?>
                        </th>
                        <td>
                            <?= $articulo->getDescripcion() ?>
                        </td>
                        <td>
                            <?= $articulo->getModelo() ?>
                        </td>
                        <td>
                            <?= $marcas[$articulo->getMarca()] ?>
                        </td>
                        <td>
                            <?=implode(', ', ArrayArticulos::mostrarCategorias($categorias,$articulo->getCategorias())) ?>
                        </td>
                        <td class="text-end">
                            <?= $articulo->getUnidades() ?>
                        </td>
                        <td class="text-end">
                            <?= number_format($articulo->getPrecio(), 2, ',', '.') ?> €
                        </td>
                        <td>
                            <!-- Botón eliminar -->
                            <a href="eliminar.php?indice=<?= $indice ?>" title="Eliminar">
                                <i class="bi bi-trash-fill"></i>
                            </a>

                            <!-- Botón editar -->
                            <a href="editar.php?indice=<?= $indice ?>" title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <!-- Botón mostrar -->
                            <a href="mostrar.php?indice=<?=$indice?>" title="Mostrar">
                                <i class="bi bi-tv"></i>
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
            <!-- En el pie de la tabla, mostraremos el número de artículos mostrados -->
            <tfoot>
                <tr>
                    <td colspan="7"><b>Nº de Articulos=
                            <?= count($articulos->getTabla()) ?>
                        </b></td>
                </tr>
            </tfoot>
        </table>

    </div>


    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>