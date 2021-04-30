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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Lista planes</title>
    <style>
        body {
            background-image: url("https://image.freepik.com/foto-gratis/gimnasio-equipos-gimnasio-pesas-toalla-embotellador-wate-calzado-entrenamiento-entrenadores-deportivos-sobre-fondo-blanco-deporte-estilo-vida-saludable-objetos-concepto_1391-736.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
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
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class="text-center">
                    Listado de planes
                </h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-primary" href="FormularioPlan.php">Crear nuevo</a>
                        </div>
                    </div>
                    <br>
                    <nav class="navbar navbar-light" style="background-color: #A193FA;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Nombre</td>
                                    <td>Costos</td>
                                    <td>Acciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $controladorPlan = new controladorPlan();
                                $planes = $controladorPlan->listar();
                                foreach ($planes as $plan) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $plan->getPlaId() ?>
                                        </td>
                                        <td>
                                            <?php echo $plan->getPlaNombre() ?>
                                        </td>
                                        <td>
                                            <?php echo $plan->getPlaCosto() ?>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col text-center">
                                                    <a class="btn btn-warning" href="formularioEditarPlan.php?pla_id=<?php echo $plan->getPlaId() ?>">Editar</a>
                                                </div>
                                                <div class="col text-center">
                                                    <a class="btn btn-danger" href="formularioEliminarPlan.php?pla_id=<?php echo $plan->getPlaId() ?>">Eliminar</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </nav>
                </div>
            </div>
        </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>