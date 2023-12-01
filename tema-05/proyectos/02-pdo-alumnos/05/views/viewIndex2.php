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
        <legend>Tabla Alumnos</legend>

        <!-- Añadimos el menú -->
        <?php include 'partials/menu.php' ?>

        <!-- Pie de documento -->
        <?php include 'partials/footer.html' ?>

        <!-- Añadimos la notificación -->
        <?php include 'partials/notify.php'?>

        <!-- Añadimos una tabla con los artículos -->
        <table class="table">
            <!-- Mostremos el nombre de las columnas, para nuestra comodidad y personalizción introduciremos lo datos manualmente -->
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Poblacion</th>
                    <th scope="col">DNI</th>
                    <th scope="col" class="text-end">Edad</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <!-- Mostraremos el contenido de cada artículo -->
            <tbody>
                <?php while($alumno = $alumnos->fetch()) : ?>
                    <tr>
                        <th>
                            <?= $alumno->id ?>
                        </th>
                        <td>
                            <?= $alumno->nombre ?>
                        </td>
                        <td>
                            <?= $alumno->email ?>
                        </td>
                        <td>
                            <?= $alumno->telefono ?>
                        </td>
                        <td>
                            <?=$alumno->poblacion?>
                        </td>
                        <td>
                            <?= $alumno->dni ?>
                        </td>
                        <td class="text-end">
                            <?= $alumno->edad ?>
                        </td>
                        <td>
                            <?= $alumno->curso ?>
                        </td>
                        <td>
                            <!-- Botón eliminar -->
                            <a href="eliminar.php?indice=<?= $alumno->id ?>" title="Eliminar">
                                <i class="bi bi-trash-fill"></i>
                            </a>

                            <!-- Botón editar -->
                            <a href="editar.php?indice=<?= $alumno->id ?>" title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <!-- Botón mostrar -->
                            <a href="mostrar.php?indice=<?=$alumno->id?>" title="Mostrar">
                                <i class="bi bi-tv"></i>
                            </a>
                        </td>

                    </tr>
                <?php endwhile; ?>
            </tbody>
            <!-- En el pie de la tabla, mostraremos el número de artículos mostrados -->
            <tfoot>
                <tr>
                    <td colspan="7"><b>Nº de Articulos=
                            <?= $alumnos->rowCount()?>
                        </b></td>
                </tr>
            </tfoot>
        </table>
        <!-- Cerramos conexion -->
        <?php $alumnos = null; $conexion->cerrarConexion(); ?>
        <br>
        <br>
        <br>

    </div>


    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>