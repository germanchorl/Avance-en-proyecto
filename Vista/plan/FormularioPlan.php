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

    <title>CREAR Plan</title>
    <style>
        body {
            background-image: url("https://image.freepik.com/free-photo/fitness-accessories-grey-background_23-2148241573.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
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
    <h1 class="text-center" style="font-family:Verdana;">Crear nuevo plan BodyGym </h1>
    <br>

    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <form class="row g-3" action="CrearPlan.php" method="POST">
                <div class="col-6">
                    <div class="form-group col-md-12">
                        <label for="pla_id"> - Id</label>
                        <input name="pla_id" type="number" class="form-control" id="pla_id">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group col-md-12">
                        <label for="pla_nombre"> - Nombre</label>
                        <input name="pla_nombre" type="text" class="form-control" id="pla_nombre">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group col-md-12">
                        <label for="pla_costo"> - Costo</label>
                        <input name="pla_costo" type="number" class="form-control" id="pla_costo">
                    </div>
                </div>
                <div class="col-15">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </form>
        </nav>
    </div>
    </nav>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>