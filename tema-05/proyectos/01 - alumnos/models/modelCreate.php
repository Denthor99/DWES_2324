<?php
    /*
        Modelo: modelCreate.php
        Descripción: Cargaremos los datos del formulario nuevo y los introducimos en la BBDD fp

        Método POST 
            - id
            - descripcion
            - modelo
            - marca - indice
            - categorias (valor númerico) - array
            - unidades
            - precio
    */


     // Creamos la conexión a la base de datos
     $db= new Fp();

    // Recogemos los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['mail'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $poblacion = $_POST['poblacion'];
    $provincia = $_POST['provincia'];
    $nacionalidad = $_POST['nacionalidad'];
    $DNI = $_POST['dni'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $curso = $_POST['curso'];


    // Añadimo el nuevo registro
    $db->insertarAlumno($id,$nombre,$apellidos,$email,$telefono,$direccion,$poblacion,$provincia,$nacionalidad,$DNI,$fechaNacimiento,$curso);

    // Generamos una notificación
    $notificacion = "Alumno añadido con éxito";

    // Obtenemos los cursos
    $cursos = $db->getCursos();

    // Obtenemos todos los datos
    $alumnos = $db->getAlumnos();

?>