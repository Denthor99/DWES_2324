<?php
    /**
     * cuentaModel.php
     * Modelo del controlador cuenta
     */

     class cuentaModel extends Model{
        /**
         * Método get()
         * Extraemos los datos de todas las cuentas
         */
        public function get(){
            try {
                // Creamos la sentencia necesaria para mostrar correctamente los datos
            // de las cuentas
            $sql = "SELECT
            cuentas.id,
            cuentas.num_cuenta AS numCuenta,
            clientes.nombre AS nombre,
            clientes.apellidos AS apellidos,
            cuentas.fecha_alta AS fechAlta,
            cuentas.fecha_ul_mov AS fechUltiMov,
            cuentas.num_movtos AS numMovs,
            cuentas.saldo AS saldo
            FROM gesbank.cuentas
            INNER JOIN
            gesbank.clientes ON clientes.id=cuentas.id_cliente
            ORDER BY id";

            // Conectamos con la base de datos
            $conexion = $this->db->connect();

            // Preparamos la consulta
            $pdostmt = $conexion->prepare($sql);

            // Establecemos el tipo de Fetch
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

        /**
         * Método getClientes
         * Devuelve un conjunto de clientes, usado para el select de formulario nuevo
         */
        public function getClientes() {
            try {
                // Creamos la consulta
                $sql = "SELECT id, 
                concat_ws(' ', nombre, apellidos) AS nombre 
                FROM gesbank.clientes";

                // Creamos la conexión a la base de datos
                $conexion = $this->db->connect();

                // Preparamos la consulta
                $pdostmt = $conexion->prepare($sql);

                // Establecemos el tipo de Fetch
                $pdostmt->setFetchMode(PDO::FETCH_OBJ);

                // Ejecutamos la consulta
                $pdostmt->execute();

                // Devolvemos un objeto de tipo PDOStatement
                return $pdostmt;
            } catch (PDOException $e) {
                include 'template/partials/errorDB.php';
                exit();
            }
        }

        /**
         * Método create
         * Insertamos en la base de datos una nueva cuenta
         */
        public function create(classCuenta $cuenta) {
            try {
                // Creamos la consulta
                $sql = "INSERT INTO gesbank.cuentas VALUES(
                    null,
                    :num_cuenta,
                    :id_cliente,
                    :fecha_alta,
                    :fecha_ul_mov,
                    :num_movtos,
                    :saldo,
                    now(),
                    null
                )";

                // Creamos la conexión a la base de datos
                $conexion = $this->db->connect();

                // Preparamos la consulta
                $pdostmt = $conexion->prepare($sql);

               // Vinculamos las variables
               $pdostmt->bindParam(':num_cuenta', $cuenta->num_cuenta,PDO::PARAM_STR,20);
               $pdostmt->bindParam(':id_cliente', $cuenta->id_cliente,PDO::PARAM_INT);
               $pdostmt->bindParam(':fecha_alta', $cuenta->fecha_alta);
               $pdostmt->bindParam(':fecha_ul_mov', $cuenta->fecha_ul_mov);
               $pdostmt->bindParam(':num_movtos', $cuenta->num_movtos,PDO::PARAM_INT,10);
               $pdostmt->bindParam(':saldo', $cuenta->saldo);

                // Ejecutamos la consulta
                $pdostmt->execute();

            } catch (PDOException $e) {
                include 'template/partials/errorDB.php';
                exit();
            }
        }

        /**
         * Método read(int $id)
         * Devuelve el registro de una base de datos a través de un id
         */
        public function read(int $id){
            try {
                // Creamos la consulta a realizar
                    $sql = "Select
                cuentas.id,
                cuentas.num_cuenta AS numCuenta,
                clientes.nombre AS nombre,
                clientes.apellidos AS apellidos,
                clientes.id AS idCliente,
                cuentas.fecha_alta AS fechAlta,
                cuentas.fecha_ul_mov AS fechUltiMov,
                cuentas.num_movtos AS numMovs,
                cuentas.saldo AS saldo
                FROM gesbank.cuentas
                INNER JOIN
                gesbank.clientes ON clientes.id=cuentas.id_cliente
                WHERE cuentas.id = :id";

                // Creamos la conexión a la base de datos
                $conexion = $this->db->connect();

                // Preparamos la consulta
                $pdostmt = $conexion->prepare($sql);

                // Vinculamos la variable
                $pdostmt->bindParam(":id",$id,PDO::PARAM_INT);

                // Establecemos el tipo de fetch a usar
                $pdostmt->setFetchMode(PDO::FETCH_OBJ);

                // Ejecutamos la consulta
                $pdostmt->execute();

                // Devolvemos un objeto de la clase PDOStatement
                return $pdostmt->fetch();
            } catch (PDOException $e) {
                include 'template/partials/errorDB.php';
                exit();
            }
        }

        /**
         * Método update(int $id, classCuenta $cuenta)
         * Actualiza un registro de la base de datos según su ID
         */
        public function update(int $id, classCuenta $cuenta){
            try {
                // Creamos la consulta a ejecutar
                $sql= "UPDATE gesbank.cuentas SET
                    num_cuenta = :num_cuenta,
                    id_cliente = :id_cliente,
                    fecha_alta = :fecha_alta,
                    fecha_ul_mov = :fecha_ul_mov,
                    num_movtos = :num_movtos,
                    saldo = :saldo,
                    update_at = now()
                    WHERE id = :id
                ";

                // Creamos la conexion
                $conexion = $this->db->connect();

                // Preparamos la consulta
                $pdostmt = $conexion->prepare($sql);

                // Vinculamos las variables
                $pdostmt->bindParam(':id',$id,PDO::PARAM_INT);
                $pdostmt->bindParam(':num_cuenta',$cuenta->num_cuenta,PDO::PARAM_STR,20);
                $pdostmt->bindParam(':id_cliente',$cuenta->id_cliente,PDO::PARAM_INT);
                $pdostmt->bindParam(':fecha_alta',$cuenta->fecha_alta);
                $pdostmt->bindParam(':fecha_ul_mov',$cuenta->fecha_ul_mov);
                $pdostmt->bindParam(':num_movtos',$cuenta->num_movtos,PDO::PARAM_INT,10);
                $pdostmt->bindParam(':saldo',$cuenta->saldo);

                // Ejecutamos la sentencia
                $pdostmt->execute();
            } catch (PDOException $e) {
                include 'template/partials/errorDB.php';
                exit();
            }
        }

        
        /**
         * Método delete
         * Elimina un registro de la base de datos
         */
        public function delete(int $id){
            try {
                // Creamos la sentencia correspondiente
                $sql = "DELETE FROM gesbank.cuentas WHERE cuentas.id=:id";

                // Creamos la conexion
                $conexion = $this->db->connect();

                // Preparamos la consulta
                $pdostmt = $conexion->prepare($sql);

                // Vinculamos las variables
                $pdostmt->bindParam(":id", $id, PDO::PARAM_INT);

                // Ejecutamos la sentencia
                $pdostmt->execute();
            } catch (PDOException $e) {
                include 'template/partials/errorDB.php';
                exit();
            }
        }

        /**
         * Método order
         * Devuelve un conjunto de registros ordenados según un criterio
         */
        public function order(int $criterio){
            try {
                // Creamos la consulta
                $sql = "SELECT
                cuentas.id,
                cuentas.num_cuenta AS numCuenta,
                clientes.nombre AS nombre,
                clientes.apellidos AS apellidos,
                cuentas.fecha_alta AS fechAlta,
                cuentas.fecha_ul_mov AS fechUltiMov,
                cuentas.num_movtos AS numMovs,
                cuentas.saldo AS saldo
                FROM gesbank.cuentas
                INNER JOIN
                gesbank.clientes ON clientes.id=cuentas.id_cliente
                ORDER BY :criterio";

                // Creamos la conexion
                $conexion = $this->db->connect();

                // Preparamos la consulta
                $pdostmt = $conexion->prepare($sql);
                // Vincular los parametros a la consulta
                $pdostmt->bindParam(":criterio", $criterio,PDO::PARAM_INT);

                // Establecemos el tipo de fetch
                $pdostmt->setFetchMode(PDO::FETCH_OBJ);

                // Ejecutamos la consulta
                $pdostmt->execute();

                // Devolvemos el resultado, siendo este un objeto tipo PDOStatement
                return $pdostmt;
            } catch (PDOException $e) {
                include 'template/partials/errorDB.php';
                exit();
            }
        }

         /**
         * Método filter
         * Devolver un cojunto de registros, que coincidan con una expresión
         */
        public function filter($expresion){
            try {
                // Creamos la consulta
                $sql = "SELECT
                    cuentas.id,
                    cuentas.num_cuenta AS numCuenta,
                    clientes.nombre AS nombre,
                    clientes.apellidos AS apellidos,
                    cuentas.fecha_alta AS fechAlta,
                    cuentas.fecha_ul_mov AS fechUltiMov,
                    cuentas.num_movtos AS numMovs,
                    cuentas.saldo AS saldo
                    FROM gesbank.cuentas
                    INNER JOIN gesbank.clientes ON clientes.id=cuentas.id_cliente
                    WHERE CONCAT_WS(' ',
                        cuentas.id,
                        cuentas.num_cuenta,
                        clientes.nombre,
                        clientes.apellidos,
                        cuentas.fecha_alta,
                        cuentas.fecha_ul_mov,
                        cuentas.num_movtos,
                        cuentas.saldo
                    ) LIKE :expresion";

                // Conectarnos a la base de datos
                $conexion = $this->db->connect();

                // Preparamos la consulta
                $pdostmt = $conexion->prepare($sql);

                // Vincular las variables, aunque previamente modificaremos la expresion
                $expresion = '%'.$expresion.'%';
                $pdostmt -> bindParam(":expresion",$expresion);

                // Establecemos el tipo de fetch a usar
                $pdostmt->setFetchMode(PDO::FETCH_OBJ);

                // Ejecutamos la consulta
                $pdostmt->execute();

                // Devolvemos un objeto de tipo PDOStatement
                return $pdostmt;

            } catch (PDOException $e) {
                include 'template/partials/errorDB.php';
                exit();
            }
        }
     }
?>