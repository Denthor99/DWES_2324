<?php
    /* 
        Modelo: modelMostrar.php
        Descripción: muestra los detalles de un artículo

        Método GET:
            - id del artículo que quiero mostrar
    */

     // Cargamos los valores correspondientes
     $db = new Fp();

    // Recogemos el indice necario a través del método GET
    $indice = $_GET['indice'];

    $consulta = $db->getAlumno($indice);
    $alumno = $consulta->fetch_assoc(); 
?>