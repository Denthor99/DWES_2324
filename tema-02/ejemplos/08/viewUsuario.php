<!-- View: viewUsuario.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 09 - Tema 2</title>
</head>

<body>
    <center>
        <h2>Ejemplo 9 - Tema 2</h2>
    </center>
    <table border="1" width="30%">
        <tr>
            <th>Usuario</th>
            <th>Categoría</th>
            <th>Especialidad</th>
        </tr>
        <tr>
            <!-- Usamos el script de abrevación para mostrar el valor de las variables -->
            <td><?= $nombre; ?></td>
            <td><?= $categoria; ?></td>
            <td><?= $especialidad; ?></td>
        </tr>
    </table>
</body>

</html>