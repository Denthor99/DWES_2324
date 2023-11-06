<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <h1>Ejercicio 6 - Tabla de Variables</h1>
    <table border="10%" cellspacing="2">
            <td><b>Nombre</b></td>
            <td><?= $nombre; ?></td>
        </tr>
        <tr>
            <td><b>Apellidos</b></td>
            <td><?= $apellidos; ?></td>
        </tr>
        <tr>
            <td><b>Población</b></td>
            <td><?= $poblacion; ?></td>
        </tr>
        <tr>
            <td><b>Edad</b></td>
            <td><?= $edad; ?></td>
        </tr>
        <tr>
            <td><b>Ciclo</b></td>
            <td><?= $ciclo; ?></td>
        </tr>
        <tr>
            <td><b>Curso</b></td>
            <td><?= $curso; ?></td>
        </tr>
        <tr>
            <td><b>Módulo</b></td>
            <td><?= $modulo; ?></td>
        </tr>
    </table>
</body>
</html>