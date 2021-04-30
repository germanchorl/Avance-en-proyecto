<?php
class Persona{
    private $per_tipo_doc;
    private $per_id;
    private $per_nombres;
    private $per_apellidos;
    private $per_edad;
    private $per_email;
    private $per_altura;
    private $per_peso;
    private $per_imc;
    private $per_plan_id;
    private $plan;
    function __construct(
        $per_tipo_doc,
        $per_id, $per_nombres,
        $per_apellidos,
        $per_email,
        $per_edad,
        $per_altura,
        $per_peso){
            
        $this->per_tipo_doc=$per_tipo_doc;
        $this->per_id = $per_id;
        $this->per_nombres= $per_nombres;
        $this->per_apellidos= $per_apellidos;
        $this->per_email=$per_email;
        $this->per_edad= $per_edad;
        $this->per_altura = $per_altura;
        $this->per_peso = $per_peso;
        $this->CalcularIMC();
    }

    function CalcularIMC(){
        $resultado=$this->per_peso/pow($this->per_altura,2);
        $this->per_imc=number_format($resultado, 2);
    }
    function setPerTipoDoc($per_tipo_doc){
        $this->per_tipo_doc=$per_tipo_doc;
    }
    function setPerId($per_id) {
        $this->per_id = $per_id;
    }
    function setPerNombres($per_nombres) {
        $this->per_nombres= $per_nombres;
    }
    function setPerApellidos($per_apellidos) {
        $this->per_apellidos = $per_apellidos;
    }
    function setPerEmail($per_email) {
        $this->per_email = $per_email;
    }
    function setPerEdad($per_edad) {
        $this->per_edad= $per_edad;
    }
    function setPerAltura($per_altura) {
        $this->per_altura= $per_altura;
    }
    function setPerPeso($per_peso) {
        $this->per_peso=$per_peso;
    }
    function setPerIMC($per_imc) {
        $this->per_imc=$per_imc;
    }
    function setPerPlanId($per_plan_id) {
        $this->per_plan_id=$per_plan_id;
    }
    function setPlan($plan) {
        $this->plan=$plan;
    }

    function getPerTipoDoc() {
        return $this->per_tipo_doc;
    }
    function getPerId() {
        return $this->per_id;
    }
    function getPerNombres() {
        return $this->per_nombres;
    }
    function getPerApellidos() {
        return $this->per_apellidos;
    }
    function getPerEmail() {
        return $this->per_email;
    }
    function getPerEdad() {
        return $this->per_edad;
    }
    function getPerAltura() {
        return $this->per_altura;
    }
    function getPerPeso() {
        return $this->per_peso;
    }
    function getPerIMC() {
        return $this->per_imc;
    }
    function getPerPlanId() {
        return $this->per_plan_id;
    }
    function getPlan() {
        return $this->plan;
    }
}   