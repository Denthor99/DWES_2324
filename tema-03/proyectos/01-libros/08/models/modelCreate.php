<?php
/*
        Modelo: modelCreate.php
        Descripción: añade libro a la tabla

        Método POST
            - id del libro 
            - titulo
            - autor
            - genero
            - precio
    */

    // cargamos la tabla
    $libros = generar_tabla();

    // Extraemos el valor de las distintas variables enviadas por el metodo POST
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];
    $precio = $_POST['precio'];

    // Creamos un array asociativo con los detalles del nuevo libro
    // Podriamos añadir directamente lo anterior en el array directamente, pero no se puede hacer ya que es más seguro
    $libro = [
        'id' => $id,
        'titulo'=> $titulo,
        'autor'=> $autor,
        'genero'=> $genero,
        'precio'=> $precio
    ];

    // Añadimos a la tabla
    array_push($libros, $libro);

    // Otra alternativa a lo anterior
    //$libros[] = $libro;

?>