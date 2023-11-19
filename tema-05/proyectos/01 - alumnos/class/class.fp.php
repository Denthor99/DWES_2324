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
            cursos.nombre AS curso
        FROM
            fp.alumnos
                INNER JOIN
            cursos ON alumnos.id_curso = cursos.id
        ORDER BY id";


        $consulta = $this->db->query($sql);
        $result = $consulta->fetch_all(MYSQLI_ASSOC);
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
            cursos.nombre
        FROM
            fp.cursos
        ORDER BY id";

        $consulta = $this->db->query($sql);
        $result = $consulta->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    /*
        insertarAlumno()

        Insertar un registro en la base de datos fp
    */
    public function insertarAlumno($id,$nombre,$apellidos,$email,$telefono,$direccion,$poblacion,$provincia,$nacionalidad,$dni,$fechaNacimiento,$curso){
        // Preparar la consulta SQL de inserción con marcadores de posición
        $sql = "INSERT INTO fp.alumnos (id, nombre, apellidos, email, telefono, direccion, poblacion, provincia, nacionalidad, dni, fechaNac, id_curso) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Crear una sentencia preparada
        $stmt = $this->db->prepare($sql);

        // Vincular los parámetros
        $stmt->bind_param("isssissssssi", $id, $nombre, $apellidos, $email, $telefono, $direccion, $poblacion, $provincia, $nacionalidad, $dni, $fechaNacimiento, $curso);

        // Ejecutar la sentencia preparada
        $stmt->execute();

        // Cerrar la sentencia preparada
        $stmt->close();
    }
}
?>