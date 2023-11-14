<?php
    /*
        Conexión localhost con usuario root a la BBDD fp
        127.0.0.1:3306

        - Conexión mediante la clase mysqli
        - Array objetos de la clase Alumno
        Las propiedades de la clase mysqli aparecen en 'https://www.php.net/manual/es/class.mysqli'
    */

    $servidor = 'localhost';
    $user = 'root';
    $password = '';
    $bd = 'fp';

    // Conexión
    $conexion= new mysqli($servidor,$user,$password,$bd);

    // Manejo de errores
    if($conexion->connect_errno){
        echo 'Error de conexión Nº: '. $conexion->connect_errno;
        echo "<br>";
        echo 'Error en la conexión'. $conexion->connect_error;
        exit(); 
    } else {
        echo 'Conexión establecida con éxito';
    }

    // Creamos variable para la ejecución de comando SQL
    $sql = 'select * from alumnos order by id';

    // Al estar tratando con un objeto mysqli, la sintaxis para ejecutar una consulta es la siguiente
    $result = $conexion->query($sql);

    // Comprobamos el número de registros y columnas que tiene la tabla
    echo "<br>";
    echo 'Número de registros: ' . $result->num_rows;
    echo '<br>';
    echo 'Número de columnas: ' . $result->field_count;
    echo '<br>';

    /*
        Con fetch_object convertimos el array asociativo en objetos de una clase
        Para ver el contenido de todos los objetos deberemos usar un iterador como while
    */
    while($alumnos = $result->fetch_object()){
        echo 'Nombre: '. $alumnos->nombre;
        echo '<br>';
        echo 'Apellidos: '. $alumnos->apellidos;
        echo '<br>'; 
        echo '<hr>';
    }


   
?>