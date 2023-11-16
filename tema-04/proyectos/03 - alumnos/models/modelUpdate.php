<?php
    /*
        Modelo: modelUpdate.php
        Descripción: actualiza los detalle de un alumno

        Método POST 
            - nombre
            - apellidos
            - email
            - fecha de nacimiento
            - curso
            - asignaturas
        
        Método GET
            - indice del alumno
    */
    // Cargamos los valores correspondientes
    $cursos = ArrayAlumnos::getCursos();
    $asignaturas = ArrayAlumnos::getAsignaturas();

    # Creamos un objeto de la clase ArrayAlumnos
    $alumnos = new ArrayAlumnos();

    // Cargamos los datos
    $alumnos->getAlumnos();

    // obtenemos el indice (método GET)
    $indice = $_GET['indice'];

   // Recogemos los datos del formulario (método POST)
   $id = $_POST['id'];
   $nombre = $_POST['nombre'];
   $apellidos = $_POST['apellidos'];
   $email = $_POST['email'];
   $fechaNac = $_POST['fecha_nacimiento'];
   $fechaNac = date('d/m/Y', strtotime($fechaNac));
   $curso_alumno = $_POST['curso'];
   $asignaturas_alumno = $_POST['asignaturas'];


// Creamos un objeto de alumno
    $alumno=new Alumno(
        $id,
        $nombre,
        $apellidos,
        $email,
        $fechaNac,
        $curso_alumno,
        $asignaturas_alumno
    );
    // Añadimos el objeto alumno actualizado
    $alumnos->update($indice,$alumno);

    // Añadimos el mensaje que se mostrará al modificar el alumno
    $notificacion = "Datos del alumno modificados satisfactoriamente";
?>