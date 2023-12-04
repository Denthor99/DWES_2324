<?php
    /*
        Modelo: modelCreate.php
        Descripción: Cargaremos los datos del formulario nuevo y los introducimos en la BBDD fp

        Método POST 
            - nombre = $_POST['nombre'];
            - apellidos = $_POST['apellidos'];
            - email = $_POST['mail'];
            - telefono = $_POST['telefono'];
            - direccion = $_POST['direccion'];
            - poblacion = $_POST['poblacion'];
            - provincia = $_POST['provincia'];
            - nacionalidad = $_POST['nacionalidad'];
            - DNI = $_POST['dni'];
            - fechaNacimiento = $_POST['fechaNacimiento'];
            - curso
    */


    // Recogemos los datos del formulario
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
    $curso = $_POST['id_curso'];

    // Creamos un objeto de la clase alumno
    $alumno = new Alumno();

    $alumno->nombre=$nombre;
    $alumno->apellidos=$apellidos;
    $alumno->email=$email;
    $alumno->telefono=$telefono;
    $alumno->direccion=$direccion;
    $alumno->poblacion=$poblacion;
    $alumno->provincia=$provincia;
    $alumno->nacionalidad=$nacionalidad;
    $alumno->dni=$DNI;
    $alumno->fecha_nacimiento=$fechaNacimiento;
    $alumno->id_curso=$curso;

    // Creamos la conexión a la base de datos
    $conexion= new Alumnos();

    // Añadimo el nuevo registro
    $conexion->insertarAlumno($alumno);

    // Generamos una notificación
    // $notificacion = "Alumno añadido con éxito";
?>