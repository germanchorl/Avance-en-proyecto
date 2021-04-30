<!doctype html>
<?php
include_once '../../Controlador/ControladorPersona.php';
include_once '../../Modelo/Conexion.php';
include_once '../../Modelo/Persona.php';
?>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Crear persona (Vista)</title>
</head>

<body>
    <?php
    try {
        if (!isset($_REQUEST["tipo"])) {
            throw new PDOException("Por favor ingrese su tipo de documento");
        }
        if (!isset($_REQUEST["codigo"])) {
            throw new PDOException("Por favor digite el numero de identificacion");
        }
        if (!isset($_REQUEST["nombres"])) {
            throw new PDOException("Por favor digite sus nombres");
        }
        if (!isset($_REQUEST["apellidos"])) {
            throw new PDOException("Por favor digite sus apellidos");
        }
        if (!isset($_REQUEST["email"])) {
            throw new PDOException("Por favor digite el email");
        }
        if (!isset($_REQUEST["edad"])) {
            throw new PDOException("Por favor digite su edad");
        }
        if (!isset($_REQUEST["altura"])) {
            throw new PDOException("Por favor digite su altura");
        }
        if (!isset($_REQUEST["peso"])) {
            throw new PDOException("Por favor digite su peso");
        }
        if (!isset($_REQUEST["plan-e"])) {
            throw new PDOException("Por favor digite el plan");
        }
        $per_tipo_doc = $_REQUEST["tipo"];
        $per_id = $_REQUEST["codigo"];
        $per_nombres = $_REQUEST["nombres"];
        $per_apellidos = $_REQUEST["apellidos"];
        $per_email = $_REQUEST["email"];
        $per_edad = $_REQUEST["edad"];
        $per_altura = $_REQUEST["altura"];
        $per_peso = $_REQUEST["peso"];
        $per_plan_id = $_REQUEST["plan-e"];
        
        $Persona = new Persona(
            $per_tipo_doc,
            $per_id,
            $per_nombres,
            $per_apellidos,
            $per_email,
            $per_edad,
            $per_altura,
            $per_peso
        );
        $Persona->setPerPlanId($per_plan_id);
        $ControladorP = new ControladorPersona();
        $resultado = $ControladorP->Create($Persona);

        if($resultado["type"] == "success"){
            echo '<h2 class="text-center text-success">'. $resultado["mensaje"] ."</h2>";
        }else{
            echo '<h2 class="text-center text-danger">'. $resultado["mensaje"] ."</h2>";
        }
    } catch (PDOException $ex) {
        echo '<h2 class="text-center text-danger">'. $ex->getMessage() ."</h2>";
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand mb-0 h1" href="http://localhost/ProyectoPHP/Index.php">
                <img src="http://localhost/ProyectoPHP/Source/favicon.ico" alt="" width="30" height="24" class="d-inline-block align-text-top">
                BodyGym
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/ProyectoPHP/Vista/Persona/FormularioPersona.php">Inscripciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ProyectoPHP/Vista/Persona/ListarPersona.php">Nuestros miembros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ProyectoPHP/Vista/QuienesSomos.php">Quienes somos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script type="text/javascript">
        <?php
        header('location:/ProyectoPHP/Vista/Persona/FormularioPersona.php')
        ?>
    </script>
</body>

</html>