<!DOCTYPE html>
<html lang="es">
<?php include 'views/layouts/head.html';?>
<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera -->
        <?php include 'views/partials/header.php';?>

        <!-- Titulo -->
        <legend>Panel de control - Corredores</legend>

        <!-- Menu de navegacion -->
        <?php include 'views/partials/menu.php'; ?>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Ciudad</th>
                    <th>Email</th>
                    <th>Edad</th>
                    <th>Categoría</th>
                    <th>Club</th>
                    <th>Acciones</th>
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
                            <a href="eliminar.php?id=<?=$corredor->id?>" title="Eliminar">
                            <i class="bi bi-trash-fill"></i>
                            </a>
                            <!-- Botón editar -->
                            <a href="editar.php?id=<?=$corredor->id?>" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                            </a>
                            <!-- Botón mostrar -->
                            <a href="mostrar.php?id=<?=$corredor->id?>" title="Mostrar">
                            <i class="bi bi-tv"></i>
                            </a>
                        </td> 
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">
                        <strong>Numero de corredores= <?=$corredores->rowCount()?></strong> 
                    </td>
                </tr>
            </tfoot>
        </table>
        <!-- Cerramos la conexion -->
        <?php $corredores = null;$conexion->cerrarConexion()?>
        <br>
        <br>
        <br>
        <!-- Pie de documento -->
        <?php include 'views/partials/footer.php';?>
    </div>


    <?php include 'views/layouts/javascript.html';?>
</body>
</html>