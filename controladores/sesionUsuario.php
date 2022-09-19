<?php

class SesionUsuario {

    public function __construct()
    {
        session_start();
        ob_start();
    }

    public function setUsuarioACtual($usuario, $rol)  
    {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = $rol;
    }

    public function getUsuarioActual()
    {
        return $_SESSION['usuario'];
    }

    public function cerrarSesion()
    {
        session_unset();
        session_destroy();
    }
}