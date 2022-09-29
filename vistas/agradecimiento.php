<?php

include_once '../modelos/usuario.php';
include_once '../controladores/sesionUsuario.php';
$usuario = new Usuario();
$sesionUsuario = new SesionUsuario();
if (isset($_SESSION['usuario'])) {
  $user = $_SESSION['usuario'];
  $usuario->setearUsuario($user);
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
  <title>Agradecimiento</title>
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
          <li class="nav-item active">
            <a class="nav-link" href="cursos.php">Cursos</a>
          </li>
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

    <div class="col-md-7">
      
      <div class="card">
        <div class="bg-success py-5 px-5 text-center">
          <img src="assets/dist/img/like.png" class="card-img-top" style="width: 18rem;">
        </div>
        <div class="card-body text-center">
          <h5 class="h2">¡Gracias por tu compra!</h5>
          <p class="card-text">En <b>TODO-CURSO</b> nos sentimos muy contentos por su elección.</p>
          <a href="index.php" class="btn btn-primary">Ir a mi perfil</a>
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