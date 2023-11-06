<?php
// Es un ejemplo, esta estructura no se usa, ya que estamos ligando php con html en vez de embeberlo directamente en html
$nombre = "Daniel Alfonso";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 03 - Tema 2</title>
</head>

<body>
    <center>
        <h2>Ejemplo 3 - Tema 2</h2>
    </center>
    <h3>
        <?php
        echo "Hola mundo";
        echo "<br>";
        echo "Soy $nombre";
        echo 'Soy ' . $nombre; // Texto delimitado con comillas dobles: respeta el valor de la variable | Texto delimitado con comillas simples: no se sustituye la variable con su valor
        // Usamos el . para concatenar
        ?>
    </h3>
</body>
</html>