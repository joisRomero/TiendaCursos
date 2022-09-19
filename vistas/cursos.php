<?php

include_once '../modelos/usuario.php';
include_once '../controladores/sesionUsuario.php';

$usuario = new Usuario();
$sesionUsuario = new SesionUsuario();
$existeUsuario = 0;
$idEstudiante = -1;
if (isset($_SESSION['usuario'])) {
  $user = $_SESSION['usuario'];
  $usuario->setearUsuario($user);
  $existeUsuario = 1;

  $con = new Conexion();
  $idUsur = $usuario->getId();
  $s_estudiante = "SELECT * FROM estudiante WHERE id_usu = $idUsur";
  $r_estudiante = mysqli_query($con->conexion(), $s_estudiante);
  while ($fila = mysqli_fetch_array($r_estudiante)) {
    $idEstudiante = $fila['id_estu'];
  }
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
  <link rel="stylesheet" href="assets/dist/css/estilos.css">
  <link rel="stylesheet" href="assets/dist/css/styles.css" />
  <title>Cursos</title>
</head>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="assets/plugins/jquery/jquery.min.js"></script>

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

          <?php
          if ($existeUsuario == 1) {
            echo '<li class="nav-item dropdown no-arrow active">
                      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="mr-2 d-none d-lg-inline text-gray-600 small font-weight-bold">' . $usuario->getNombre() . '</span>
                          <img class="rounded-circle" width="25px" height="25px" src="' . $usuario->getImg() . '">
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

  <section class="section-todosCursos text-white">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-2">
          <nav class="nav flex-column nav-cursos mb-3" id="tipoFormacionAcademica">
          </nav>
        </div>
        <div class="col-lg-10">
          <div class="row row-cols-1 row-cols-md-3" id="contenedor">



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

<script>
  let tipos;
  let formacionesAcademicas;

  function CargarContenido(id) {
    var formaAca = [];
    $('#contenedor').html(formaAca);
    for (let i = 0; i < formacionesAcademicas.length; i++) {
      if (formacionesAcademicas[i][3] == id || id == -1) {
        var des = formacionesAcademicas[i][2].substring(0, 150);
        var forma = `<div class="col mb-4">
                        <div class="card bg-dark h-100 ultimo-curso">
                        <img src="${formacionesAcademicas[i][4]}" class="card-img-top"/>
                        <div class="card-body">
                          <h5 class="card-title">
                            ${formacionesAcademicas[i][1]}
                          </h5>
                          <p class="card-text">
                            ${des +"[...]"}
                          </p>
                          <a href="verMasCurso.php?id=${formacionesAcademicas[i][0]}" class="btn btn-primary">Ver más</a>
                        </div>
                        </div>
                      </div>`;
        formaAca.push(forma);
      }

    }
    $('#contenedor').html(formaAca);

  }

  $(document).on('click', '.nav-link', function() {
    $(this).addClass('activo').siblings().removeClass('activo');
  });

  $(document).ready(function() {
    let idEstudiante = <?php echo $idEstudiante ?>;
    let accion;
    var datos = new FormData();

    if (idEstudiante == -1) {
      accion = 5;
      datos.append('accion', accion);
    } else {
      accion = 6;
      datos.append('accion', accion);
      datos.append("idEstudiante", idEstudiante);
    }

    $.ajax({
      url: "../ajax/tipoFormacion.ajax.php",
      type: "POST",
      data: {
        'accion': 3
      },
      dataType: 'json',
      success: function(respuesta) {
        tipos = respuesta;
        var opciones = [];
        opciones.push(`<a class='nav-link activo cursor-pointer' onclick="CargarContenido('${-1}')">Todos</a>`);
        for (let index = 0; index < respuesta.length; index++) {
          opciones.push(`<a class="nav-link cursor-pointer" onclick="CargarContenido('${respuesta[index][0]}')">${respuesta[index][1]}</a>`);
        }
        $('#tipoFormacionAcademica').html(opciones);
      }
    });

    $.ajax({
      url: "../ajax/formacionAcademica.ajax.php",
      type: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(respuesta) {
        formacionesAcademicas = respuesta;
        var formaAca = [];
        for (let i = 0; i < respuesta.length; i++) {
          var des = respuesta[i][2].substring(0, 150);
          var forma = `<div class="col mb-4">
                        <div class="card bg-dark h-100 ultimo-curso">
                        <img src="${respuesta[i][4]}" class="card-img-top"/>
                        <div class="card-body">
                          <h5 class="card-title">
                            ${respuesta[i][1]}
                          </h5>
                          <p class="card-text">
                            ${des +"[...]"}
                          </p>
                          <a href="verMasCurso.php?id=${respuesta[i][0]}" class="btn btn-primary">Ver más</a>
                        </div>
                        </div>
                      </div>`;
          formaAca.push(forma);
        }
        $('#contenedor').html(formaAca);
      }
    });
  });
</script>


</html>