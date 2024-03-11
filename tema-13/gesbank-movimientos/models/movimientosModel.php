<?php


class movimientosModel extends Model
{

    # Método getMovimientos()
    # Consulta SELECT a la tabla movimientos
    public function getMovimientos()
    {
        try {
            $sql = "
            SELECT 
                movimientos.id,
                cuentas.num_cuenta,
                movimientos.fecha_hora,
                movimientos.concepto,
                movimientos.tipo,
                movimientos.cantidad,
                movimientos.saldo
            FROM 
                gesbank.movimientos
            INNER  JOIN cuentas ON  movimientos.id_cuenta=cuentas.id
            ORDER BY id;
            ";

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

    # Método getCuentas()
    # Consulta SELECT a la tabla cuentas, donde extraeremos su id y numero de cuenta
    public function getCuentas()
    {
        try {
            $sql = "
            SELECT 
                *
            FROM 
                cuentas
            ORDER BY id;

            ";

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

    # Método getSaldoIdCuenta()
    # Consulta SELECT a la tabla cuentas, donde extraemos el saldo
    public function getSaldoIdCuenta($idCuenta){
        try {
            $sql = "
            SELECT 
                saldo
            FROM 
                cuentas
            WHERE
                id = :idCuenta
            ";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($sql);
            $pdostmt->bindParam(':idCuenta',$idCuenta,PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
            return $pdostmt->fetchColumn();

        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método validateCuenta()
    # Consulta SELECT  que verifica si una cuenta existe en la tabla cuenta
    public function validateCuenta($idCuenta){
        try {
            $sql = "
            SELECT 
                *
            FROM 
                cuentas
            WHERE
                id = :idCuenta";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($sql);
            $pdostmt->bindParam(':idCuenta',$idCuenta,PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();

            if ($pdostmt->rowCount() != 0 ) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método create(classMovimiento $movimiento)
    # Insertamos en la tabla los datos del movimiento
    public function create(classMovimiento $movimiento){
        try {
            $sql = " 
                    INSERT INTO 
                        movimientos (
                                    id_cuenta,
                                    fecha_hora,
                                    concepto,
                                    tipo,
                                    cantidad,
                                    saldo
                                ) VALUES ( 
                                    :id_cuenta,
                                    :fecha_hora,
                                    :concepto,
                                    :tipo,
                                    :cantidad,
                                    :saldo
                                )";
            // Realizamos la conexión y preparamos la consulta
            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($sql);

            // Vinculamos las variables
            $pdostmt->bindParam(":id_cuenta", $movimiento->id_cuenta, PDO::PARAM_INT);
            $pdostmt->bindParam(":fecha_hora", $movimiento->fecha_hora);
            $pdostmt->bindParam(":concepto", $movimiento->concepto, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(":tipo", $movimiento->tipo, PDO::PARAM_STR);
            $pdostmt->bindParam(":cantidad", $movimiento->cantidad, PDO::PARAM_STR);
            $pdostmt->bindParam(":saldo", $movimiento->saldo, PDO::PARAM_STR);

            // Ejecutamos la consulta
            $pdostmt->execute();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método updateMovCuenta()
    # Actualizamos el saldo y la fecha de ultimo movimiento de la cuenta
    public function updateMovCuenta($id_cuenta, $nuevo_saldo, $nueva_fecha){
        try {
            $sql = "UPDATE cuentas SET saldo = :nuevo_saldo, num_Movtos=(num_Movtos+1), fecha_ul_mov=:nueva_fecha WHERE  id = :id_cuenta";
            // Realizamos la conexión y preparamos la consulta
            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($sql);

            // Vinculamos las variables
            $pdostmt->bindParam(":id_cuenta", $id_cuenta, PDO::PARAM_INT);
            $pdostmt->bindParam(":nuevo_saldo", $nuevo_saldo, PDO::PARAM_INT);
            $pdostmt->bindParam(":nueva_fecha", $nueva_fecha, PDO::PARAM_STR);

            // Ejecutamos la consulta
            $pdostmt->execute();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function getMovimiento($id){
        try {
            $sql = "
            SELECT 
                movimientos.id,
                cuentas.num_cuenta,
                movimientos.fecha_hora,
                movimientos.concepto,
                movimientos.tipo,
                movimientos.cantidad,
                movimientos.saldo
            FROM 
                gesbank.movimientos
            INNER JOIN cuentas ON movimientos.id_cuenta=cuentas.id
            WHERE movimientos.id = :idMov
            ";
    
            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($sql);
            $pdostmt->bindParam(':idMov',$id, PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
            return $pdostmt->fetch();
    
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function order(int $criterio)
    {
        try {
            $sql = "
                SELECT 
                movimientos.id,
                cuentas.num_cuenta,
                movimientos.fecha_hora,
                movimientos.concepto,
                movimientos.tipo,
                movimientos.cantidad,
                movimientos.saldo
                FROM movimientos INNER JOIN cuentas ON movimientos.id_cuenta = cuentas.id ORDER BY :criterio
            ";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(':criterio', $criterio, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();
            return $pdoSt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function filter($expresion)
    {
        try {
            $sql = "                
            SELECT 
            movimientos.id,
            cuentas.num_cuenta,
            movimientos.fecha_hora,
            movimientos.concepto,
            movimientos.tipo,
            movimientos.cantidad,
            movimientos.saldo
            FROM movimientos INNER JOIN cuentas ON movimientos.id_cuenta = cuentas.id 
            WHERE concat_ws(' ',             
                movimientos.id,
                cuentas.num_cuenta,
                movimientos.fecha_hora,
                movimientos.concepto,
                movimientos.tipo,
                movimientos.cantidad,
                movimientos.saldo) LIKE :expresion";

            $conexion = $this->db->connect();

            $expresion = "%" . $expresion . "%";
            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindValue(':expresion', $expresion, PDO::PARAM_STR);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();

            return $pdoSt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }


}
