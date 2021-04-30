<!doctype html>
<?php
include_once '../../Modelo/Persona.php';
include_once '../../Modelo/Plan.php';
include_once '../../Modelo/Conexion.php';
include_once '../../Controlador/ControladorPersona.php';
include_once '../../Controlador/ControladorPlan.php';
?>

<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>EDITAR PERSONAS</title>
</head>

<body>
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

    <br>
    <h1 class="text-center" style="font-family:Verdana;">Formulario editar asociado BodyGym </h1>
    <br>



    <div class="container">
        <?php
        if (!isset($_GET["per_id"])) {
            throw new PDOException("No se recibio la identificación");
        }
        try {
            $per_id = $_GET["per_id"];
            $ControladorPersona = new ControladorPersona();
            $resultado = $ControladorPersona->Search($per_id);
            if (count($resultado) > 0) {
                $Persona = $resultado[0];
            }
        } catch (PDOException $e) {
            echo "Falló la conexión " . $e->getMessage();
        }
        ?>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-body">
                        <form action="ActualizarPersona.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="tipo">Tipo de identificación</label>
                                    <input name="tipo" type="text" class="form-control" id="tipo" value="<?php echo $Persona->getPerTipoDoc() ?>" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="codigo">Número de identificación</label>
                                    <input name="codigo" type="number" class="form-control" id="codigo" value="<?php echo $Persona->getPerId() ?>" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="nombres">Nombre</label>
                                    <input name="nombres" type="text" class="form-control" id="nombres" value="<?php echo $Persona->getPerNombres() ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="apellidos">Apellido</label>
                                    <input name="apellidos" type="text" class="form-control" id="apellidos" value="<?php echo $Persona->getPerApellidos() ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="email">Correo-Email</label>
                                    <input name="email" type="email" class="form-control" id="email" value="<?php echo $Persona->getPerEmail() ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="edad">Edad</label>
                                    <input name="edad" type="number" class="form-control" id="edad" value="<?php echo $Persona->getPerEdad() ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="altura">Altura</label>
                                    <input name="altura" type="number" class="form-control" id="altura" value="<?php echo $Persona->getPerAltura() ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="peso">Peso</label>
                                    <input name="peso" type="number" class="form-control" id="peso" value="<?php echo $Persona->getPerPeso() ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="plan-e">Plan</label>
                                    <select name="plan-e" id="plan-e" class="form-control">
                                        <option value="">--Seleccione--</option>
                                        <?php
                                        $controladorPlan = new controladorPlan();
                                        $planes = $controladorPlan->listar();
                                        if (count($planes) > 0) {
                                            foreach ($planes as $plan) {
                                                if($Persona->getPerPlanId()==$plan->getPlaId()){
                                                    echo '<option value="' . $plan->getPlaId() . '" selected >' . $plan->getPlaNombre() . '</option>';
                                                }else{
                                                    echo '<option value="'.$plan->getPlaId().'" >'.$plan->getPlaNombre().'</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
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