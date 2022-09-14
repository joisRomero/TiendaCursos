<?php 
include_once '../modelos/usuario.php';
include_once 'sesionUsuario.php';


session_start();
ob_start();

if (isset($_SESSION['usuario'])) {
    header("location:../vistas/usuario.php");
} 

if(isset($_POST['nombreUsuario']) && isset($_POST['clave'])) {
    $sesionUsuario = new SesionUsuario();
    $usuario = new Usuario();
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