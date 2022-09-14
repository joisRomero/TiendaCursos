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
    <title>TODO-CURSO</title>
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

  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
  <body data-spy="scroll" data-target="#main-navbar">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="main-navbar">
      <div class="container">
        <a class="navbar-brand text-info font-weight-bold" href="index.php">TODO-CURSO</a>
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
              <a class="nav-link" href="#cursos">Cursos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#nostros">Nostros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#acercaDe">Acerca de</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contactanos">Contactanos</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link font-weight-bold" href="iniciarSesion.php">Iniciar sesión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="section-hero">
      <div class="container">
        <div class="row text-center">
          <div
            class="col-lg-6 d-flex align-items-center justify-content-center pb-5 text-white"
          >
            <div class="box-text">
              <h1 class="display-4">Los mejores cursos</h1>
              <p class="lead">
                Elige entre más de 100 cursos de tecnología en línea para desarrollar y mejorar tus habilidades o para aprender desde cero.
              </p>
              <hr class="my-4" />
              <p>"Cada logro comienza con la decisión de intentarlo"</p>
              <p>- Gail Devers</p>
              <a href="../vistas/iniciarSesion.php" class="btn btn-info" ></i> INICIAR SESIÓN</a>
              <a href="../vistas/cursos.html" class="btn btn-info">VER CURSOS</a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="box-image">
              <img
                src="assets/dist/img/Educacion.svg"
                alt=""
                width="70%"
                height="100%"
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-cursos text-white" id="cursos">
      <div class="container">
        <h2 class="display-4 text-center mb-5">Nuestros últimos cursos</h2>

        <div class="row">
          <!-- WHILE  -->
          <div class="col-12 col-md-4 mb-2">
            <div class="card bg-dark ultimo-curso h-100">
              <img
                src="assets/dist/img/kotlin-android.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Arquitectura de Android con Kotlin</h5>
                <p class="card-text">
                  Las aplicaciones móviles ya no son fáciles, y eso se debe a que proyectos más sólidos nacen de una idea Mobile First. Normalmente las [...]
                </p>
                <a href="#" class="btn btn-primary">Ver más</a>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-4 mb-2">
            <div class="card bg-dark ultimo-curso h-100">
              <img
                src="assets/dist/img/html-css-js.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Desarrollo web HTML, CSS y JS</h5>
                <p class="card-text">
                  Aprende Desarrollo Web con este curso 100% práctico, paso a paso y sin conocimientos previos. INCLUYEN 3 Proyectos que [...]
                </p>
                <a href="#" class="btn btn-primary">Ver más</a>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 mb-2">
            <div class="card bg-dark ultimo-curso h-100">
              <img
                src="assets/dist/img/sqlserver.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Microsoft SQL Server</h5>
                <p class="card-text">
                  Mejora tus habilidades analíticas comerciales con SQL y visualización de datos. Aprenderás a crear consultas complejas para [...]
                </p>
                <a href="#" class="btn btn-primary">Ver más</a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="d-flex col-md-12">
            <a
              href="cursos.html"
              class="btn-custon btn btn-primary btn-block btn-lg mt-3 ml-auto"
              >Ver todos</a
            >
          </div>
        </div>
      </div>
    </section>

    <section class="section-nostros" id="nostros">
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-6 mb-5">
            <div class="box-image">
              <img
                src="assets/dist/img/Educacion2.svg"
                alt=""
                width="80%"
                height="100%"
              />
            </div>
          </div>
          <div
            class="col-lg-6 d-flex align-items-center justify-content-center pl-5 text-white text-left"
          >
            <div class="box-text">
              <h3 class="display-4">Nosotros</h3>
              <p class="lead">
                En <b>TODO-CURSO</b> llevamos más de 10 años ofreciendo formación en las áreas de Gestión Empresarial, Tecnología, Negocio Digital, Idiomas y Empresa saludable. 
              </p>
              <hr class="my-4" />
              <h3 class="display-4">Misión</h3>
              <p class="lead">
                Ofrecer nuestros servicios de formación, consultoría y gestión de bonificación de manera global, pero personalizada a su vez, con calidad, flexibilidad e innovación, para favorecer que nuestros clientes puedan asumir los nuevos retos y desafíos producidos por la continua evolución del mercado empresaria
              </p>
              <hr class="my-4" />
              <h3 class="display-4">Visión</h3>
              <p class="lead">
                Queremos ser la empresa de referencia en el ámbito de la formación y consultoría en Habilidades, Tecnología, Idiomas, Transformación Digital y Empresa Saludable.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-acercaDe text-white" id="acercaDe">
      <div class="container">
        <div class="text-center">
          <h2 class="display-4">Nuestros docentes</h2>
          <p class="lead">Tenemos los mejores docentes.</p>
        </div>
        <div class="row row-cols-1 row-cols-md-4">
          <div class="col mb-4">
            <div class="card bg-dark">
              <img
                src="https://i.postimg.cc/1gd5jxc8/male01.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Rodrigo Rojas</h5>
                <p class="card-text">
                  Senior Analyst Corporate en Interbank. Ingeniero de Sistemas de la Universidad Nacional Mayor de San Marcos con Colegiatura en el Colegio de Ingenieros del Perú. Docente en la Universidad Tecnológica del Perú.
                </p>
              </div>
            </div>
          </div>
          <div class="col mb-4">
            <div class="card bg-dark">
              <img
                src="https://i.postimg.cc/6yVq5mwP/female01.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Stephanie Oliva</h5>
                <p class="card-text">
                  Docente de Inglés de la Universidad del Pacífico, doblemente certificado por la Universidad Católica del Perú y Miami Dade College. CI vigentes: TOEFL , TOEIC , FCE & CAE. Con experiencia de 12 años dictando cursos de idiomas en Insititutos y Universidades de renombre.
                </p>
              </div>
            </div>
          </div>
          <div class="col mb-4">
            <div class="card bg-dark">
              <img
                src="https://i.postimg.cc/KRbcVDLD/male05.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Daniel Alarcón</h5>
                <p class="card-text">
                  Senior Backend Engineer con especialidad en NodeJs. Senior Software Developer. Catedrático desde 2010 de la Universidad Nacional de Ingeniería.
                </p>
              </div>
            </div>
          </div>
          <div class="col mb-4">
            <div class="card bg-dark">
              <img
                src="https://i.postimg.cc/XZqYLNFM/female03.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Victoria López</h5>
                <p class="card-text">
                  Magister Frontend Developer en Blum, especialista en ReactJs y sus respectivas librerías y frameworks, Más de 8 años en trabajos de desarrollo web, con experiencia en proyectos personales y grupales.
                </p>
              </div>
            </div>
          </div>
          <div class="col mb-4">
            <div class="card bg-dark">
              <img
                src="https://i.postimg.cc/GTFLt40D/male03.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Oscar Pérez</h5>
                <p class="card-text">
                  Docente en computación, diseño gráfico y programación en la Universidad San Martín de Porres de Lima. Magister en Educación de la Universidad Privada del Norte. Con más de 10 años de experiencia Laboral.
                </p>
              </div>
            </div>
          </div>
          <div class="col mb-4">
            <div class="card bg-dark">
              <img
                src="https://i.postimg.cc/68YQC48L/female02.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Ana Sandoval</h5>
                <p class="card-text">
                  Consultora SEO/SEM y especialista en marketing digital y gestión de marcas experiencia en áreas de publicidad digital, analítica web y comunicación. Entusiasta de la tecnología y activo del movimiento de las noticias en social media.
                </p>
              </div>
            </div>
          </div>
          <div class="col mb-4">
            <div class="card bg-dark">
              <img
                src="https://i.postimg.cc/qgyMj5t7/male04.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Carlos Flores</h5>
                <p class="card-text">
                  Senior Deep Learning Engineer en NVIDIA. Doctor en la Universidad de California, Santa Cruz. Profundamente arraigado y fascinado por el aprendizaje automático y sus aplicaciones. Actualmente, Catedrático en University North Caroline.
                </p>
              </div>
            </div>
          </div>
          <div class="col mb-4">
            <div class="card bg-dark">
              <img
                src="https://i.postimg.cc/hz7PFCpp/female04.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Marcela Olivos</h5>
                <p class="card-text">
                  Especialista en Diseño de Experiencia de Usuario (UX) en Diseño de logotipos, Diseño de marcas, Diseño gráfico, Diseño publicitario y Diseño web.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-contactanos text-white" id="contactanos">
      <div class="container">
        <div class="text-center">
          <h2 class="display-4">Contáctanos</h2>
          <p class="lead">
            Si tienes alguna pregunta, siéntete libre de contactarnos.
          </p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div
              class="box-contact-info d-flex h-100 justify-content-center align-items-center"
            >
              <ul class="list-unstyled">
                <li><i class="fas fa-map-marker-alt"></i> Chiclayo, Lambayeque, Perú</li>
                <li><i class="fas fa-phone"></i> 987654321</li>
                <li><i class="fas fa-envelope"></i> cursos@ejemplo.com</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="box-form">
              <form>
                <div class="form-group">
                  <label for="nombre" class="col-form-label">Nombre</label>
                  <input
                    type="text"
                    class="form-control form-propio"
                    id="nombre"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="email" class="col-form-label">Email</label>
                  <input
                    type="email"
                    class="form-control form-propio"
                    id="email"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="telefono" class="col-form-label">Teléfono</label>
                  <input
                    type="tel"
                    class="form-control form-propio"
                    id="telefono"
                  />
                </div>
                <div class="form-group">
                  <label for="mensaje" class="col-form-label">Mensaje</label>
                  <textarea
                    name="mensaje"
                    id="mensaje"
                    rows="5"
                    class="form-control form-propio"
                  ></textarea>
                </div>
                <button
                  type="submit"
                  class="btn btn-outline-info btn-lg btn-block"
                >
                  Enviar
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer text-center text-white">
      <div class="container p-4 pb-0">
        <section>
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-facebook-f"></i
          ></a>
    
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-twitter"></i
          ></a>

          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-google"></i
          ></a>
  
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-instagram"></i
          ></a>

        </section>

      </div>
    
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Copyright:
        <a class="text-white" href="">todo-curso.com</a>
      </div>
    </footer>

    <script>
      $(document).ready(function(){
        $(window).scroll(function(){
          var scroll = $(window).scrollTop();
          if(scroll < 200){
            $('.fixed-top').removeClass('background-scroll-down');
          } else {
            $('.fixed-top').addClass('background-scroll-down');
          }
        })
      })
    </script>

  </body>
</html>
