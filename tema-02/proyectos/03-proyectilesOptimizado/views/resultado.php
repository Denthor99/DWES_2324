<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Usaremos una plantilla, que será usada para todos los proyectos -->
    <?php include 'plantilla/head.html'?>
    <title>Proyecto 2.2 - Calculo de Proyectiles</title>
</head>
<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-rocket-takeoff-fill"></i>
            <span class="fs-4">Proyecto 2.2 - Calculo de Proyectiles</span>
        </header>
        <legend>Resultado de las operaciones</legend>

        <!-- Por defecto, el metodo es GET -->
        <form method="POST">
            <!-- Diseño de tabla para mostrar los resultados de las operaciones solicitadas -->
            <table class="table">
                <tbody>
                    <tr>
                    <th>Valores Iniciales:</th>
                    </tr>
                    <tr>
                        <td>Velocidad Inicial:</td>
                        <td><?=$valor1?> m/s</td>
                    </tr>
                    <tr>
                        <td>Ángulo Inclinación:</td>
                        <td><?=$valor2?> º</td>
                    </tr>
                </tbody>
            </table>
            <table class="table">
                <tbody>
                    <tr>
                    <th>Resultados:</th>
                    </tr>
                    <tr>
                        <td>Angulo Radianes: </td>
                        <td><?=$radianes?> Radianes</td>
                    </tr>
                    <tr>
                        <td>Velocidad Inicial X:</td>
                        <td><?=$vx?> m/s</td>
                    </tr>
                    <tr>
                        <td>Velocidad Inicial Y:</td>
                        <td><?=$vy?> m/s</td>
                    </tr>
                    <tr>
                        <td>Alcance Máximo del Proyectil: </td>
                        <td><?=$xMax?> m</td>
                    </tr>
                    <tr>
                        <td>Tiempo de Vuelo del proyectil: </td>
                        <td><?=$t?> s</td>
                    </tr>
                    <tr>
                        <td>Altura Máxima del Proyectil: </td>
                        <td><?=$yMax?> m</td>
                    </tr>
                    </tr>
                </tbody>
            </table>

            
            <!-- Botones de acción -->
            <div class="btn-group" role="group">
                <a class="btn btn-primary" href="index.php" role="button">Volver</a>
            </div>
        </form>

        <!-- Pie de documento -->
        <!-- Pie de documento -->
        <?php
            include 'plantilla/footer.html';
        ?>
    </div>


    <!-- js bootstrap 532-->
    <?php
        include 'plantilla/javascript.html';
    ?></body>
</html>