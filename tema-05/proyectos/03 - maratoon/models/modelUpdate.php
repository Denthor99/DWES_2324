<?php
    /**
     * Modelo update.php
     * Actualiza un registro en la base de datos
     */

     // Captamos el id mediante el metodo GET
     $idActualizar = $_GET['id'];

     // Asignamos a unas variables los valores del formulario enviados a traves del método POST
     $nombre = $_POST['nombre'];
     $apellidos = $_POST['apellidos'];
     $ciudad = $_POST['ciudad'];
     $sexo = $_POST['sexo'];
     $fechaNacimiento = $_POST['fechaNacimiento'];
     $email = $_POST['email'];
     $dni = $_POST['dni'];
     $categoria = $_POST['id_categoria'];
     $club = $_POST['id_club'];

    // Creamos un objeto de la clase Corredor
    $corredor = new Corredor();
    
    // Añadimos al nuevo objeto los datos del formulario
    $corredor->nombre = $nombre;
    $corredor->apellidos = $apellidos;
    $corredor->ciudad = $ciudad;
    $corredor->sexo = $sexo;
    $corredor->fechaNacimiento = $fechaNacimiento;
    $corredor->email = $email;
    $corredor->dni = $dni;
    $corredor->id_categoria = $categoria;
    $corredor->id_club = $club;

    // Conectamos a la base de datos
    $conexion = new Corredores();
    // Ejecutamos el query para actualizar el registro
    $conexion->update($idActualizar,$corredor);
?>