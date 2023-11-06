<?php
/*
        Modelo: modelMostrar.php
        Descripción: muestra los detalles del libro

        Método GET:
            - id del libro que quiero mostrar
    */

    // cargamos la tabla
    $libros = generar_tabla();
    // Extraemos el valor del id a través del metodo get
    $id = $_GET['id'];
    
    // El problema de buscar el primer valor (1) es que entiende que se trata de 0, por lo que sería false
    $indice_mostrar = buscar_en_tabla($libros,'id',$id);
    // Comparación estricta para distinguir el false de 0
    if ($indice_mostrar !==false){
        // Obtengo el array del libro
        $libro = $libros[$indice_mostrar];
    } else{
        echo 'ERROR: Libro no encontrado';
        exit();
    }


?>