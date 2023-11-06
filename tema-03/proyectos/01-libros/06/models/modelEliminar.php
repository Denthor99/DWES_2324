<?php
/*
        Modelo: modelEliminar.php
        Descripción: eliminar un elemento de la tabla. El proceso de eliminar se hace aquí

        Método GET:
            - id del libro que quiero eliminar
    */

    // Extraemos el valor del id a través del metodo get
    $id = $_GET['id'];
    
    // El problema de buscar el primer valor (1) es que entiende que se trata de 0, por lo que sería false
    $indice_eliminar = buscar_en_tabla($libros,'id',$id);
    // Comparación estricta para distinguir el false de 0
    if ($indice_eliminar !==false){
        // Elimino el libro seleccionado
        unset($libros[$indice_eliminar]);
        // Reconstruye el array quitando huecos
        $libros = array_values($libros);
    } else{
        echo 'ERROR: Libro no encontrado';
        exit();
    }


?>