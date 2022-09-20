<?php 
  include '../controladores/iniciarSesion.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="assets/dist/css/styles.css" />
    <title>Iniciar sesión</title>
  </head>
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script
    src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"
  ></script>

  <script
    defer
    src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
    integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
    crossorigin="anonymous"
  ></script>
  <body data-spy="scroll" data-target="#main-navbar">
    <nav
      class="navbar navbar-iniciarSesion navbar-expand-lg navbar-dark bg-dark fixed-top"
      id="main-navbar"
    >
      <div class="container">
        <a class="navbar-brand text-info font-weight-bold" href="index.php"
          >TODO-CURSO</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarPrincipal"
          aria-controls="navbarPrincipal"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
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

    <section class="section-login text-white">
      <h2 class="text-center display-4">¡Bienvenido de nuevo!</h2>

      <section class="">
        <div class="container-fluid h-custom">
          <div
            class="row d-flex justify-content-center align-items-center h-100"
          >
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img
                src="assets/dist/img/login.webp"
                class="img-fluid"
              />
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form  method="POST">
                <div class="form-outline mb-4">
                  <label class="form-label" for="nombreUsuarios"
                    >Nombre de usuario</label
                  >
                  <input
                    type="text"
                    id="nombreUsuario"
                    name="nombreUsuario"
                    class="form-control form-control-lg"
                    placeholder="Ingrese su nombre de usuario"
                    required
                  />
                </div>

                <div class="form-outline mb-3">
                  <label class="form-label" for="clave">Contraseña</label>
                  <input
                    type="password"
                    id="clave"
                    name="clave"
                    class="form-control form-control-lg"
                    placeholder="Ingrese su contraseña"
                    required
                  />
                </div>

                <?php 
                  if(isset($errorLogin)){
                    echo "<p class='badge badge-danger'>".$errorLogin."</p>";
                  }
                ?>

                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-lg px-5">
                    Ingresar
                  </button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">
                    ¿No tienes una cuenta?
                    <a href="registrar.php" class="link-danger">Registrarse</a>
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </section>

    <footer class="footer text-center text-white">
      <div class="container p-4 pb-0">
        <section>
          <a
            class="btn btn-outline-light btn-floating m-1"
            href="#!"
            role="button"
            ><i class="fab fa-facebook-f"></i
          ></a>

          <a
            class="btn btn-outline-light btn-floating m-1"
            href="#!"
            role="button"
            ><i class="fab fa-twitter"></i
          ></a>

          <a
            class="btn btn-outline-light btn-floating m-1"
            href="#!"
            role="button"
            ><i class="fab fa-google"></i
          ></a>

          <a
            class="btn btn-outline-light btn-floating m-1"
            href="#!"
            role="button"
            ><i class="fab fa-instagram"></i
          ></a>
        </section>
      </div>

      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2022 Copyright:
        <a class="text-white" href="">todo-curso.com</a>
      </div>
    </footer>
  </body>
</html>
