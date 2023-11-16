<?php
    /* 
        Modelo: modelMostrar.php
        Descripción: muestra los detalles de un alumno

        Método GET:
            - id del alumno que quiero mostrar
    */

     // Cargamos los valores correspondientes
     $cursos = ArrayAlumnos::getCursos();
     $asignaturas = ArrayAlumnos::getAsignaturas();
 
     # Creamos un objeto de la clase ArrayArticulos
     $alumnos = new ArrayAlumnos();
 
     // Cargamos los datos
     $alumnos->getAlumnos();
 
     // Extraemos el id
     $indice = $_GET['indice'];
 
     // cargamos los detallas del artículo a partir del indice (dentro de un objeto de la clase artículo)
     $alumno = $alumnos->read($indice);
?>