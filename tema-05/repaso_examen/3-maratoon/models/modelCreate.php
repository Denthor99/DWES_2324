<?php
    /**
     * Modelo create.php
     * Enviamos a la baase de datos un nuevo corredor
     */

     // Capturamos los valores enviados por el formulario (método POST)
     $nombre = $_POST['nombre'];
     $apellidos = $_POST['apellidos'];
     $ciudad = $_POST['ciudad'];
     $sexo = $_POST['sexo'];
     $fechaNac = $_POST['fechaNacimiento'];
     $email = $_POST['email'];
     $dni = $_POST['dni'];
     $categoria = $_POST['id_categoria'];
     $club = $_POST['id_club'];

     // Creamos un objeto de la clase Corredor
     $corredor = new Corredor();

     // Añadimos el valor de las variables a los atributos
     $corredor->nombre = $nombre;
     $corredor->apellidos = $apellidos;
     $corredor->ciudad = $ciudad;
     $corredor->sexo = $sexo;
     $corredor->fechaNacimiento = $fechaNac;
     $corredor->email = $email;
     $corredor->dni = $dni;
     $corredor->id_categoria = $categoria;
     $corredor->id_club = $club;

     // Creamos la conexión a la base de datos
     $conexion = new Corredores();

     // 
     $conexion->create($corredor);
?>