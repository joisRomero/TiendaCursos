<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 ">
    <!-- Brand Logo -->
    <a class="brand-link">
    <img src="assets/dist/img/Logo.png" alt="Logo" class="brand-image " style="opacity: .8">
        <span class="brand-text text-info font-weight-bold">TODO-CURSOS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a class="item nav-link active cursor-pointer" onclick="CargarContenido('inicio.php', 'content-wrapper')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Tablero principal
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="item nav-link cursor-pointer">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Académica
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item" onclick="CargarContenido('formacionAcademica.php', 'content-wrapper')">
                            <a class="item nav-link cursor-pointer">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Formación académica</p>
                            </a>
                        </li>
                        <li class="nav-item" onclick="CargarContenido('tipoFormacion.php', 'content-wrapper')">
                            <a class="item nav-link cursor-pointer">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tipo</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" onclick="CargarContenido('estudiantes.php', 'content-wrapper')">
                    <a class="item nav-link cursor-pointer">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Estudiantes
                        </p>
                    </a>
                </li>
                <li class="nav-item" onclick="CargarContenido('profesores.php', 'content-wrapper')">
                    <a class="item nav-link cursor-pointer">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Profesores
                        </p>
                    </a>
                </li>
                <li class="nav-item" onclick="CargarContenido('usuarios.php', 'content-wrapper')">
                    <a class="item nav-link cursor-pointer">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Usuarios
                        </p>
                    </a>
                </li>
                <li class="nav-item" onclick="CargarContenido('reportes.php', 'content-wrapper')">
                    <a class="item nav-link cursor-pointer">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Reportes
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    $(".item").on("click", function() {
        $(".item").removeClass("active");
        $(this).addClass("active");
    });
</script>