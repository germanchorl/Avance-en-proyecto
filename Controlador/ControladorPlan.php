<?php
class ControladorPlan{
    function __construct(){
        $this->Conexion = new Conexion();
        $this->Conexion->getConexion()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    function listar(){
        try {
            $sql = "select * from plan";
            $ps = $this->Conexion->getConexion()->prepare($sql);
            $ps->execute(NULL);
            $resultado = [];
            while ($row = $ps->fetch(PDO::FETCH_OBJ)) {
                $plan = new plan();
                $plan->setPlaId($row->pla_id);
                $plan->setPlaNombre($row->pla_nombre);
                $plan->setPlaCosto($row->pla_costo);
                array_push($resultado, $plan);
            }
            $this->Conexion = null;
        } catch (PDOException $e) {
            echo "Falló la conexión " . $e->getMessage();
        }
        return $resultado;
    }

    function crear($plan)
    {
        try {
            $resultado = [];
            $sql = "insert into plan values (?,?,?)";
            $ps = $this->Conexion->getConexion()->prepare($sql);
            $ps->execute(array(
                $plan->getPlaId(),
                $plan->getPlaNombre(),
                $plan->getPlaCosto()
            ));
            if ($ps->rowCount() > 0) {
                $mensaje = "Se creó el plan correctamente";
                $type = "success";
            } else {
                $mensaje = "No se pudo crear el plan";
                $type = "error";
            }
            $this->Conexion = null;
        } catch (PDOException $e) {
            $mensaje = "Error al crear la persona " . $e->getMessage();
            $type = "error";
        }
        $resultado = [
            "mensaje" => $mensaje,
            "type"    => $type
        ];
        return $resultado;
    }

    function buscar($pla_id)
    {
        try {
            $sql = "select * from plan where pla_id = ?";
            $ps = $this->Conexion->getConexion()->prepare($sql);
            $ps->execute(array(
                $pla_id
            ));
            $resultado = [];
            while ($row = $ps->fetch(PDO::FETCH_OBJ)) {
                $plan = new plan();
                $plan->setPlaId($row->pla_id);
                $plan->setPlaNombre($row->pla_nombre);
                $plan->setPlaCosto($row->pla_costo);
                array_push($resultado, $plan);
            }
            $this->Conexion = null;
        } catch (PDOException $e) {
            echo "Falló la conexión " . $e->getMessage();
        }
        return $resultado;
    }

    function actualizar($plan)
    {
        $resultado = [];
        $sql = "update plan set pla_nombre=?, pla_costo=? where pla_id=?";
        $ps = $this->Conexion->getConexion()->prepare($sql);
        $ps->execute(array(
            $plan->getPlaNombre(),
            $plan->getPlaCosto(),
            $plan->getPlaId()
        ));
        if ($ps->rowCount() > 0) {
            $mensaje = "Se actualizó el plan correctamente";
            $type = "success";
        } else {
            $mensaje = "No se pudo actualizar el plan";
            $type = "error";
        }
        $resultado = [
            "mensaje" => $mensaje,
            "type"    => $type
        ];
        $this->Conexion = null;
        return $resultado;
    }

    function eliminar($plan)
    {
        try {
            if ($this->validarPersonas($plan)) {
                $sql = "delete from plan where pla_id=?";
                $ps = $this->Conexion->getConexion()->prepare($sql);
                $ps->execute(array(
                    $plan->getPlaId()
                ));
                if ($ps->rowCount() > 0) {
                    $mensaje = "Se eliminó el plan correctamente";
                    $type = "success";
                } else {
                    $mensaje = "No se pudo eliminar el plan";
                    $type = "error";
                }
                $this->Conexion = null;
            } else {
                $mensaje = "No se pudo eliminar el plan porque contiene personas";
                $type = "error";
            }
        } catch (PDOException $pe) {
            $mensaje = "No se pudo eliminar el plan " . $pe->getMessage();
            $type = "error";
        }
        $resultado = [
            "mensaje" => $mensaje,
            "type"    => $type
        ];
        return $resultado;
    }

    function validarPersonas($plan)
    {
        try {
            $sql = "select * from persona where per_plan_id=?";
            $ps = $this->Conexion->getConexion()->prepare($sql);
            $ps->execute(array(
                $plan->getPlaId()
            ));
            if ($ps->rowCount() > 0) {
                return false;
            } else {
                return true;
            }
            $this->Conexion = null;
        } catch (PDOException $e) {
            echo "Falló la conexión " . $e->getMessage();
        }
    }
}
