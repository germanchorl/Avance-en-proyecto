<!doctype html>
<?php
include_once '../../Modelo/Persona.php';
include_once '../../Modelo/Conexion.php';
include_once '../../Controlador/ControladorPersona.php';
include_once '../../Modelo/Plan.php';
?>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Nuestros miembros</title>
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
        <kbd>Personas inscritas BodyGym</kbd>
        </h1>
      </div>
    </div>

    <div class="row">
      <div class="col-md-10 offset-md-1">
        <nav class="navbar navbar-light" style="background-color: #A193FA;">
          <table class="table table-bordered">
            <thead>
              <tr>
                <td>Tipo Documento</td>
                <td>Id</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>Email</td>
                <td>Edad</td>
                <td>Altura</td>
                <td>Peso</td>
                <td>IMC</td>
                <td>Plan</td>
                <td>Acciones</td>
              </tr>
            </thead>
            <tbody>
              <?php
              $ControladorPersona = new ControladorPersona();
              $Miembros = $ControladorPersona->Read();
              foreach ($Miembros as $persona) {
              ?>
                <tr>
                  <td>
                    <?php echo $persona->getPerTipoDoc() ?>
                  </td>
                  <td>
                    <?php echo $persona->getPerId() ?>
                  </td>
                  <td>
                    <?php echo $persona->getPerNombres() ?>
                  </td>
                  <td>
                    <?php echo $persona->getPerApellidos() ?>
                  </td>
                  <td>
                    <?php echo $persona->getPerEmail() ?>
                  </td>
                  <td>
                    <?php echo $persona->getPerEdad() ?>
                  </td>
                  <td>
                    <?php echo $persona->getPerAltura() ?>
                  </td>
                  <td>
                    <?php echo $persona->getPerPeso() ?>
                  </td>
                  <td>
                    <?php echo $persona->getPerIMC() ?>
                  </td>
                  <td>
                    <?php echo $persona->getPlan()->getPlaNombre() ?>
                  </td>
                  <td>
                    <div class="row">
                      <div class="col text-center">
                        <a class="btn btn-warning" href="FormularioEditarPersona.php?per_id=<?php echo $persona->getPerId() ?>">Editar</a>
                      </div>
                      <div class="col text-center">
                        <a class="btn btn-danger" href="FormularioEliminarPersona.php?per_id=<?php echo $persona->getPerId() ?>">Eliminar</a>
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
    <div class="col">
      <a class="btn btn-primary" href="../plan/ListarPlan.php">Listado de planes</a>
    </div>
  </div>

</body>

</html>