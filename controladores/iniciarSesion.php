<?php 
include_once '../modelos/usuario.php';
include_once 'sesionUsuario.php';


$sesionUsuario = new SesionUsuario();
$usuario = new Usuario();

if (isset($_SESSION['usuario'])) {
    $rol = $_SESSION['rol'];
    if ($rol === 'Administrador'){
        header("location:dashboard.php");
    } else if ($rol === 'Estudiante'){
        header("location:plantillaEstudiante.php");
    } 
} 

if(isset($_POST['nombreUsuario']) && isset($_POST['clave'])) {

    $usuarioForm = $_POST['nombreUsuario'];
    $claveForm = $_POST['clave'];

    if ($usuario->existeUsuario($usuarioForm, $claveForm)){
        $usuario->setearUsuario($usuarioForm);
        $sesionUsuario->setUsuarioACtual($usuarioForm, $usuario->getRol());
        if ($usuario->getRol() === 'Administrador' || $usuario->getRol() === 'Profesor'){
            header("location:../vistas/dashboard.php");
        } else if ($usuario->getRol() === 'Estudiante'){
            header("location:../vistas/plantillaEstudiante.php");
        } 
    } else {
        $errorLogin = 'Nombre de usuario y/o contraseña incorrecto';
    }
}