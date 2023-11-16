<?php
    /*
        Modelo: modelCreate.php
        Descripción: Cargaremos los datos del formulario nuevo y los introducimos al array original de alumnos

        Método POST 
            - id
            - nombre
            - apellidos
            - email
            - fecha de nacimiento
            - curso
            - asignaturas
        
        El id será generado de forma automatica por la función ultimoId()
    */


    // Carga de cursos y asignaturas
    $cursos = ArrayAlumnos::getCursos();
    $asignaturas = ArrayAlumnos::getAsignaturas();

    // Cargamos el array de objetos con alumnos
    $alumnos = new ArrayAlumnos();
    $alumnos->getAlumnos();

    // Recogemos los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $fechaNac = $_POST['fecha_nacimiento'];
    $fechaNac = date('d/m/Y', strtotime($fechaNac));
    $curso_alumno = $_POST['curso'];
    $asignaturas_alumno = $_POST['asignaturas'];


    // Creamos un objeto alumno, donde introduciremos en el constructor los datos captados anteriomente en variables
    $alumno = new Alumno($id,$nombre,$apellidos,$email,$fechaNac,$curso_alumno,$asignaturas_alumno);

    // Añadimos el nuevo alumno (objeto) usando la funcion create
    $alumnos->create($alumno);

    // Generamos una notificación
    $notificacion = "Alumno nuevo añadido con éxito";

?>