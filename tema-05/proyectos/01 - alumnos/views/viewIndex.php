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
                    <th scope="col">Apellidos</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Asignaturas</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <!-- Mostraremos el contenido de cada artículo -->
            <tbody>
                <?php foreach ($alumnos->getTabla() as $indice => $alumno): ?>
                    <tr>
                        <th>
                            <?= $alumno->id ?>
                        </th>
                        <td>
                            <?= $alumno->nombre ?>
                        </td>
                        <td>
                            <?= $alumno->apellidos ?>
                        </td>
                        <td>
                            <?= $alumno->email ?>
                        </td>
                        <td>
                            <?=$alumno->getEdad()?>
                        </td>
                        <td>
                            <?= $cursos[$alumno->curso] ?>
                        </td>
                        <td>
                            <?= implode(', ',ArrayAlumnos::mostrarAsignaturas($asignaturas,$alumno->asignaturas)) ?>
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
                            <?= count($alumnos->getTabla()) ?>
                        </b></td>
                </tr>
            </tfoot>
        </table>
        <br>
        <br>
        <br>

    </div>


    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>