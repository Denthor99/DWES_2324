<?php
/*
    
    Clase: fp

    Métodos necesarios para la gestión de la BBDD fp.
    En este caso sólo los métodos pertenecientes a la tabla Alumnos
*/
class Fp extends Conexion
{
    /*
        getAlumnos()

        Devuelve un objeto conjunto resultados (mysqli_result)
        con los detalles de todos los alumnos
    */
    public function getAlumnos()
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
            cursos.nombreCorto AS curso
        FROM
            fp.alumnos
                INNER JOIN
            cursos ON alumnos.id_curso = cursos.id
        ORDER BY id";

        // Ejecutamos directamente SQL (no es optima a nivel de seguridad)
        // $consulta = $this->db->query($sql);
        // $result = $consulta->fetch_all(MYSQLI_ASSOC);

        // Mediante Prepare
        $stmt = $this->db->prepare($sql);

        // Ejecutamos
        $stmt->execute();

        // Objeto de la clase mysqli_result
        $result = $stmt->get_result();
        return $result;
    }

    /*
        getCursos()

        Devuelve un objeto conjunto resultados (mysqli_result)
        con todos los cursos
    */
    public function getCursos()
    {
        $sql = "SELECT 
            cursos.id,
            cursos.nombreCorto
        FROM
            fp.cursos
        ORDER BY id";

        // $consulta = $this->db->query($sql);
        // $result = $consulta->fetch_all(MYSQLI_ASSOC);

        // Mediante Prepare
        $stmt = $this->db->prepare($sql);

        // Ejecutamos
        $stmt->execute();

        // Objeto de la clase mysqli_result
        $result = $stmt->get_result();
        return $result;
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
        // Preparar la consulta SQL de inserción con marcadores de posición
        $sql = "INSERT INTO fp.alumnos VALUES (null,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Crear una sentencia preparada
        $stmt = $this->db->prepare($sql);

        // Vincular los parámetros
        $stmt->bind_param("sssissssssi", 
            $alumno->nombre, 
            $alumno->apellidos, 
            $alumno->email, 
            $alumno->telefono, 
            $alumno->direccion, 
            $alumno->poblacion, 
            $alumno->provincia, 
            $alumno->nacionalidad, 
            $alumno->dni, 
            $alumno->fecha_nacimiento, 
            $alumno->id_curso);

        // Ejecutar la sentencia preparada
        $stmt->execute();

        // Cerrar la sentencia preparada
        $stmt->close();
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