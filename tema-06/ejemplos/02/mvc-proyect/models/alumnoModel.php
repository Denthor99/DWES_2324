<?php

    /**
     * 
     *  alumnoModel.php
     * 
     * Modelo del controlador alumnos
     * Definimos los métodos de acceso a la base de datos
     *  - Insert
     *  - Update
     *  - Select
     *  - Delete
     *  - etc...
     */
    class alumnoModel extends Model{
        /**
         * Extrae los detalles de los alumnos
         */
        public function get(){
            try {
                // Creamos la consulta
                $sql = "SELECT * FROM fp.alumnos";

                // Conectamos con la base de datos
                // $this->db es un objeto de la clase database
                // Ejecutamos el  método connecto de esa clase
                $conexion = $this->db->connect();

                // Preparamos la consulta
                $pdostmt = $conexion->prepare($sql);

                // Establecemos el tipo de fetch
                $pdostmt->setFetchMode(PDO::FETCH_OBJ);

                // Ejecutamos la consulta
                $pdostmt->execute();

                // Devolvemos el objeto de tipo PDOStatement
                return $pdostmt;
            } catch (PDOException $e) {
                include 'template/partials/errorDB.php';
                exit();
            }
        }
    }
?>