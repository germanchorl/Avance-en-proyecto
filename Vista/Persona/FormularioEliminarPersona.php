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

    <title>Eliminar asociado</title>
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
    <h1 class="text-center" style="font-family:Verdana;">Formulario elimminar asiciado BodyGym</h1>
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
                    <div class="card-title">
                        <div class="row">
                            <div class="col">
                                <h3 class="text-center text-primary">
                                    <?php echo $Persona->getPerId() . " - " . $Persona->getPerNombres() . " " . $Persona->getPerApellidos() ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col">
                                        <h4>Email: </h4>
                                    </div>
                                    <div class="col">
                                        <h4><?php echo $Persona->getPerEmail() ?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4>Edad: </h4>
                                    </div>
                                    <div class="col">
                                        <h4><?php echo $Persona->getPerEdad() ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="EliminarPersona.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input name="codigo" type="hidden" class="form-control" id="codigo" value="<?php echo $Persona->getPerId() ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </div>
                                <div class="col text-center">
                                    <a class="btn btn-success" href="listarPersona.php">Regresar al listado</a>
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