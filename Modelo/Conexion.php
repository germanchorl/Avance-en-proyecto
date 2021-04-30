<?php
class Conexion{
    private $Conexion;
    private $driver;
    private $db;
    private $host;
    private $port;
    private $user;
    private $password;
    function __construct(){
        $this->driver="mysql";
        $this->db="proyecto";
        $this->host="127.0.0.1";
        $this->port="3306";
        $this->user="root";
        $this->password="";
        $this->setConexion();
    }
    function setConexion(){
        try{
            $this->Conexion=new PDO("mysql:host=$this->host;
            dbname=$this->db;
            port=$this->port",$this->user,$this->password);
        }catch(PDOException $Pe){
            die("No fue posible conectar");
        }
    }
    function getConexion(){
        return $this->Conexion;
    }
}
?>