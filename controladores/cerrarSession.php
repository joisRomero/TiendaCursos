<?php
include_once '../modelos/usuario.php';
include_once 'sesionUsuario.php';
$sesionUsuario = new SesionUsuario();
$usuario = new Usuario();
session_start();
ob_start();
$sesionUsuario->cerrarSesion();
header("location:../index.php");
