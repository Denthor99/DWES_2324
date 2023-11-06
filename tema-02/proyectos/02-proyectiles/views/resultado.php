<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto 2.2 - Calculo de Proyectiles</title>
    <!-- css bootstrap 532-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Iconos bootstrap 532 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

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
        <footer class="footer mt-auto py-3 fixed-bottom bg-light">
            <div class="container">
                <span class="text-muted">@ 2023 
                    Daniel Alfonso Rodríguez - DWES - 2º DAW - Curso 23/24
                </span>
            </div>
        </footer>
    </div>


    <!-- js bootstrap 532-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>