<?php
/**
 * Clase corredores
 * Hereda de la clase conexión, y cuenta con los métodos necesarios para la resolución de los diferentes enunciados del ejercicio
 * 
 */
class Corredores extends Conexion
{
    /**
     * Método getCorredores
     * Devuelve una serie de registros de la base de datos. Cada registro representa a un corredor
     */
    public function getCorredores()
    {
        try {
            // Creamos la sentencia
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
        ORDER BY id";

            // Preparamos la consulta
            $pdostmt = $this->pdo->prepare($sql);

            // Seleccionamos el tipo de "fetch" a usar
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecutamos dicha consulta
            $pdostmt->execute();

            // Devolvemos un objeto de la clase PDOStatement
            return $pdostmt;

        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }

    }
    /**
     * Método getCategorias()
     * Devuelve todas las categorias. Usada en múltiples modelos
     */
    public function getCategorias()
    {
        try {
            // Creamos la consulta
            $sql = "SELECT 
                categorias.id,
                categorias.nombrecorto AS categoria 
                FROM 
                maratoon.categorias";

            // Preparamos la consulta
            $pdostmt = $this->pdo->prepare($sql);

            // Seleccionamos el tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecutamos la consulta
            $pdostmt->execute();

            // Devolvemos un objeto de tipo PDOStatement
            return $pdostmt;
        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }

    /**
     * Método getClubs()
     * Devuelve todos los clubs. Usada en múltiples modelos
     */
    public function getClubs()
    {
        try {
            // Creamos la consulta
            $sql = "SELECT 
                clubs.id,
                clubs.nombreCorto AS club
                FROM 
                maratoon.clubs";

            // Preparamos la consulta
            $pdostmt = $this->pdo->prepare($sql);

            // Seleccionamos el tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecutamos la consulta
            $pdostmt->execute();

            // Devolvemos un objeto de tipo PDOStatement
            return $pdostmt;
        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }

    /**
     * Método insertarCorredor(Corredor $corredor)
     * Inserta en la base de datos un registro nuevo
     */
    public function insertarCorredor(Corredor $corredor)
    {
        try {
            // Creamos la consulta
            $sql = "INSERT INTO maratoon.corredores (
                    nombre,
                    apellidos,
                    ciudad,
                    fechaNacimiento,
                    sexo,
                    email,
                    dni,
                    id_categoria,
                    id_club
                ) VALUES(
                    :nombre,
                    :apellidos,
                    :ciudad,
                    :fechaNacimiento,
                    :sexo,
                    :email,
                    :dni,
                    :id_categoria,
                    :id_club)";

            // Preparamos la consulta
            $pdostmt = $this->pdo->prepare($sql);

            // Vinculamos los parametros
            $pdostmt->bindParam(':nombre', $corredor->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':apellidos', $corredor->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':ciudad', $corredor->ciudad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':fechaNacimiento', $corredor->fechaNacimiento);
            $pdostmt->bindParam(':sexo', $corredor->sexo);
            $pdostmt->bindParam(':email', $corredor->email, PDO::PARAM_STR, 128);
            $pdostmt->bindParam(':dni', $corredor->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':id_categoria', $corredor->id_categoria, PDO::PARAM_INT);
            $pdostmt->bindParam(':id_club', $corredor->id_club, PDO::PARAM_INT);

            // Ejecutar la sentencia preparada
            $pdostmt->execute();

            // Libero Memoria
            $pdostmt = null;

            // Cerramos la conexion
            $this->pdo = null;
        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }

    /**
     * Método update($id, Corredor $corredor)
     * Actualiza un corredor en la base de datos, usando el id para referenciar a ese registro en concreto
     */
    public function update($id, Corredor $corredor){
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
            WHERE id= :id";
            
            // Preparamos la consulta
            $pdostmt = $this->pdo->prepare($sql);

           // Vinculamos los parametros
           $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);
           $pdostmt->bindParam(':nombre', $corredor->nombre, PDO::PARAM_STR, 30);
           $pdostmt->bindParam(':apellidos', $corredor->apellidos, PDO::PARAM_STR, 50);
           $pdostmt->bindParam(':ciudad', $corredor->ciudad, PDO::PARAM_STR, 30);
           $pdostmt->bindParam(':fechaNacimiento', $corredor->fechaNacimiento);
           $pdostmt->bindParam(':sexo', $corredor->sexo);
           $pdostmt->bindParam(':email', $corredor->email, PDO::PARAM_STR, 128);
           $pdostmt->bindParam(':dni', $corredor->dni, PDO::PARAM_STR, 9);
           $pdostmt->bindParam(':id_categoria', $corredor->id_categoria, PDO::PARAM_INT);
           $pdostmt->bindParam(':id_club', $corredor->id_club, PDO::PARAM_INT);
           // Ejecutamos la sentencia preparada
           $pdostmt->execute();
           // Libero Memoria
           $pdostmt = null;
           // Cerramos la conexion
           $this->pdo = null;
        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }

    /** 
     * Método read($id)
     * Devuelve una consulta con los datos de un corredor, a tráves de su id
    */
    public function read($id){
        try {
            // Creamos la consulta
            $sql = "SELECT * 
            FROM maratoon.corredores
            WHERE corredores.id = :id";
            
            // Preparamos la consulta
            $pdostmt = $this->pdo->prepare($sql);
            
            // Vinculamos el parámetro
            $pdostmt->bindParam(":id",$id, PDO::PARAM_INT);
            
            // Seleccionamos el tipo de fetch a usar
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecutamos la consulta
            $pdostmt -> execute();

            // Devolvemos el resultado
            return $pdostmt->fetch();
            
        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }

    /**
     * Método getCategoria($id)
     * Devuelve el nombre de la categoría, pasandole como parametro el $id del corredor
     */
    public function getCategoria($id){
        try {

            // Creamos la consulta
            $sql ="SELECT 
            categorias.nombrecorto as nombre
            FROM 
            maratoon.corredores
            INNER JOIN
            categorias ON 
            categorias.id = corredores.id_categoria
            WHERE 
            corredores.id = :id";

            // Preparamos la consulta
            $pdostmt = $this->pdo->prepare($sql);
            
            // Vinculamos el parámetro
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Seleccionamos el tipo de fetch a usar
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            
            // Ejecutamos la consulta
            $pdostmt->execute();
            
            // Devolvemos el resultado
            return $pdostmt->fetch();
        
        } catch(PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }

    /**
     * Método getClub($id)
     * Devuelve el nombre del club, pasandole como parametro el $id del corredor
     */
    public function getClub($id){
        try {

            // Creamos la consulta
            $sql ="SELECT 
            clubs.nombrecorto as nombre
            FROM 
            maratoon.corredores
            INNER JOIN
            clubs ON 
            clubs.id = corredores.id_club
            WHERE 
            corredores.id = :id";

            // Preparamos la consulta
            $pdostmt = $this->pdo->prepare($sql);
            
            // Vinculamos el parámetro
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Seleccionamos el tipo de fetch a usar
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            
            // Ejecutamos la consulta
            $pdostmt->execute();
            
            // Devolvemos el resultado
            return $pdostmt->fetch();
        
        } catch(PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }


    /**
     * Método delete($id)
     * Deberemos eliminar, antes del propio corredor, los registros vinculados (si es necesario)
     */
    public function delete($id)
    {
        try {
            // Sentencia eliminación de registros
            $eliminarRegistros = "DELETE FROM 
                maratoon.registros 
                WHERE 
                registros.id_corredor=:id";

            // Preparación de la consulta
            $pdostmtRegistros = $this->pdo->prepare($eliminarRegistros);

            // Vinculamos el parámetro
            $pdostmtRegistros->bindParam(":id", $id, PDO::PARAM_INT);

            // Ejecución de la sentencia
            $pdostmtRegistros->execute();

            // Sentencia eliminación del corredor
            $eliminarCorredor = "DELETE FROM 
                maratoon.corredores 
                WHERE 
                corredores.id = :id";

            // Preparamos la consulta
            $pdostmtCorredor = $this->pdo->prepare($eliminarCorredor);

            // Vinculamos el parámetro
            $pdostmtCorredor->bindParam(":id", $id, PDO::PARAM_INT);

            // Ejecutamos la consulta
            $pdostmtCorredor->execute();

            // Libero memoria
            $pdostmtRegistros = null;
            $pdostmtCorredor = null;

            // Cerramos la conexión a la base de datos
            $this->pdo = null;
        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }

    /**
     * Método order($criterio)
     * Ordenar la vista principal según criterio
     */
    public function order($criterio)
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
            ORDER BY $criterio";

            // Preparo la consulta
            $pdostmt = $this->pdo->prepare($sql);

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
     * Método que nos permite buscar coincidencias en los registros, según expresión
     *  
     */
    public function filter($expresion)
    {
        try {
            // Creamos sentencia
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
            WHERE
            CONCAT_WS('',corredores.apellidos, corredores.nombre,corredores.ciudad,
            corredores.email,TIMESTAMPDIFF(YEAR,corredores.fechaNacimiento,NOW()),
            categorias.nombrecorto,clubs.nombreCorto) LIKE :expresion";
            
            // Modificamos la expresión recibida como parametro
            $expresion = "%".$expresion."%";

            // Preparamos la consulta
            $pdostmt = $this->pdo->prepare($sql);
            
            // Asignamos el valor del parametro
            $pdostmt->bindParam(":expresion",$expresion);
            
            // Establecemos el tipo de fetch a usar
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            
            // Ejecutamos la consulta
            $pdostmt->execute();
            
            // Devolvemos el resultado de la consulta
            return $pdostmt;
        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }
}
?>