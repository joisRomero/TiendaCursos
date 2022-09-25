<?php
include '../controladores/estudiante.php';
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
    <title>Estudiante</title>
</head>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/0d608ff7c1.js" crossorigin="anonymous"></script>

<body>
    <nav class="navbar navbar-iniciarSesion navbar-expand-lg navbar-dark bg-dark fixed-top" id="main-navbar">
        <div class="container">
            <a class="navbar-brand text-info font-weight-bold" href="plantillaEstudiante.php">TODO-CURSO</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPrincipal" aria-controls="navbarPrincipal" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarPrincipal">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="cursos.php">Cursos</a>
                    </li>
                    <li class="nav-item dropdown no-arrow active">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small font-weight-bold"><?php echo $usuario->getNombre(); ?></span>
                            <img class="rounded-circle" width="25px" height="25px" src="<?php echo $usuario->getImg(); ?>">
                        </a>
                        <!-- Dropdown - User Information -->
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
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="section-estudiante text-white">
        <div class="container">
            <p class="display-4 mt-5">Tus aprendizajes</p>
            <hr class="my-4 bg-white" />
            <div class="row row-cols-1 row-cols-md-3">
                <?php
                while ($fila = mysqli_fetch_array($r_formaciones)) {
                    $limit = limitarCadena($fila['descripcion_forma'], 150, "[...]");
                    echo '<div class="col mb-4">
                                <div class="card bg-dark h-100 ultimo-curso">
                                    <img src="' . $fila['img'] . '" class="card-img-top" alt="..." />
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            ' . $fila['nombre_forma'] . '
                                        </h5>
                                        <p class="card-text">
                                            ' . $limit . '
                                        </p>
                                        <a href="verMasCurso.php?id='.$fila['id_forma'].'" class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>';
                }
                ?>
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