<!DOCTYPE html>
<html lang="es">
<!-- Cargamos el head del archivo HTML -->
<?php include 'views/layouts/head.html'?>
<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Añadimos la cabecera -->
        <?php include 'views/partials/header.php'?>

        <!-- Añadimos el menú -->
        <?php include 'views/partials/menu.php'?>

        <!-- Creamos la tabla -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Club</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($corredores as $corredor):?>
                    <tr>
                        <th><?=$corredor->id?></th>
                        <td><?=$corredor->nombre?></td>
                        <td><?=$corredor->ciudad?></td>
                        <td><?=$corredor->email?></td>
                        <td><?=$corredor->edad?></td>
                        <td><?=$corredor->categoria?></td>
                        <td><?=$corredor->club?></td>
                        <td>
                            <!-- Botón eliminar -->
                            <a href="eliminar.php?id=<?=$corredor->id?>">
                            <i class="bi bi-trash3"></i>
                            </a>

                            <!-- Botón editar -->
                            <a href="editar.php?id=<?=$corredor->id?>">
                            <i class="bi bi-pencil-square"></i>
                            </a>

                            <!-- Botón mostrar -->
                            <a href="mostrar.php?id=<?=$corredor->id?>">
                            <i class="bi bi-tv"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="7">
                        Número de corredores: <?=$corredores->rowCount()?>
                    </th>
                </tr>
            </tfoot>        
        </table>
        <br>
        <br>
        <br>
        <!-- Cerramos la conexion -->
        <?php $corredores = null; $conexion->cerrarConexion()?>
        <!-- Añadimos el footer -->
        <?php include 'views/partials/footer.php' ?>
    </div>


    <!-- Incluimos el script JS -->
    <?php include 'views/layouts/javascript.html'?>
</body>
</html>