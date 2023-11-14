<?php
    /*
        Conexión localhost con usuario root a la BBDD fp
        127.0.0.1:3306

        - Conexión mediante la clase mysqli
        - Retorna un array multidimensional asociativo
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
        Con la constante MYSQLI_BOTH indicamos la forma en la que extraeremos los datos
        en este caso, mediante un array asociativo
    */
    $alumnos = $result->fetch_all(MYSQLI_BOTH);

    $alumno = $alumnos[0];

    var_dump($alumno);

   
?>