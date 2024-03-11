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
            $pdostmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
            return $pdostmt->fetch();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function usuarioUnique($name){
        try {
            $sql = "SELECT * from users where name=:name";
            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($sql);
            $pdostmt->bindParam(':name',$name,PDO::PARAM_STR);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
            if ($pdostmt->rowCount() != 0) {
                return false;
            }
            return true;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function emailUnique($email){
        try {
            $sql = "SELECT * from users where email = :email";
            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($sql);
            $pdostmt->bindParam(':email',$email,PDO::PARAM_STR);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
            if ($pdostmt->rowCount() != 0) {
                return false;
            }
            return true;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function create(classUser $user){
        try {
            // Creamos la consulta SQL
            $sql = "INSERT INTO users VALUES(
                null,
                :name,
                :email,
                :password,
                now(),
                now()
            )";

            // Creamos la conexión a la base de datos
            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($sql);

            // Antes de vincular las variables, deberemos encriptar la contraseña. Usaremos el algoritmo recomendado
            // llamado BCRYPT
            $password = password_hash($user->password, PASSWORD_BCRYPT);

            // Vinculamos las variables
            $pdostmt->bindParam(':name', $user->name, PDO::PARAM_STR,50);
            $pdostmt->bindParam(':email', $user->email, PDO::PARAM_STR,50);
            $pdostmt->bindParam(':password', $password , PDO::PARAM_STR,60);

            // Ejecutamos la consulta
            $pdostmt->execute();

            // Ahora tenemos la problematica de que el id del nuevo usuario se genera en la BD.
            // Además, deberemos introducir en la tabla role_user los roles correspondientes al usuario creado.
            // Para obtenerlo necesitamos hacer uso del método lastInsertId, para obtener el id del último elemento introducido
            $user_id = $conexion->lastInsertId();

            $sql = "INSERT INTO roles_users VALUES(
                null,
                :user_id,
                :rol_id,
                now(),
                now()
            )";

            // Preparamos la nueva consulta
            $pdostmt = $conexion->prepare($sql);

            // Vinculamos las variables
            $pdostmt->bindParam(":user_id",$user_id,PDO::PARAM_INT);
            $pdostmt->bindParam(":rol_id",$user->role_id,PDO::PARAM_INT);

            // Ejecutamos la consulta
            $pdostmt->execute();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function delete(int $id)
    {
        try {
            // Primer registro a eliminar, el usuario
            $sql = "DELETE from users WHERE id = :idUser";
            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($sql);
            $pdostmt->bindParam(":idUser", $id, PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();

            // Segundo registro a eliminar, roles_users
            $sql = "DELETE from roles_users WHERE user_id = :idUser";
            $pdostmt = $conexion->prepare($sql);
            $pdostmt->bindParam(":idUser", $id, PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function order(int $criterio){
        try {
            $sql = "SELECT * from users ORDER BY :criterio";
            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($sql);
            $pdostmt->bindParam(':criterio', $criterio, PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
            return $pdostmt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function filter($expresion){
        try {
            $sql = "SELECT users.id, users.name,
            users.email
        FROM 
            users
        WHERE 
            concat_ws(  ' ',
                        id,
                        name,
                        email
                    )
        LIKE
            :expresion ";

            // Creamos la conexión a la base de datos, y preparamos la consulta
            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($sql);

            $expresion = '%'.$expresion.'%';
            $pdostmt->bindParam(':expresion', $expresion, PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
            return $pdostmt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function getUsuario(int $id){
        try {
            $sql = "SELECT * from users WHERE id = :id";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($sql);
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
            return $pdostmt->fetch();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function update(classUser $usuario)
    {
        try {
            // Creamos la consulta
            $sql = "UPDATE users SET
                    name = :name,
                    email = :email,
                    password = :password,
                    update_at = NOW()
                WHERE
                    id=:id";

            // Creamos la conexión y preparammos la consulta
            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($sql);

            // Vinculamos las variables
            $pdostmt->bindParam(":name", $usuario->name, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(":email", $usuario->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(":password", $usuario->password, PDO::PARAM_STR, 60);
            $pdostmt->bindParam(":id", $usuario->id, PDO::PARAM_INT);

            // Ejecutamos la consulta
            $pdostmt->execute();

            // Creamos una nueva consulta
            $sql = "UPDATE roles_users SET
                    role_id = :role_id,
                    update_at = NOW()
                WHERE
                    user_id = :user_id";

            // Preparamos la nueva consulta
            $pdostmt = $conexion->prepare($sql);

            // Vinculamos las variables
            $pdostmt->bindParam(":role_id", $usuario->role_id, PDO::PARAM_INT);
            $pdostmt->bindParam(":user_id", $usuario->id, PDO::PARAM_INT);

            // Ejecutamos esta nueva consulta
            $pdostmt->execute();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

}