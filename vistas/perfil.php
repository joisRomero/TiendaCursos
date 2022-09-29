<?php

include_once '../modelos/usuario.php';
include_once '../controladores/sesionUsuario.php';
$usuario = new Usuario();
$sesionUsuario = new SesionUsuario();
if (isset($_SESSION['usuario'])) {
  $user = $_SESSION['usuario'];
  $usuario->setearUsuario($user);

  if ($usuario->getRol() == "Estudiante") {
    $con = new Conexion();
    $idUsur = $usuario->getId();
    $s_estudiante = "SELECT * FROM estudiante WHERE id_usu = $idUsur";
    $r_estudiante = mysqli_query($con->conexion(), $s_estudiante);
    while ($fila = mysqli_fetch_array($r_estudiante)) {
      $idEstudiante = $fila['id_estu'];
      $nombreEstudiate = $fila['nombre_estu'];
      $apellidoEstudiate = $fila['apellidos_estu'];
      $correoEstudiante = $fila['correo_estu'];
    }
  }

  if (isset($_POST['actualizarAvatar'])) {
    $avatar = $_POST['avatar'];
    if (!empty($avatar)) {
      if ($avatar == 1) {
        $rutaAvatar = "assets/dist/img/profile/profile.svg";
      } else if ($avatar == 2) {
        $rutaAvatar = "assets/dist/img/profile/profile_1.svg";
      } else if ($avatar == 3) {
        $rutaAvatar = "assets/dist/img/profile/profile_2.svg";
      } else if ($avatar == 4) {
        $rutaAvatar = "assets/dist/img/profile/profile_3.svg";
      } else if ($avatar == 5) {
        $rutaAvatar = "assets/dist/img/profile/rocket.svg";
      }
      $con = new Conexion();
      $idUsur = $usuario->getId();
      $s_cambioAvatar = "UPDATE usuario SET img_usu = '$rutaAvatar' WHERE id_usu = $idUsur";
      $r_cambioAvatar = mysqli_query($con->conexion(), $s_cambioAvatar);
      header("Location: perfil.php");
    }
  }

  if (isset($_POST['actualizarClave'])) {
    $claveActual = $_POST['claveActual'];
    $claveNueva = $_POST['claveNueva'];

    if (!empty($claveActual) && !empty($claveNueva)) {
      $con = new Conexion();
      $idUsur = $usuario->getId();
      $s_claveActual = "SELECT clave_usu FROM usuario WHERE id_usu = $idUsur";
      $r_claveActual = mysqli_query($con->conexion(), $s_claveActual);
      while ($fila = mysqli_fetch_array($r_claveActual)) {
        $actualClave = $fila[0];
      }
      if($actualClave == $claveActual){
        if (strlen($claveNueva) >= 8){
          $s_claveNueva = "UPDATE usuario SET clave_usu = '$claveNueva' WHERE id_usu = $idUsur";
          $r_claveNueca = mysqli_query($con->conexion(), $s_claveNueva);
        }else {
          $mensaje = "La contraseña debe tener como mínimo 8 caracteres";
        }
      } else {
        $mensaje = "Error en la contraseña actual";
      }
    }
  }

  if (isset($_POST['actualizarUsuario'])) {
    $nomEstudiante = $_POST['nomEstudiante'];
    $apEstudiante = $_POST['apEstudiante'];
    $correo = $_POST['correo'];

    if (!empty($nomEstudiante) && !empty($apEstudiante) && !empty($correo)) {
      $con = new Conexion();
      $s_cambiarDatos = "UPDATE estudiante SET nombre_estu = '$nomEstudiante', apellidos_estu = '$apEstudiante', 
                         correo_estu = '$correo' WHERE id_estu = $idEstudiante";
      $r_cambiarDatos = mysqli_query($con->conexion(), $s_cambiarDatos);
      header("Location: perfil.php");
    } else {
      $mensaje = "Todos los datos son obligatorios";
    }
  }
} else {
  header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/dist/css/styles.css" />
  <title>Perfil</title>
  <link rel="shortcut icon" href="assets/dist/img/Logo.png" type="image/x-icon">
</head>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

<body>
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
          <?php if ($usuario->getRol() == "Estudiante") {
            echo '<li class="nav-item active">
                      <a class="nav-link" href="cursos.php">Cursos</a>
                    </li>';
          }
          ?>

          <?php
          echo '<li class="nav-item dropdown no-arrow active">
                      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="mr-2 d-none d-lg-inline text-gray-600 small font-weight-bold">' . $usuario->getNombre() . '</span>
                          <img class="rounded-circle" width="25px" height="25px" src="' . $usuario->getImg() . '">
                      </a>

                      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                          <a class="dropdown-item" href="perfil.php">
                              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                              Perfil
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="../controladores/cerrarSession.php">
                              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                              Cerrar Sesión
                          </a>
                      </div>
                    </li>'
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <div class="seccion-agradecimiento">
    <div class="container">
      <div class="row justify-content-md-center">

        <div class="col-md-10">

          <div class="card">
            <div class="bg-dark py-3 pl-5 pr-3">
              <img src="<?php echo $usuario->getImg() ?>" class="card-img-top none" style="width: 10rem;">
              <h2 class="pl-2 text-white d-inline-block">
                <?php
                if ($usuario->getRol() == "Estudiante") {
                  echo $nombreEstudiate . " " . $apellidoEstudiate;
                } else {
                  echo $usuario->getNombre();
                }
                ?>
              </h2>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-3">
                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php
                    if ($usuario->getRol() == "Estudiante") {
                      echo '<button class="nav-link active" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Personalizar usuario</button>';
                    }
                    ?>
                    <button class="nav-link <?php if ($usuario->getRol() != "Estudiante") echo 'active'; ?>" id="v-pills-profile-tab" data-toggle="pill" data-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Contraseña</button>
                    <button class="nav-link" id="v-pills-messages-tab" data-toggle="pill" data-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Cambiar avatar</button>
                  </div>
                </div>
                <div class="col-9">
                  <div class="tab-content" id="v-pills-tabContent">
                    <?php
                    if ($usuario->getRol() == "Estudiante") {
                      echo '<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                              <form action="" method="POST">
                                <div class="form-group">
                                  <label for="nomEstudiante" class="col-form-label">Nombre</label>
                                  <input type="text" class="form-control form-control-sm" id="nomEstudiante" name="nomEstudiante" value="' . $nombreEstudiate . '" required>
                                </div>
                                <div class="form-group">
                                  <label for="apEstudiante" class="col-form-label">Apellidos</label>
                                  <input type="text" class="form-control form-control-sm" id="apEstudiante" name="apEstudiante" value="' . $apellidoEstudiate . '" required>
                                </div>
                                <div class="form-group">
                                  <label for="correo" class="col-form-label">Correo electrónico</label>
                                  <input type="email" class="form-control form-control-sm" id="correo" name="correo" value="' . $correoEstudiante . '" required>
                                </div>';

                      if (isset($mensaje)) {
                        echo "<p class='badge badge-danger'>" . $mensaje . "</p><br>";
                      }

                      echo '<input type="submit" class="btn btn-primary" value="Actualizar" name="actualizarUsuario" id="actualizarUsuario">
                                </form>
                            </div>';
                    }
                    ?>

                    <div class="tab-pane fade <?php if ($usuario->getRol() != "Estudiante") echo ' show active '; ?>" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                      <form action="" method="POST">
                        <div class="form-group">
                          <label for="password" class="col-form-label">Contraseña actual</label>
                          <input type="password" class="form-control form-control-sm" id="password" name="claveActual" required>
                        </div>
                        <div class="form-group">
                          <label for="password" class="col-form-label">Contraseña nueva</label>
                          <input type="password" class="form-control form-control-sm" id="password" name="claveNueva" required>
                        </div>
                        <?php 
                          if (isset($mensaje)) {
                            echo "<p class='badge badge-danger'>" . $mensaje . "</p><br>";
                          }
                        ?>
                        <input type="submit" class="btn btn-primary" value="Actualizar" name="actualizarClave">
                      </form>
                    </div>

                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                      <form action="" method="POST">
                        <div class="input-group">
                          <div class="radio-contendor">
                            <input type="radio" name="avatar" value="1">
                            <div class="radio-imagen">
                              <img src="assets/dist/img/profile/profile.svg" class="card-img-top none" style="width: 6rem;">
                            </div>
                          </div>

                          <div class="radio-contendor">
                            <input type="radio" name="avatar" value="2">
                            <div class="radio-imagen">
                              <img src="assets/dist/img/profile/profile_1.svg" class="card-img-top none" style="width: 6rem;">
                            </div>
                          </div>

                          <div class="radio-contendor">
                            <input type="radio" name="avatar" value="3">
                            <div class="radio-imagen">
                              <img src="assets/dist/img/profile/profile_2.svg" class="card-img-top none" style="width: 6rem;">
                            </div>
                          </div>

                          <div class="radio-contendor">
                            <input type="radio" name="avatar" value="4">
                            <div class="radio-imagen">
                              <img src="assets/dist/img/profile/profile_3.svg" class="card-img-top none" style="width: 6rem;">
                            </div>
                          </div>

                          <div class="radio-contendor">
                            <input type="radio" name="avatar" value="5">
                            <div class="radio-imagen">
                              <img src="assets/dist/img/profile/rocket.svg" class="card-img-top none" style="width: 4.5rem;">
                            </div>
                          </div>

                        </div>
                        <input type="submit" class="btn btn-primary" value="Actualizar" name="actualizarAvatar">
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <footer class="footer text-center text-white">
    <div class="container p-4 pb-0">
      <section>
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>

        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>
      </section>
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2022 Copyright:
      <a class="text-white" href="">todo-curso.com</a>
    </div>
  </footer>
</body>

</html>