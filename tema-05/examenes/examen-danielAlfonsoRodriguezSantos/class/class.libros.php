    <?php

    /*
        Clase libros 

        Aquí se definirán los métodos necesarios para completar el examen
        
    */
    class Libros extends Conexion{
        /**
         * Método getLibros()
         * Devuelve un objeto pdostatement con los detalles de los libros (tabla libros)
         */
        public function getLibros(){
            try {
                // Creamos la sentencia SQL
                $sql = 'SELECT 
                libros.id,
                libros.titulo,
                autores.nombre AS autor,
                editoriales.nombre AS editorial,
                libros.stock AS unidades,
                libros.precio_coste AS coste,
                libros.precio_venta AS pvp
            FROM
                geslibros.libros
                    INNER JOIN
                autores ON autores.id = libros.autor_id
                    INNER JOIN
                editoriales ON editoriales.id = libros.editorial_id
            ORDER BY id';

                // Preparamos la sentencia
                $pdostmt = $this->pdo->prepare($sql);

                // Escogemos el tipo de fetch a usar, en este caso trabajaremos con objetos
                $pdostmt->setFetchMode(PDO::FETCH_OBJ);

                // Ejecutamos la consulta
                $pdostmt->execute();

                // Devolvemos el resultado (objeto PDOStatement)
                return $pdostmt;
            } catch (PDOException $e) {
                include 'views/partials/partial.errorDB.php';
                exit();
            }
        }

        /**
         * Método getAutores
         * Devolvemos el id y el nombre de los autores. Usado para las listas dinamicas de la vista view.nuevo.php
         */
        public function getAutores(){
            try {
                // Creamos la consulta
                $sql = 'SELECT 
                autores.id, autores.nombre
            FROM
                geslibros.autores
                ORDER BY nombre';

                // Preparamos la sentencia
                $pdostmt = $this->pdo->prepare($sql);

                // Escogemos el tipo de fetch a usar
                $pdostmt->setFetchMode(PDO::FETCH_OBJ);

                // Ejecutamos la sentencia
                $pdostmt->execute();

                // Devolvemos el resultado (objeto PDOStatement)
                return $pdostmt;
            } catch (PDOException $e) {
                include 'views/partials/partial.errorDB.php';
                exit();
            }
        }

        /**
         * Método getEditoriales
         * Devolvemos el id y el nombre de la editoriales. Usado para las listas dinamicas de la vista view.nuevo.php
         */
        public function getEditoriales(){
            try {
                // Creamos la consulta
                $sql = 'SELECT 
                editoriales.id, editoriales.nombre
            FROM
                geslibros.editoriales
                ORDER BY nombre';

                // Preparamos la sentencia
                $pdostmt = $this->pdo->prepare($sql);

                // Escogemos el tipo de fetch a usar
                $pdostmt->setFetchMode(PDO::FETCH_OBJ);

                // Ejecutamos la sentencia
                $pdostmt->execute();

                // Devolvemos el resultado (objeto PDOStatement)
                return $pdostmt;
            } catch (PDOException $e) {
                include 'views/partials/partial.errorDB.php';
                exit();
            }
        }

        /**
         * Método insertarLibro(Libro $libro)
         * Inserta en la base de datos un nuevo libro, a ráiz de un objeto de la clase Libro
         */
        public function insertarLibro(Libro $libro){
            try {
                // Creamos la sentencia
                $sql="INSERT INTO geslibros.libros VALUES(
                    null,
                    :isbn,
                    null,
                    :titulo,
                    :autor_id,
                    :editorial_id,
                    :precio_coste,
                    :precio_venta,
                    :stock,
                    null,
                    null,
                    :fecha_edicion,
                    null,
                    null
                    )";
                
                // Preparamos la sentencia
                $pdostmt = $this->pdo->prepare($sql);

                // Vinculamos las variables
                $pdostmt->bindParam(':isbn',$libro->isbn,PDO::PARAM_STR,13);
                $pdostmt->bindParam(':titulo',$libro->titulo,PDO::PARAM_STR,80);
                $pdostmt->bindParam(':autor_id',$libro->autor_id,PDO::PARAM_INT);
                $pdostmt->bindParam(':editorial_id',$libro->editorial_id,PDO::PARAM_INT);
                $pdostmt->bindParam(':precio_coste',$libro->precio_coste);
                $pdostmt->bindParam(':precio_venta',$libro->precio_venta);
                $pdostmt->bindParam(':stock',$libro->stock,PDO::PARAM_INT,10);
                $pdostmt->bindParam(':fecha_edicion',$libro->fecha_edicion);

                // Ejecutamos la consulta
                $pdostmt->execute();

                // Liberamos los recursos
                $pdostmt = null;

                // Cerramos la conexion
                $this->pdo = null;

            } catch (PDOException $e) {
                include 'views/partials/partial.errorDB.php';
                exit();
            }
        }

        /**
         * Método order(int $criterio)
         * Ordenamos la tabla de la vista principal por alguno de los campos de ella
         */
        public function order(int $criterio){
            try {
                // Creamos la consulta
                $sql = 'SELECT 
                libros.id,
                libros.titulo,
                autores.nombre AS autor,
                editoriales.nombre AS editorial,
                libros.stock AS unidades,
                libros.precio_coste AS coste,
                libros.precio_venta AS pvp
            FROM
                geslibros.libros
                    INNER JOIN
                autores ON autores.id = libros.autor_id
                    INNER JOIN
                editoriales ON editoriales.id = libros.editorial_id
            ORDER BY :order ASC';

            // Preparamos la sentencia
            $pdostmt = $this->pdo->prepare($sql);

            // Vinculamos la variable
            $pdostmt->bindParam(':order',$criterio,PDO::PARAM_INT);

            // Escogemos el tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecutamos la consulta
            $pdostmt->execute();

            // Devolvemos el resultado (Objeto de la clase PDOStatement)
            return $pdostmt;
            } catch (\Throwable $th) {
                include 'views/partials/partial.errorDB.php';
                exit();
            }
        }
    }


?>