<!doctype html>
<?php
include_once '../../Modelo/Persona.php';
include_once '../../Modelo/Conexion.php';
include_once '../../Controlador/ControladorPersona.php';
?>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Actualizar persona</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
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
                    $persona = new Persona($per_tipo_doc,
                    $per_id,
                    $per_nombres,
                    $per_apellidos,
                    $per_email,
                    $per_edad,
                    $per_altura,
                    $per_peso);
                    $persona->setPerPlanId($per_plan_id);
                    $ControladorPersona = new ControladorPersona();
                    $resultado=$ControladorPersona->Actualizar($persona);

                    if($resultado["type"] == "success"){
                        echo '<h2 class="text-center text-success">'. $resultado["mensaje"] ."</h2>";
                    }else{
                        echo '<h2 class="text-center text-danger">'. $resultado["mensaje"] ."</h2>";
                    }
                } catch (PDOException $ex) {
                    echo '<h2 class="text-center text-danger">'. $ex->getMessage() ."</h2>";
                }
                ?>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <a class="btn btn-warning" href="ListarPersona.php">Regresar al listado</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>