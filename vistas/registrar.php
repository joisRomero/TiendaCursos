<?php
include_once '../modelos/conexion.php';


if (isset($_POST['registrarme'])) {
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $clave02 = $_POST['clave02'];
    $nombreUsuario = $_POST['nombreUsuario'];
    $nombreEstudiante = $_POST['nombreEstudiante'];
    $aprellidosEstudiante = $_POST['apellidosEstudiante'];

    if (
        !empty($correo) && !empty($clave) && !empty($clave02) && !empty($nombreUsuario) &&
        !empty($nombreEstudiante) && !empty($aprellidosEstudiante)
    ) {
        if (strlen($clave) >= 8 && strlen($clave02) >= 8) {
            if ($clave == $clave02) {
                try {
                    $img = 'assets/dist/img/profile/profile.svg';
                    $con = Conexion::conectar();
                    $con->beginTransaction();
                    $s_registrarUsuario = "INSERT INTO usuario(id_usu,nombre_usu, clave_usu, img_usu, rol_usu, vigencia_usu)
                                        VALUES(NULL,'$nombreUsuario', '$clave', '$img', 'E', '1')";

                    if ($con->query($s_registrarUsuario)) {
                        $idUsuario = $con->lastInsertId();
                    } else {
                        $mensaje = "Error. Intelelo de nuevo";
                    }

                    $s_registrarEstudiante = "INSERT INTO estudiante(nombre_estu, apellidos_estu, correo_estu, vigente_estu, id_usu)
                                          VALUES('$nombreEstudiante', '$aprellidosEstudiante', '$correo', '1', $idUsuario)";

                    if (!$con->query($s_registrarEstudiante)) {
                        $mensaje = "Error. Intelelo de nuevo";
                    }

                    $con->commit();
                    session_start();
                    ob_start();
                    $_SESSION['usuario'] = $nombreUsuario;
                    $_SESSION['rol'] = 'Estudiante';
                    header("location:index.php");
                } catch (Exception $e) {
                    if ($con->errorCode() == 23000) {
                        $mensaje = "Ingrese otro nombre de usuario";
                    }
                    $con->rollback();
                }
            } else {
                $mensaje = "Las contraseñas tienen que ser iguales";
            }            
        } else {
            $mensaje = "La contraseña tiene que tener mas de ocho carateres";
        }
    } else {
        $mensaje = "Todos los campos son obligatorios";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />

    <link rel="stylesheet" href="assets/dist/css/styles.css" />
    <title>Registrar</title>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</head>

<body data-spy="scroll" data-target="#main-navbar">
    <nav class="navbar navbar-iniciarSesion navbar-expand-lg navbar-dark bg-dark fixed-top" id="main-navbar">
        <div class="container">
            <a class="navbar-brand text-info font-weight-bold" href="index.php">TODO-CURSO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPrincipal" aria-controls="navbarPrincipal" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarPrincipal">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cursos.php">Cursos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="section-registrar text-white">
        <div class="container">
            <div class="col-lg-7 mx-auto">
                <div class="box-form">
                    <form class="registro" action="" method="POST">
                        <legend class="text-center">Regístrate para acceder a nuestros más de 100 Cursos Online</legend>
                        <div class="contenedor-campos">
                            <div class="form-group">
                                <label for="correo" class="col-form-label">¿Cuál es tu correo electrónico?</label>
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="Escribe tu correo electrónico" value="<?php if(isset($mensaje)) echo $correo; ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">Crea una contraseña</label>
                                <input type="password" class="form-control" id="password" name="clave" placeholder="Crea una contraseña" required />
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">Confirmar contraseña</label>
                                <input type="password" class="form-control" id="password" name="clave02" placeholder="Crea una contraseña" required />
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-form-label">Crea un nombre de usuario</label>
                                <input type="text" class="form-control" id="user" name="nombreUsuario" placeholder="Crea un nombre de usuario" required  />
                                <p>Esto aparece en tu perfil</p>
                            </div>
                            <div class="form-group">
                                <label for="nombre" class="col-form-label">¿Cuál es tu nombre?</label>
                                <input type="text" class="form-control" id="nombre" name="nombreEstudiante" placeholder="Escribe tu nombre" value="<?php if(isset($mensaje)) echo $nombreEstudiante; ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="apellidosEstudiante" class="col-form-label">¿Cuáles son tus apellidos?</label>
                                <input type="text" class="form-control" id="apellidosEstudiante" name="apellidosEstudiante" placeholder="Escribe tus apellidos" value="<?php if(isset($mensaje)) echo $aprellidosEstudiante; ?>" require />
                            </div>
                        </div>

                        <?php
                        if (isset($mensaje)) {
                            echo "<p class='badge badge-danger'>" . $mensaje . "</p><br>";
                        }
                        ?>

                        <div class="enviar">
                            <input type="submit" class="btn btn-outline-info btn-lg btn-block" value="Registrarme" name="registrarme">
                        </div>

                       

                        <div class="text-center mt-3">
                            <p class="d-inline">¿Ya tienes cuenta?</p>
                            <a href="iniciarSesion.php">Inicia Sesión.</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer text-center text-white">
        <div class="container p-3 pb-0">
            <section>
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>

                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>

            </section>

        </div>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-white" href="">todo-curso.com</a>
        </div>
    </footer>

</body>

</html>