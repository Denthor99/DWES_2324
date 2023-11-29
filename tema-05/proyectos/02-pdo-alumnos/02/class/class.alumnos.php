<?php

class Alumnos extends Conexion{

    /*
        getAlumnos()
        Devuelve un objeto de tipo pdostatement
        A diferencia de mysqli, PDO no tiene un objeto de tipo result
    */
public function getAlumnos(){
    try {
        $sql = "SELECT 
    alumnos.id,
    CONCAT_WS(', ', alumnos.apellidos, alumnos.nombre) AS nombre,
    alumnos.email,
    alumnos.telefono,
    alumnos.poblacion,
    alumnos.dni,
    TIMESTAMPDIFF(YEAR,
        alumnos.fechaNac,
        NOW()) AS edad,
    cursos.nombreCorto AS curso
FROM
    fp.alumnos
        INNER JOIN
    cursos ON alumnos.id_curso = cursos.id
ORDER BY id";

    // Prepare->objeto clase pdostatement
    $pdostmt = $this->pdo->prepare($sql);

    // Establecemos el tipo de fetch
    $pdostmt -> setFetchMode(PDO::FETCH_OBJ);
    // Ejecutamos la consulta y obtenemos los resultados
    $pdostmt->execute();
    // Devolvemos el objeto clase pdostatement
    return $pdostmt;

    } catch (PDOException $e) {
        include '../views/partials/errorDB.php';
        exit();
    }
    
}
/*
        getCursos()

        Devuelve un objeto de la clase PDOStatement
    */
    public function getCursos()
    {
        try {
            $sql = "SELECT 
            cursos.id,
            cursos.nombreCorto AS nombre
        FROM
            fp.cursos
        ORDER BY id";

        // Mediante Prepare
        $pdostmt = $this->pdo->prepare($sql);

        // Establecemos el tipo de fetch
        $pdostmt->setFetchMode(PDO::FETCH_OBJ);
        
        // Ejecutamos
        $pdostmt->execute();

        // Devolvemos el objeto de la clase PDOStatement
        return $pdostmt;
        } catch (PDOException $e) {
            include '../views/partials/errorDB.php';
            exit();
        }
        
    }

    /*
        getAlumno($indice)
        Devuelve un objeto conjunto resultados con los datos de un alumno.
        Se pásara el indice como parametro
    */
    public function getAlumno($indice)
    {
        $sql = "SELECT 
        alumnos.id,
        CONCAT_WS(', ', alumnos.apellidos, alumnos.nombre) AS nombre,
        alumnos.email,
        alumnos.telefono,
        alumnos.poblacion,
        alumnos.dni,
        TIMESTAMPDIFF(YEAR,
            alumnos.fechaNac,
            NOW()) AS edad,
        cursos.nombre AS curso
    FROM
        fp.alumnos
            INNER JOIN
        cursos ON alumnos.id_curso = cursos.id
    WHERE alumnos.id = $indice";
        // Mediante Prepare
        $stmt = $this->db->prepare($sql);

        // Ejecutamos
        $stmt->execute();

        // Objeto de la clase mysqli_result
        $result = $stmt->get_result();
        return $result;
    }

    /*
        insertarAlumno()

        Insertar un registro en la base de datos fp
    */
    public function insertarAlumno(Alumno $alumno)
    {
        try {
            // Preparar la consulta SQL de inserción con marcadores de posición
        $sql = "INSERT INTO fp.alumnos VALUES (null,:nombre, :apellidos, :email, :telefono, :direccion, :poblacion, :provincia, :nacionalidad, :dni, :fechaNac, :id_curso)";

        // Crear una sentencia preparada
        $pdostmt = $this->pdo->prepare($sql);

        // Vincular los parámetros
        $pdostmt->bindParam(':nombre',$alumno->nombre,PDO::PARAM_STR,30);
        $pdostmt->bindParam(':apellidos',$alumno->apellidos,PDO::PARAM_STR,50);
        $pdostmt->bindParam(':email',$alumno->email,PDO::PARAM_STR,50);
        $pdostmt->bindParam(':telefono',$alumno->telefono,PDO::PARAM_STR,9);
        $pdostmt->bindParam(':direccion',$alumno->direccion,PDO::PARAM_STR,50);
        $pdostmt->bindParam(':poblacion',$alumno->poblacion,PDO::PARAM_STR,30);
        $pdostmt->bindParam(':provincia',$alumno->provincia,PDO::PARAM_STR,30);
        $pdostmt->bindParam(':nacionalidad',$alumno->nacionalidad,PDO::PARAM_STR,30);
        $pdostmt->bindParam(':dni',$alumno->dni,PDO::PARAM_STR,9);
        $pdostmt->bindParam(':fechaNac',$alumno->fecha_nacimiento);
        $pdostmt->bindParam(':id_curso',$alumno->id_curso,PDO::PARAM_INT);

        // Ejecutar la sentencia preparada
        $pdostmt->execute();

        // Libero Memoria
        $pdostmt=null;

        // Cerramos la conexion
        $this->pdo=null;
        } catch (PDOException $e) {
            include '../views/partials/errorDB.php';
            exit();
        }
        
    }

    /*
        deleteAlumno($indice)
    */
    public function deleteAlumno($indice){
        $sql=" DELETE FROM fp.alumnos WHERE alumnos.id = $indice";

        // Creamos una sentencia preparada
        $stmt = $this->db->prepare($sql);
        // Ejecutamos la sentencia preparada
        $stmt->execute();

        // Cerramos la sentencia preparada
        $stmt->close();
    }
}
?>