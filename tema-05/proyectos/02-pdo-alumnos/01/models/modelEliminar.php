<?php
    /*
        Modelo: modelEliminar.php
        Descripción: eliminar un elemento de la tabla

        Método GET:
            - id del artículo que quiero eliminar
    */

    // cargamos las tablas
    $db = new Fp;

    // Extraemos el id a través del método get
    $id = $_GET['indice'];

    $db->deleteAlumno($id);

    
    // Alumnos
    $alumnos = $db->getAlumnos();

    // Notificacion
    $notificacion="Alumno eliminado con éxito";
?>