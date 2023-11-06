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
            <i class="bi bi-calculator-fill"></i>
            <span class="fs-4">Actividad 3.3.2 - Tabla con las tablas de multiplicar</span>
        </header>
        <legend>Resultado del enunciado</legend>

        <div class="mb-3">
            <table class="table table-primary">
                <?php
                  // Deberemos crear un bucle for, este representará las filas, y otro que representará las columnas.
                  // En el primer bucle abrimos las filas, y cuando salga del segundo bucle las cerramos.
                  // El resultado de la multiplicación de los valores de los indices se almacenará en cada celda.
                  for ($i=1; $i <= 10; $i++) { 
                    echo "<tr>";
                    for ($j = 1; $j <= 10; $j++) { 
                        $celda = $i*$j;
                        echo "<td>$celda</td>";
                    }
                    echo "</tr>";
                  }  
                ?>
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