<?php 
    class PerfilModel extends Model {

    /**
     * Método getUserId
     * Obtiene un usuario según su id
     */
    public function getUserId($id) {
        try {

            $sql = "SELECT * FROM gesbank.users WHERE id= :id LIMIT 1";
            $conexion = $this->db->connect();
            $result = $conexion->prepare($sql);
            $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'classUser');
            $result->bindParam(":id", $id, PDO::PARAM_INT);
            $result->execute();
            
            return $result->fetch();

        }  catch (PDOException $e) {
            
            include_once('template/partials/errorDB.php');
            exit();

        }

    }

    /**
     * Método updatePass
     * Actualiza la contraseña de un usuario
     */
    public function updatePass (classUser $user) {
        try {
             
            $password_encriptado = password_hash($user->password, CRYPT_BLOWFISH);
            $update = "
                        UPDATE gesbank.users SET
                            password = :password
                        WHERE id = :id      
                        ";

            $conexion = $this->db->connect();
            $result = $conexion->prepare($update);

            $result->bindParam(':password', $password_encriptado , PDO::PARAM_STR, 50);
            $result->bindParam(':id', $user->id, PDO::PARAM_INT) ;

            $result->execute();

        }  catch (PDOException $e) {
            
            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    /**
     * Método validateName
     * Comprueba si  el nombre de usuario ya existe en la base de datos o no.
     */
    public function validateName($name) {

        try {
            $sql = "
                    SELECT * FROM gesbank.users
                    WHERE name = :name
            ";

            # Conectamos con la base de datos
            $conexion = $this->db->connect();
    
            # Ejecutamos mediante prepare la consulta SQL
            $result= $conexion->prepare($sql);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result -> execute();

           if ($result->rowCount() == 0) 
                    return TRUE;
            return FALSE;

        } catch(PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }
        
    
    }

   /**
    * Método validateEmail
    * Comprueba si ya existe un email en la base de datos o no
    */
   public function validateEmail($email) {

    try {
        $sql = "
                SELECT * FROM gesbank.users
                WHERE email = :email
        ";

        # Conectamos con la base de datos
        $conexion = $this->db->connect();

        # Ejecutamos mediante prepare la consulta SQL
        $result= $conexion->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result -> execute();

        if ($result->rowCount() == 0) 
            return TRUE;
        return FALSE;

    } catch(PDOException $e) {
        include_once('template/partials/errorDB.php');
        exit();
    }
    
    }

    /**
     * Método update
     * Actualiza los datos de un usuario
     */
    public function update (classUser $user) {
        try {
                     
            $update = "
                        UPDATE gesbank.users SET
                            name = :name,
                            email = :email
                        WHERE id = :id
                        LIMIT 1      
                        ";

            $conexion = $this->db->connect();
            $result = $conexion->prepare($update);

            $result->bindParam(':name', $user->name, PDO::PARAM_STR, 50);
            $result->bindParam(':email', $user->email , PDO::PARAM_STR, 50);
            $result->bindParam(':id', $user->id, PDO::PARAM_INT) ;

            $result->execute();

        }  catch (PDOException $e) {
            
            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    /**
     * Método delete
     * Eliminamos  un usuario de la base de datos
     */
    public function delete($id) {

        try {
                $delete = "
                    DELETE FROM gesbank.users 
                    WHERE id = :id      
                ";

                $conexion = $this->db->connect();
                $result = $conexion->prepare($delete);

                $result->bindParam(':id', $id, PDO::PARAM_INT) ;

                $result->execute();

        }  catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }

    }

}
?>