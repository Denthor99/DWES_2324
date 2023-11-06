<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3.3 - Bucles while, do while y for</title>
    <!-- css bootstrap 532-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Iconos bootstrap 532 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-table"></i>
            <span class="fs-4">Actividad 3.3.1 - Mostrar los números del 1 al 100 en una tabla</span>
        </header>
        <legend>Resultado del enunciado</legend>

        <div class="mb-3">
            <table class="table table-primary">
                    <?php
                    // Inicializamos la variable $i.
                    $i = 0;

                    // Abrimos las filas.
                    echo "<tr>";
                    while ($i < 100) {
                        $i++;
                        if ($i % 10 == 0) { // Si el valor de $i es divisor de 10 (en número maximo de celdas por filas), se cerrará esa fila y empezará la siguiente.
                            echo "<td>$i</td>";
                            echo "</tr>";
                        } else {
                            echo "<td>$i</td>";
                        }
                    } ?>

            </table>

        </div>


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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>