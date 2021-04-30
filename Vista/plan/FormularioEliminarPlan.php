<!doctype html>
<?php
include_once '../../Modelo/Plan.php';
include_once '../../Modelo/Conexion.php';
include_once '../../Controlador/ControladorPlan.php';
?>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>ELIMINAR PLAN</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1">
                <h1 class="text-center text-success">
                    ELMINAR PLAN
                </h1>
            </div>
        </div>
        <?php
            if(!isset($_GET["pla_id"])){
                throw new PDOException("No se recibio el id");
            }
            try{
                $pla_id = $_GET["pla_id"];
                $ControladorPlan = new ControladorPlan();
                $resultado = $ControladorPlan->buscar($pla_id);
                if(count($resultado)>0){
                    $plan = $resultado[0];
                }
            }catch(PDOException $e){
                echo "Falló la conexión " . $e->getMessage();
            }
        ?>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-title">
                        <div class="row">
                            <div class="col">
                                <h3 class="text-center text-primary">
                                    <?php  echo $plan->getPlaId() . " - " .$plan->getPlaNombre() ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="EliminarPlan.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input name="pla_id" type="hidden" class="form-control" id="pla_id" value="<?php echo $plan->getPlaId() ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </div>
                                <div class="col text-center">
                                    <a class="btn btn-success" href="ListarPlan.php">Regresar al listado</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>