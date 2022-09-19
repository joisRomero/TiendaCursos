<?php
include_once '../modelos/usuario.php';
include_once '../controladores/sesionUsuario.php';
$sesionUsuario = new SesionUsuario();
$usuario = new Usuario();
$usuario->setearUsuario($sesionUsuario->getUsuarioActual());
// if (!isset($_SESSION['usuario'])) {
//     header("location:../vistas/index.php");
// }