<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
</head>
<body>
    <h1>HOLA</h1>
    <h3>Vista Main de Alumnos</h3>
    <!-- Mostramos los valores almacenados en la vista -->
    <?php foreach($this->alumnos as $alumno):
        var_dump($alumno)?>
    <?php endforeach;?>
</html>