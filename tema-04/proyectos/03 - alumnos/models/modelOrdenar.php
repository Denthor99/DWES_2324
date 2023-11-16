<?php
/*
        Modelo: ordenar.php
        Descripción: muestra los alumnos a partir de un criterio

        Método GET:
            - criterio: nombre, apellidos, email, fecha de nacimiento, curso, asignaturas
    */

     // Cargamos los valores correspondientes
     $cursos = ArrayAlumnos::getCursos();
     $asignaturas = ArrayAlumnos::getAsignaturas();
 
     # Creamos un objeto de la clase ArrayAlumnos
     $alumnos = new ArrayAlumnos();
 
     // Cargamos los datos
     $alumnos->getAlumnos();
     
    // Caargo el criterio de ordenación
    $criterio = $_GET['criterio'];

    // Invocamos la función que se encargará de ordenar el contenido de la vista
    $alumnos->order($criterio);
    
?>