<?php
class Plan{
    private $pla_id;
    private $pla_nombre;
    private $pla_costo;
    function __construct(){}
    function setPlaId($pla_id){
        $this->pla_id = $pla_id;
    }
    function setPlaNombre($pla_nombre){
        $this->pla_nombre = $pla_nombre;
    }
    function setPlaCosto($pla_costo){
        $this->pla_costo = $pla_costo;
    }
    function getPlaId(){
        return $this->pla_id;
    }
    function getPlaNombre(){
        return $this->pla_nombre;
    }
    function getPlaCosto(){
        return $this->pla_costo;
    }
}
?>