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
            <i class="bi bi-view-stacked"></i>
            <span class="fs-4"> Actividad 3.3.3 - Formularios semanales</span>
        </header>
        <legend>Resultado del enunciado</legend>

        <form method="POST">
            <div class="mb-3">
                <?php

                // Array con los días de la semana en castellano
                $diasSemana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

                // Bucle for que iterará hasta el día de la semana actual. Como uso un array para las fechas, uso el "<" ya que
                // la función me devolverá valores del 1 al 7, y el valor de $i saldría del array.
                // Además, he optado por usar la estructura for alternativa que me permite usar elementos HTML.
                // En los elementos HTML de tipo INPUT, empleo la función strtolower() para que los nombres sean en minusculas.

                for ($i = 0; $i < date('N'); $i++):
                    $diaSemana = $diasSemana[$i];?>
                    <label><?= $diaSemana ?></label>
                    <input type="text" name="<?= strtolower($diaSemana) ?>" placeholder="" class="form-control">
                    <br>
                <?php endfor; ?>
            </div>
            <div class="mb-3">
                <button type="reset" class="btn btn-primary">Borrar</button>
                <button type="submit" class="btn btn-secondary">Enviar</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>