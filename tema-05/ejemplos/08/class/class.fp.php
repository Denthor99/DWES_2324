<?php
    /*
        Clase Fp

        Metodos especificos para BBDD fp con las tablas
    */

    class Fp extends Conexion{
        public function insertarCurso(Curso $curso){
            try {
                // Prepare o plantilla SQL
                $sql = "INSERT INTO Cursos(
                    nombre,
                    ciclo,
                    nombreCorto,
                    nivel) VALUES (
                        :nombre,
                        :ciclo,
                        :nombreCorto,
                        :nivel
                        )";
                
                // Objeto de clase PDOStatement
                $pdostmt = $this->pdo->prepare($sql);

                // Vinculacion de parametros y valores
                $pdostmt->bindParam(':nombre',$curso->nombre,PDO::PARAM_STR,50);
                $pdostmt->bindParam(':ciclo',$curso->nombre,PDO::PARAM_STR,50);
                $pdostmt->bindParam(':nombreCorto',$curso->nombre,PDO::PARAM_STR,4);
                $pdostmt->bindParam(':nivel',$curso->nombre,PDO::PARAM_INT,1);

                // Ejecutamos el sql
                $pdostmt->execute();

                // cerramos conexion
                $this->pdo = null;

            } catch (PDOException $e) {
                include 'views/partials/errorDB.php';
                exit();
            }
        }
    }

?>