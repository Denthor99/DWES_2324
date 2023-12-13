<?php
/**
 * Clase Corredores
 * 
 * Clase con métodos para trabajar con la base de datos
 */
class Corredores extends Conexion
{

    /**
     * getCorredores()
     * Devolvemos todos los corredores de la tabla Corredores
     */
    public function getCorredores()
    {
        try {
            // Creamos la sentencia
            $sql = "SELECT 
                corredores.id,
                CONCAT_WS(', ',
                        corredores.apellidos,
                        corredores.nombre) AS nombre,
                corredores.ciudad,
                corredores.email,
                corredores.dni,
                TIMESTAMPDIFF(YEAR,
                    corredores.fechaNacimiento,
                    NOW()) AS edad,
                categorias.nombrecorto AS categoria,
                clubs.nombreCorto AS club
            FROM
                maratoon.corredores
                    INNER JOIN
                maratoon.categorias ON categorias.id = corredores.id_categoria
                    INNER JOIN
                maratoon.clubs ON clubs.id = corredores.id_club
            ORDER BY id";

            // Preparamos la consulta
            $pdostmt = $this->pdo->prepare($sql);

            // Escogemos el tipo de fetch a utilizar
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecutamos la consulta
            $pdostmt->execute();

            // Devolvemos un objeto de la clase PDOStatement
            return $pdostmt;
        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }
    /**
     * getCategorias()
     * Devolvemos todas las categorias
     */
    public function getCategorias()
    {
        try {
            // Creamos la sentencia
            $sql = "SELECT 
            categorias.id, categorias.nombrecorto as nombre
        FROM
            maratoon.categorias
        ORDER BY id;";

            // Preparamos la consulta
            $pdostmt = $this->pdo->prepare($sql);

            // Escogemos el tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecutamos la consulta
            $pdostmt->execute();

            // Devolvemos un objeto de la clase PDOStatement
            return $pdostmt;
        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }

    /**
     * getClubs()
     * Devolvemos todos los clubs
     */
    public function getClubs()
    {
        try {
            // Creamos la sentencia
            $sql = "SELECT 
            clubs.id, clubs.nombreCorto as nombre
        FROM
            maratoon.clubs
        ORDER BY clubs.id;";

            // Preparamos la consulta
            $pdostmt = $this->pdo->prepare($sql);

            // Escogemos el tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecutamos la consulta
            $pdostmt->execute();

            // Devolvemos un objeto de la clase PDOStatement
            return $pdostmt;
        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }

    /**
     * create(Corredor $corredor)
     * Insertamos un corredor en la base de datos
     */
    public function create(Corredor $corredor)
    {
        try {
            // Creamos la consulta
            $sql = "INSERT INTO maratoon.corredores (nombre,apellidos,
                ciudad,fechaNacimiento,sexo,email
                ,dni,id_categoria,id_club) VALUES (:nombre,:apellidos,:ciudad,:fechaNacimiento,:sexo,:email,:dni,:id_categoria,:id_club)";
            
            // Preparamos la consulta
            $pdostmt = $this->pdo->prepare($sql);

            // Vamos a enlazar las variables
            $pdostmt->bindParam(':nombre',$corredor->nombre,PDO::PARAM_STR,30);
            $pdostmt->bindParam(':apellidos',$corredor->apellidos,PDO::PARAM_STR,50);
            $pdostmt->bindParam(':ciudad',$corredor->ciudad,PDO::PARAM_STR,30);
            $pdostmt->bindParam(':fechaNacimiento',$corredor->fechaNacimiento);
            $pdostmt->bindParam(':sexo',$corredor->sexo);
            $pdostmt->bindParam(':email',$corredor->email,PDO::PARAM_STR,50);
            $pdostmt->bindParam(':dni',$corredor->dni,PDO::PARAM_STR,9);
            $pdostmt->bindParam(':id_categoria',$corredor->id_categoria,PDO::PARAM_INT);
            $pdostmt->bindParam(':id_club',$corredor->id_club,PDO::PARAM_INT);

            // Ejecutamos la consulta
            $pdostmt->execute();

            // Liberamos la ejecución
            $pdostmt = null;

            // Liberamos la conexion
            $this->pdo = null;

        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }

    /**
     * read(id)
     * Devuelve un registro de la tabla corredores a raíz de un id
     */
    public function read(int $id){
        try {
            // Creamos una consulta
            $sql = "SELECT * FROM maratoon.corredores
            WHERE corredores.id = :id LIMIT 1";

            // Preparamos la consulta
            $pdostmt = $this->pdo->prepare($sql);

            // Vinculamos la variable
            $pdostmt->bindParam(":id",$id, PDO::PARAM_INT);

            // Elegimos el tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecutamos la consulta
            $pdostmt->execute();

            // Devolvemos el resultado
            return $pdostmt->fetch();

        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }

    /**
     * update(int $id, Corredor $corredor)
     * Actualizamos los datos de un corredor
     */

     public function update(int $id, Corredor $corredor){
        try {
            // Creamos la consulta
            $sql = "UPDATE maratoon.corredores SET 
            nombre=:nombre, 
            apellidos=:apellidos, 
            ciudad=:ciudad, 
            fechaNacimiento=:fechaNacimiento, 
            sexo=:sexo,
            email=:email,
            dni=:dni,
            id_categoria=:id_categoria,
            id_club=:id_club
            WHERE id = :id";

            // Preparamos la consulta
            $pdostmt = $this->pdo->prepare($sql);

            // Vinculamos variables
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdostmt->bindParam(':nombre',$corredor->nombre,PDO::PARAM_STR,30);
            $pdostmt->bindParam(':apellidos',$corredor->apellidos,PDO::PARAM_STR,50);
            $pdostmt->bindParam(':ciudad',$corredor->ciudad,PDO::PARAM_STR,30);
            $pdostmt->bindParam(':fechaNacimiento',$corredor->fechaNacimiento);
            $pdostmt->bindParam(':sexo',$corredor->sexo);
            $pdostmt->bindParam(':email',$corredor->email,PDO::PARAM_STR,50);
            $pdostmt->bindParam(':dni',$corredor->dni,PDO::PARAM_STR,9);
            $pdostmt->bindParam(':id_categoria',$corredor->id_categoria,PDO::PARAM_INT);
            $pdostmt->bindParam(':id_club',$corredor->id_club,PDO::PARAM_INT);

            // Ejecutamos la consulta
            $pdostmt->execute();

            // Liberamos recurso
            $pdostmt = null;

            // Liberamos la conexión
            $this->pdo = null;
        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
     }

     /**
      *  delete($id)
      * Eliminar un corredor
      */
      public function delete(int $id){
        try {
            // Creamos la primera consulta
            $sql = "DELETE FROM maratoon.registros WHERE id_corredor = :id";

            // Crearemos la segunda consulta
            $sql2 = "DELETE FROM maratoon.corredores WHERE corredores.id = :id";

            // Preparamos ambas consultas
            $pdostmt1 = $this->pdo->prepare($sql);
            $pdostmt2 = $this->pdo->prepare($sql2);

            // Enlazamos la variable
            $pdostmt1->bindParam(":id", $id);
            $pdostmt2->bindParam(":id", $id);

            // Ejecutamos ambas sentencias
            $pdostmt1->execute();
            $pdostmt2->execute();

            // Liberamos recursos
            $pdostmt1 = NULL;
            $pdostmt2 = NULL;

            // Cerramos la conexion
            $this->pdo = NULL;
        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
      }

    /**
     * order(int $criterio)
     * Devolvemos el resultado de una consulta, ordenandola según el criterio especificado
     */
    public function order(int $criterio)
    {
        try {
            $sql = "SELECT 
                corredores.id,
                CONCAT_WS(', ',corredores.apellidos, corredores.nombre) as nombre,
                corredores.ciudad,
                corredores.email,
                TIMESTAMPDIFF(YEAR,
                    corredores.fechaNacimiento,
                    NOW()) AS edad,
                categorias.nombrecorto AS categoria,
                clubs.nombreCorto AS club
            FROM
                maratoon.corredores
                    INNER JOIN
                maratoon.categorias ON categorias.id = corredores.id_categoria
                    INNER JOIN
                maratoon.clubs ON clubs.id = corredores.id_club
            ORDER BY :order ASC";

            // Preparo la consulta
            $pdostmt = $this->pdo->prepare($sql);

            // Vinculamos la variable
            $pdostmt->bindParam(':order', $criterio, PDO::PARAM_INT);

            // Elegimos el tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecuto la consulta
            $pdostmt->execute();

            // Devolvemos el objeto de tipo PDOStatement
            return $pdostmt;

        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }
    /**
     * filter($expresion)
     * Devolvemos un conjunto de registros, que coincidan con una expresion
     */
    public function filter($expresion)
    {
        try {
            // Creamos la sentencia
            $sql = "SELECT 
            corredores.id,
            CONCAT_WS(', ',
                    corredores.apellidos,
                    corredores.nombre) AS nombre,
            corredores.ciudad,
            corredores.email,
            corredores.dni,
            TIMESTAMPDIFF(YEAR,
                corredores.fechaNacimiento,
                NOW()) AS edad,
            categorias.nombrecorto AS categoria,
            clubs.nombreCorto AS club
        FROM
            maratoon.corredores
                INNER JOIN
            maratoon.categorias ON categorias.id = corredores.id_categoria
                INNER JOIN
            maratoon.clubs ON clubs.id = corredores.id_club
        WHERE
            CONCAT_WS('',
                    corredores.id,
                    corredores.apellidos,
                    corredores.nombre,
                    corredores.ciudad,
                    corredores.email,
                    corredores.dni,
                    TIMESTAMPDIFF(YEAR,
                        corredores.fechaNacimiento,
                        NOW()),
                    categorias.nombrecorto,
                    clubs.nombreCorto) LIKE :expresion
        ORDER BY id";

            // Preparamos la consulta
            $pdostmt = $this->pdo->prepare($sql);

            // Hacemos una modificación al argumento pasado
            $expresion = "%" . $expresion . "%";

            // Vinculamos variable
            $pdostmt->bindParam(':expresion', $expresion);

            // Establecer el tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecutamos la sentencia
            $pdostmt->execute();

            // Devolvemos el resultado
            return $pdostmt;
        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }
}
?>