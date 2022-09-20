<?php
include_once '../modelos/usuario.php';
include_once 'sesionUsuario.php';
$sesionUsuario = new SesionUsuario();
$usuario = new Usuario();
$sesionUsuario->cerrarSesion();
header("location:../index.php");
