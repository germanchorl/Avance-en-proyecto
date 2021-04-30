<!doctype html>
<?php
include_once '../../Modelo/Persona.php';
include_once '../../Modelo/Conexion.php';
include_once '../../Controlador/ControladorPersona.php';
?>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <?php
                try {
                    if (!isset($_REQUEST["codigo"])) {
                        throw new PDOException("Por favor digite la identifiacion");
                    }
                    $per_id = $_REQUEST["codigo"];
                    $ControladorPersona = new ControladorPersona();
                    /* $Busqueda = $ControladorPersona->Search($per_id);
                    foreach ($Busqueda as $P) {
                        $per_tipo_doc = $P->getPerTipoDoc();
                        $per_id = $P->getPerId();
                        $per_nombres = $P->getPerNombres();
                        $per_apellidos = $P->getPerApellidos();
                        $per_email = $P->getPerEmail();
                        $per_edad = $P->getPerEdad();
                        $per_altura = $P->getPerAltura();
                        $per_peso = $P->getPerPeso();
                        $per_plan_id = $P->getPerPlanId();
                    }
                    echo "fdsfsd" . $per_altura;
                    $persona = new Persona(
                        $per_tipo_doc,
                        $per_id,
                        $per_nombres,
                        $per_apellidos,
                        $per_email,
                        $per_edad,
                        $per_altura,
                        $per_peso
                    );
                    $persona->setPerPlanId($per_plan_id) */;
                    $resultado = $ControladorPersona->Delete($per_id);
                    if ($resultado["type"] == "success") {
                        echo '<h2 class="text-center text-success">' . $resultado["mensaje"] . "</h2>";
                    } else {
                        echo '<h2 class="text-center text-danger">' . $resultado["mensaje"] . "</h2>";
                    }
                } catch (PDOException $ex) {
                    echo '<h2 class="text-center text-danger">' . $ex->getMessage() . "</h2>";
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>