<?php

class usuariosModel extends Model
{
    public function getUsuarios()
    {
        try {
            $sql = "SELECT * from users";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($sql);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
            return $pdostmt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function getRoles()
    {
        try {
            $sql = "SELECT * from roles";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($sql);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
            return $pdostmt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function getRolUsuario($idUser)
    {
        try {
            $sql = "SELECT roles.id, roles.name
                        FROM roles
                        INNER JOIN roles_users ON roles.id = roles_users.role_id
                        INNER JOIN users ON roles_users.user_id = users.id
                        WHERE users.id = :idUser";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($sql);
            $pdostmt->bindParam(':id', $idUser, PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
            return $pdostmt->fetch();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }
}