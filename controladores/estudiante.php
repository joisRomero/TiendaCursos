<?php
include_once '../modelos/usuario.php';
include_once '../controladores/sesionUsuario.php';
$sesionUsuario = new SesionUsuario();
$usuario = new Usuario();
session_start();
ob_start();
$usuario->setearUsuario($sesionUsuario->getUsuarioActual());
// if (!isset($_SESSION['usuario'])) {
//     header("location:../vistas/index.php");
// }