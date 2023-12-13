<?php
    /**
     * Clase conexión
     * 
     */
    class Conexion{
        protected $pdo;
        // constructor
        public function __construct() {
            try {
                $dsn = "mysql:localhost=" . SERVER . ";dbname=".DB;
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT => false,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ". CHARSET ." COLLATE ". COLLECTION
                ];
                $this->pdo = new PDO($dsn, USER, PASS, $options);
            } catch (PDOException $e) {
                include 'views/partials/errorDB.php';
                exit();
            }
        }

        // Función para cerrar la conexión
        public function cerrarConexion(){
            $this->pdo = null;
        }
    }
?>