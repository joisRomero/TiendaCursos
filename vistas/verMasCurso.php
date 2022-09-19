<?php

include_once '../modelos/usuario.php';
include_once '../controladores/sesionUsuario.php';

$usuario = new Usuario();
$sesionUsuario = new SesionUsuario();
$existeUsuario = 0;
if (isset($_SESSION['usuario'])) {
  $user = $_SESSION['usuario'];
  $usuario->setearUsuario($user);
  $existeUsuario = 1;
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  if(!empty($id)){
    $con = new Conexion();
    $s_formacion = "SELECT fa.id_forma, fa.nombre_forma, fa.descripcion_forma,
                    fa.aprendizaje_forma, fa.duracion_forma, fa.precio_forma,fa.vigente_forma,
                    fa.img, concat(p.nombre_pro,' ',p.apPater_pro,' ' ,p.apMater_pro) as
                    nombreProfesor, p.descripcion_pro, p.img as imagenProfesor
                    FROM formacion_academica as fa
                    INNER JOIN profesor as p
                    on p.id_pro = fa.id_pro
                    WHERE id_forma =$id"; 
    
    $r_formacion = mysqli_query($con->conexion(), $s_formacion);
    
    while ($fila = mysqli_fetch_array($r_formacion)) {
      $titulo = $fila['nombre_forma'];
      $img = $fila['img'];
      $descripcion = $fila['descripcion_forma'];
      $aprendisaje = $fila['aprendizaje_forma'];
      $precio = $fila['precio_forma'];
      $duracion = $fila['duracion_forma'];
      $vigencia = $fila['vigente_forma'];
      $nombreProfesor = $fila['nombreProfesor'];
      $descripcionPro = $fila['descripcion_pro'];
      $imagenProfesor = $fila['imagenProfesor'];
    }

    if($vigencia == 0){
      header("location:404.html");
    }
  } else {
    header("location:404.html");
  }
} else {
  header("location:404.html");
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
  <title>Iniciar sesión</title>
</head>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

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
          <li class="nav-item active">
            <a class="nav-link" href="cursos.php">Cursos</a>
          </li>
          <?php 
            if($existeUsuario == 1){
              echo '<li class="nav-item dropdown no-arrow active">
                      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="mr-2 d-none d-lg-inline text-gray-600 small font-weight-bold">'.$usuario->getNombre().'</span>
                          <img class="rounded-circle" width="25px" height="25px" src="'.$usuario->getImg().'">
                      </a>
                      <!-- Dropdown - User Information -->
                      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                          <a class="dropdown-item" href="404.html">
                              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                              Perfil
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="../controladores/cerrarSession.php">
                              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                              Cerrar Sesión
                          </a>
                      </div>
                    </li>';
            } else {
              echo '<li class="nav-item active">
                    <a class="nav-link font-weight-bold" href="iniciarSesion.php">Iniciar sesión</a>
                  </li>';
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <section class="section-verMasCurso">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 text-white">
          <h2 class="h1"><?php if(isset($titulo)) echo $titulo; ?></h2>
          <p class="lead">
            <?php if(isset($descripcion)) echo $descripcion; ?>
          </p>
          <p class="h2 mt-5">¿Qué aprenderás?</p>
          <hr class="my-4 bg-white" />
          <p class="lead">
            <?php if(isset($aprendisaje)) echo $aprendisaje; ?>
          </p>
          <p class="h2 mt-5">¿Quién será tu profesor?</p>
          <hr class="my-4 bg-white" />
          <div class="row">
            <div class="col-lg-4">
              <img src="<?php if(isset($imagenProfesor)) echo $imagenProfesor; ?>" alt="..." />
            </div>
            <div class="col-lg-8">
              <h3 class="card-title"><?php if(isset($nombreProfesor)) echo $nombreProfesor; ?></h3>
              <p class="lead">
                <?php if(isset($descripcionPro)) echo $descripcionPro; ?>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="col mb-4">
            <div class="card bg-dark h-100 ultimo-curso text-white fixed">
              <img src="<?php if(isset($img)) echo $img; ?>" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title"><?php if(isset($titulo)) echo $titulo; ?></h5>
                <p class="h3 text-center mb-4">Precio: $<?php if(isset($precio)) echo $precio; ?></p>
                <a href="#" class="btn btn-success d-block">Comprar ahora</a>
              </div>
            </div>
          </div>

          <div class="col mb-4">
            <div class="card bg-dark h-100 ultimo-curso text-white fixed">
              <div class="card-body">
                <p class="h5 card-title">Detalles:</>
                <p class="mb-0">- Duración: <?php if(isset($duracion)) echo $duracion; ?> horas</p>
                <p class="mb-0">- Recursos descargables</p>
                <p class="mb-0">- Articulos</p>
                <p class="mb-0">- Acceso de por vida</p>
                <p class="mb-0">- Certificación</p>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

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