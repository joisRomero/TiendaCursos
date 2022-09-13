<?php

include_once 'modelos/usuario.php';
include_once 'controladores/sesionUsuario.php';

session_start();
ob_start();

if (isset($_SESSION['usuario'])) {
    $rol = $_SESSION['rol'];
    if ($rol === 'Administrador' || $rol === 'Profesor'){
        header("location:vistas/dashboard.php");
    } else if ($rol === 'Estudiante'){
        header("location:vistas/estudiante.php");
    } 
} else {
    header("location:vistas/index.php");
}