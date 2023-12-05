<?php
    /**
     * Clase corredores
     * Hereda de la clase conexión, y cuenta con los métodos necesarios para la resolución de los diferentes enunciados del ejercicio
     * 
     */
    class Corredores extends Conexion{
        public function getCorredores(){
            try {
                $sql = "SELECT 
            corredores.id,
            corredores.nombre,
            corredores.apellidos,
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

        $pdostmt = $this->pdo->prepare($sql);

        $pdostmt->setFetchMode(PDO::FETCH_OBJ);
        $pdostmt->execute();
        return $pdostmt;
            } catch (PDOException $e) {
                include '../views/partials/errorDB.php';
                exit();
            }
            
        }
    }
?>