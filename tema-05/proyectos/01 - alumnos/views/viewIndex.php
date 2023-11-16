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
        <legend>Alumnos del IES Nra. Señora de los Remedios</legend>

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
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Poblacion</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <!-- Mostraremos el contenido de cada artículo -->
            <tbody>
                <?php while($alumnado = mysqli_fetch_assoc($alumnos)) : ?>
                    <tr>
                        <th>
                            <?= $alumnado['id'] ?>
                        </th>
                        <td>
                            <?= $alumnado['nombre'] ?>
                        </td>
                        <td>
                            <?= $alumnado['email'] ?>
                        </td>
                        <td>
                            <?= $alumnado['telefono'] ?>
                        </td>
                        <td>
                            <?=$alumnado['poblacion']?>
                        </td>
                        <td>
                            <?= $alumnado['dni'] ?>
                        </td>
                        <td>
                            <?= $alumnado['edad'] ?>
                        </td>
                        <td>
                            <?= $alumnado['curso'] ?>
                        </td>
                        <td>
                            <!-- Botón eliminar -->
                            <a href="eliminar.php?indice=<?= $alumnado['id'] ?>" title="Eliminar">
                                <i class="bi bi-trash-fill"></i>
                            </a>

                            <!-- Botón editar -->
                            <a href="editar.php?indice=<?= $alumnado['id'] ?>" title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <!-- Botón mostrar -->
                            <a href="mostrar.php?indice=<?=$alumnado['id']?>" title="Mostrar">
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
                            <?= mysqli_num_rows($alumnos) ?>
                        </b></td>
                </tr>
            </tfoot>
        </table>
        <!-- Liberamos recursos -->
        <?=mysqli_free_result($alumnos); ?>
        <br>
        <br>
        <br>

    </div>


    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>