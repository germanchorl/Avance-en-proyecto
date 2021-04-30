<!doctype html>
<?php
include_once  '../../Modelo/Conexion.php';
include_once '../../Modelo/Plan.php';
include_once '../../Controlador/ControladorPlan.php';
?>

<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <title>Formulario de inscripcion BodyGym</title>
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
  <h1 class="text-center" style="font-family:Verdana;"><kbd>Formulario de inscripción BodyGym </kbd></h1>
  <br>

  <div class="container">
    <nav class="navbar navbar-light bg-light">
      <form class="row g-3" action="CrearPersona.php" method="POST">
        <div class="col-md-4">
          <label for="tipo">-Tipo de Documento</label>
          <select id="tipo" class="form-control" name="tipo" required>
            <option value="">Seleccione su tipo de documento</option>
            <option value="Cedula">Cedula de Ciudadania</option>
            <option value="visa">Visa</option>
            <option value="pasaporte">Pasaporte</option>
          </select>
        </div>
        <div class=" col-md-6">
          <label for="codigo">-Número de identificación</label>
          <input name="codigo" type="number" class="form-control" placeholder="Ej. 1004842293" id="codigo">
        </div>
        <div class="col-6">
          <label for="nombres">-Nombres</label>
          <input name="nombres" type="text" class="form-control" placeholder="Ej. Daniel Rosendo" id="nombres">
        </div>
        <div class="col-6">
          <label for="apellidos">-Apellidos</label>
          <input name="apellidos" type="text" class="form-control" placeholder="Ej. Lopez Gatel" id="apellidos">
        </div>
        <div class="col-12">
          <label for="email">-Correo-Email</label>
          <input name="email" type="email" placeholder="example@email.com" id="email" class="form-control">
        </div>
        <div class="col-4">
          <label for="edad">-Edad</label>
          <input name="edad" type="number" class="form-control" placeholder="Ej. 18 " id="edad">
        </div>
        <div class="col-4">
          <label for="altura">-Altura</label>
          <input name="altura" type="number" step="any" placeholder="Ej. 1.80cm" class="form-control" id="altura">
        </div>
        <div class="col-4">
          <label for="peso">-Peso</label>
          <input name="peso" type="number" class="form-control" placeholder="Ej. 69kg" id="peso">
        </div>
        <div class="col-md-12">
          <label for="plan-e">-Plan</label>
          <select name="plan-e" id="plan-e" class="form-control">
            <option value="">--Seleccione--</option>
            <?php
            $controladorPlan = new ControladorPlan();
            $planes = $controladorPlan->listar();
            if (count($planes) > 0) {
              foreach ($planes as $plan) {
                echo '<option value="' . $plan->getPlaId() . '" >' . $plan->getPlaNombre() . '</option>';
              }
            }
            ?>
          </select>
        </div>
        <div class="col-15">
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
      </form>
    </nav>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>