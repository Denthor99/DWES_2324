<?php

/*
    alumnoModel.php

    Modelo del  controlador alumnos

    Definir los métodos de acceso a la base de datos
    
    - insert
    - update
    - select
    - delete
    - etc..
*/

class albumModel extends Model
{

    /*
        Extrae los detalles  de los alumnos
    */
    public function get()
    {

        try {

            # comando sql
            $sql = "
                SELECT 
                   *
                FROM
                    albumes
                ORDER BY 
                    id
                ";

            # conectamos con la base de datos

            // $this->db es un objeto de la clase database
            // ejecuto el método connect de esa clase

            $conexion = $this->db->connect();

            # ejecutamos mediante prepare
            $pdost = $conexion->prepare($sql);

            # establecemos  tipo fetch
            $pdost->setFetchMode(PDO::FETCH_OBJ);

            #  ejecutamos 
            $pdost->execute();

            # devuelvo objeto pdostatement
            return $pdost;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }


    public function create(classAlbum $album)
    {
        try {
            $sql = "
                        INSERT INTO albumes (
                            titulo,
                            descripcion,
                            autor,
                            fecha,
                            lugar,
                            categoria,
                            etiquetas,
                            carpeta,
                            created_at
                        )
                        VALUES (
                            :titulo,
                            :descripcion,
                            :autor,
                            :fecha,
                            :lugar,
                            :categoria,
                            :etiquetas,
                            :carpeta,
                            NOW()
                        )
                ";

            // Conectar con la base de datos
            $conexion = $this->db->connect();

            // Preparamos la consulta
            $pdoSt = $conexion->prepare($sql);

            // Vinculación de los parámetros con los valores del objeto $album
            $pdoSt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 100);
            $pdoSt->bindParam(':descripcion', $album->descripcion, PDO::PARAM_STR);
            $pdoSt->bindParam(':autor', $album->autor, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':fecha', $album->fecha, PDO::PARAM_STR);
            $pdoSt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':etiquetas', $album->etiquetas, PDO::PARAM_STR, 250);
            $pdoSt->bindParam(':carpeta', $album->carpeta, PDO::PARAM_STR, 50);

            // Ejecutamos la consulta
            $pdoSt->execute();

            // Ahora crearemos la carpeta, teniendo en cuenta que vamos a usar la carpeta imagenes
            mkdir('imagenes/'.$album->carpeta);

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    public function read($id)
    {

        try {
            $sql = "
                        SELECT 
                                *
                        FROM 
                                albumes
                        WHERE
                                id = :id
                ";

            # Conectar con la base de datos
            $conexion = $this->db->connect();


            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();

            return $pdoSt->fetch();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    public function update(classAlbum $album, $id, $carpetaOrig)
    {

        try {

            $sql = "
                
                UPDATE albumes
                SET
                        titulo = :titulo,
                        descripcion = :descripcion,
                        autor = :autor,
                        fecha = :fecha,
                        lugar = :lugar,
                        categoria = :categoria,
                        etiquetas = :etiquetas,
                        carpeta = :carpeta
                WHERE
                        id = :id
                LIMIT 1
                ";

            // Conectar con la base de datos
            $conexion = $this->db->connect();

            // Preparamos la consulta
            $pdoSt = $conexion->prepare($sql);

            // Vinculación de los parámetros con los valores del objeto $album
            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);

            $pdoSt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 100);
            $pdoSt->bindParam(':descripcion', $album->descripcion, PDO::PARAM_STR);
            $pdoSt->bindParam(':autor', $album->autor, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':fecha', $album->fecha, PDO::PARAM_STR);
            $pdoSt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':etiquetas', $album->etiquetas, PDO::PARAM_STR, 250);
            $pdoSt->bindParam(':carpeta', $album->carpeta, PDO::PARAM_STR, 50);

            // Cambiamos el nombre de la carpeta
            $rutaOrigen = "imagenes/". $carpetaOrig;
            $rutaDest = "imagenes/".$album->carpeta;
            rename($rutaOrigen,$rutaDest);

            // Ejecutamos la consulta
            $pdoSt->execute();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    /*
       Extrae los detalles  de los alumnos
   */
    public function order(int $criterio)
    {

        try {

            # comando sql
            $sql = "
                SELECT 
                    alumnos.id,
                    concat_ws(', ', alumnos.apellidos, alumnos.nombre) alumno,
                    alumnos.email,
                    alumnos.telefono,
                    alumnos.poblacion,
                    alumnos.dni,
                    timestampdiff(YEAR,  alumnos.fechaNac, NOW() ) edad,
                    cursos.nombreCorto curso
                FROM
                    alumnos
                INNER JOIN
                    cursos
                ON 
                    alumnos.id_curso = cursos.id
                ORDER BY 
                    :criterio
                ";

            # conectamos con la base de datos

            // $this->db es un objeto de la clase database
            // ejecuto el método connect de esa clase

            $conexion = $this->db->connect();

            # ejecutamos mediante prepare
            $pdost = $conexion->prepare($sql);

            $pdost->bindParam(':criterio', $criterio, PDO::PARAM_INT);

            # establecemos  tipo fetch
            $pdost->setFetchMode(PDO::FETCH_OBJ);

            #  ejecutamos 
            $pdost->execute();

            # devuelvo objeto pdostatement
            return $pdost;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function filter($expresion)
    {
        try {
            $sql = "

                SELECT 
                    alumnos.id,
                    concat_ws(', ', alumnos.apellidos, alumnos.nombre) alumno,
                    alumnos.email,
                    alumnos.telefono,
                    alumnos.poblacion,
                    alumnos.dni,
                    timestampdiff(YEAR,  alumnos.fechaNac, NOW() ) edad,
                    cursos.nombreCorto curso
                FROM
                    alumnos
                INNER JOIN
                    cursos
                ON 
                    alumnos.id_curso = cursos.id
                WHERE

                    CONCAT_WS(  ', ', 
                                alumnos.id,
                                alumnos.nombre,
                                alumnos.apellidos,
                                alumnos.email,
                                alumnos.telefono,
                                alumnos.poblacion,
                                alumnos.dni,
                                TIMESTAMPDIFF(YEAR, alumnos.fechaNac, now()),
                                alumnos.fechaNac,
                                cursos.nombreCorto,
                                cursos.nombre) 
                    like :expresion

                ORDER BY 
                    alumnos.id
                
                ";

            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $pdost = $conexion->prepare($sql);

            $pdost->bindValue(':expresion', '%' . $expresion . '%', PDO::PARAM_STR);
            $pdost->setFetchMode(PDO::FETCH_OBJ);
            $pdost->execute();
            return $pdost;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }

    }
  
    public function delete($id)
    {
        try {

            $sql = "DELETE FROM alumnos WHERE id = :id limit 1";
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);
            $pdost->bindParam(':id', $id, PDO::PARAM_INT);
            $pdost->execute();

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function validateFecha($fecha){
        if (date('Y-m-d', strtotime($fecha)) == $fecha) {
            return true;
        } else {
            return false;
        }
    }


}

?>