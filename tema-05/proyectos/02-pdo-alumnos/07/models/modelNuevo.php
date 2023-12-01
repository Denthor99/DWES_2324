<?php
    /*
        Modelo: modelNuevo.php
        Descripción: Cargamos los arrays correspondientes para mostrar los cursos disponibles del centro
    */

    // Creamos la conexión a la base de datos
    $db= new Alumnos();
    
    // Obtenemos los cursos
    $cursos = $db->getCursos();
?>