<?php
class ControladorPersona{
    private $Conexion;
    function __construct(){
        $this->Conexion =new Conexion();
        $this->Conexion->getConexion()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    /*Funcion de listar los datos de las personas*/ 
    function Read(){
        $Resultado = [];
        try {
            $SQL = "select * from persona inner join plan on persona.per_plan_id = plan.pla_id";
            $ps = $this->Conexion->getConexion()->prepare($SQL);
            $ps->execute(NULL);
            $Resultado = [];
            while ($Row = $ps->fetch(PDO::FETCH_OBJ)) {
                $plan = new Plan();
                $plan->setPLaId($Row->pla_id);
                $plan->setPlaNombre($Row->pla_nombre);
                $Persona = new Persona(
                    $Row->per_tipo_doc,
                    $Row->per_id,
                    $Row->per_nombres,
                    $Row->per_apellidos,
                    $Row->per_email,
                    $Row->per_edad,
                    $Row->per_altura,
                    $Row->per_peso,
                    $Row->per_imc
                );
                $Persona->setPerPlanId($plan->getPlaId());
                $Persona->setPlan($plan);
                array_push($Resultado, $Persona);
            }
            $this->Conexion = null;
        } catch (PDOException $E) {
            echo "Fallo la conexion" . $E->getMessage();
        }
        return $Resultado;
    }
/*Funcion de crear persona*/
    function Create($Persona){
        try {
            $resultado=[];
            $SQL = "insert into persona values(?,?,?,?,?,?,?,?,?,?)";
            $ps = $this->Conexion->getConexion()->prepare($SQL);
            $ps->execute(array(
                $Persona->getPerTipoDoc(),
                $Persona->getPerId(),
                $Persona->getPerNombres(),
                $Persona->getPerApellidos(),
                $Persona->getPerEdad(),
                $Persona->getPerEmail(),
                $Persona->getPerAltura(),
                $Persona->getPerPeso(),
                $Persona->getPerIMC(),
                $Persona->getPerPlanId()
            ));
            if ($ps->rowCount() > 0) {
                $mensaje = "Se creó la persona correctamente";
                $type = "success";
            } else {
                $mensaje = "No se pudo crear la persona";
                $type = "error";
            }
            $this->Conexion = null;
        } catch (PDOException $e) {
            $mensaje = "Error al crear la persona " .$e->getMessage(); 
            $type = "error";
        }
        $resultado=[
            "mensaje" => $mensaje,
            "type"    => $type
        ];
        return $resultado;
    }

    /*Funcion buscar persona*/
    function Search($per_id){
        try {
            $sql = "select * from persona where per_id = ?";
            $ps = $this->Conexion->getConexion()->prepare($sql);
            $ps->execute(array($per_id));
            $Resultado = [];
            while ($Row = $ps->fetch(PDO::FETCH_OBJ)) {
                $Persona = new Persona(
                    $Row->per_tipo_doc,
                    $Row->per_id,
                    $Row->per_nombres,
                    $Row->per_apellidos,
                    $Row->per_email,
                    $Row->per_edad,
                    $Row->per_altura,
                    $Row->per_peso,
                    $Row->per_imc
                );
                array_push($Resultado, $Persona);
            }
            $this->Conexion = null;
        } catch (PDOException $e) {
            echo "Falló la conexión" . $e->getMessage();
        }
        return $Resultado;
    }
    /*Funcion Actualizar persona*/
    function Actualizar($Persona)
    {
        $resultado = [];
        $sql = "update persona set per_nombres=?, per_apellidos=?, per_email=?, per_edad=?, per_altura=?, per_peso=?, per_plan_id=? where per_id=?";
        $ps = $this->Conexion->getConexion()->prepare($sql);
        $ps->execute(array(
            $Persona->getPerNombres(),
            $Persona->getPerApellidos(),
            $Persona->getPerEmail(),
            $Persona->getPerEdad(),
            $Persona->getPerAltura(),
            $Persona->getPerPeso(),
            $Persona->getPerPlanId(),
            $Persona->getPerId()
        ));
        if ($ps->rowCount() > 0) {
            $mensaje = "Se actualizó la persona correctamente";
            $type = "success";
        } else {
            $mensaje = "No se pudo actualizar la persona";
            $type = "error";
        }
        $resultado = [
            "mensaje" => $mensaje,
            "type"    => $type
        ];
        $this->Conexion = null;
        return $resultado;
    }
    /*Funcion de eliminar persona*/
    function Delete($per_id){
        $resultado=[];
        $sql="delete from persona where per_id=?";
        $ps=$this->Conexion->getConexion()->prepare($sql);
        $ps->execute(array($per_id));
        if ($ps->rowCount() > 0) {
            $mensaje = "Se eliminó la persona correctamente";
            $type = "success";
        } else {
            $mensaje = "No se pudo eliminar la persona";
            $type = "error";
        }
        $resultado = [
            "mensaje"=> $mensaje,
            "type"=> $type
        ];
        $this->Conexion=null;
        return $resultado;
    }
}