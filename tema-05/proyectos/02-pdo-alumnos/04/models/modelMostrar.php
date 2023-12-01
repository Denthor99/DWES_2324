<?php
    /* 
        Modelo: modelMostrar.php
        Descripción: muestra los detalles de un artículo

        Método GET:
            - id del artículo que quiero mostrar
    */

    $id = $_GET['id'];

    // Creamos una conexion
    $conexion = new Alumnos();

    // Cargamos los cursos
    $cursos = $conexion->getCursos();

    // Cargamos los datos del alumno según su id
    $alumno = $conexion->readAlumno($id);

    // foreach, donde enviaremos el valor al viewMostrar
    // Al ser objetos
    foreach($cursos as $curso){
        if ($curso->id === $alumno->id_curso){
            $alumnoCurso = $curso->nombre;
            break;
        }
    
    }

?>