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

        <!-- Pie de documento -->
        <?php include 'partials/footer.html' ?>

        <!-- Añadimos una tabla con los artículos -->
        <table class="table">
            <!-- Mostremos el nombre de las columnas, para nuestra comodidad y personalizción introduciremos lo datos manualmente -->
            <thead>
                <tr>
                    <th scope="col">id</th>
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
                <?php foreach ($articulos as $articulo): ?>
                    <tr>
                        <th>
                            <?= $articulo['id'] ?>
                        </th>
                        <td>
                            <?= $articulo['descripcion'] ?>
                        </td>
                        <td>
                            <?= $articulo['modelo'] ?>
                        </td>
                        <td>
                            <?= $marcas[$articulo['marca']] ?>
                        </td>
                        <td>
                            <?= implode(', ', mostrarCategorias($categorias,$articulo['categorias'])) ?>
                        </td>
                        <td class="text-end">
                            <?= $articulo['unidades'] ?>
                        </td>
                        <td class="text-end">
                            <?= number_format($articulo['precio'], 2, ',', '.') ?> €
                        </td>
                        <td>
                            <!-- Botón eliminar -->
                            <a href="eliminar.php?id=<?= $articulo['id'] ?>" title="Eliminar">
                                <i class="bi bi-trash-fill"></i>
                            </a>

                            <!-- Botón editar -->
                            <a href="editar.php?id=<?= $articulo['id'] ?>" title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <!-- Botón mostrar -->
                            <a href="mostrar.php?id=<?=$articulo['id']?>" title="Mostrar">
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
                            <?= count($articulos) ?>
                        </b></td>
                </tr>
            </tfoot>
        </table>

    </div>


    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>