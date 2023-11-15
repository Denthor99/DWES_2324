<?php
    /*
        
        Clase: fp

        Métodos necesarios para la gestión de la BBDD fp.
        En este caso sólo los métodos pertenecientes a la tabla Alumnos
    */
    Class Fp extends Conexion{
        /*
            getAlumnos()

            Devuelve un objeto conjunto resultados (mysqli_result)
            con los detalles de todos los alumnos
        */
        public function getAlumnos(){
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

        $result = $this->db->query($sql);
        return $result;
        }
    }
?>