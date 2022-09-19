<?php

require_once "../controladores/usuario.controlador.php";
require_once "../modelos/usuario.modelo.php";

class ajaxUsuario {

    public $id_usu;
    public $nombre_usu;
    public $clave_usu;
    public $img_usu;
    public $rol_usu;
    public $vigencia_usu;

    //Lista para la tabla
    public function ajaxListarUsuario() {
        $usuario = UsuarioControlador::ctrListarUsuario();
        echo json_encode($usuario);
    }

    //Lista para la ventana modal
    public function ajaxListaUsuario() {
        $usuario = UsuarioControlador::ctrListaUsuario();
        echo json_encode($usuario);
    }

    public function ajaxRegistrarUsuario()
    {
        $usuario = UsuarioControlador::ctrRegistrarUsuario($this->nombre_usu, $this->clave_usu, $this->img_usu, $this->rol_usu);
        echo json_encode($usuario);
    }

    public function ajaxActualizarUsuario()
    {
        $usuario = UsuarioControlador::ctrActualizarUsuario($this->id_usu, $this->nombre_usu, $this->clave_usu, $this->img_usu, $this->rol_usu);
        echo json_encode($usuario);
    }

    public function ajaxCambiarVigenciaUsuario(){

        $usuario = UsuarioControlador::ctrCambiarVigenciaUsuario($this->id_usu, $this->vigencia_usu);
        echo json_encode($usuario);
    }
}

if (isset($_POST['accion']) && $_POST['accion'] == 1) { // Listar
    $usuario = new ajaxUsuario();
    $usuario->ajaxListarUsuario();

} else if (isset($_POST['accion']) && $_POST['accion'] == 2) { // Registrar
    $usuario = new ajaxUsuario();
    $usuario->nombre_usu = $_POST["nombre_usu"];
    $usuario->clave_usu = $_POST["clave_usu"];
    $usuario->img_usu = $_POST["avatar_usu"];
    $usuario->rol_usu = $_POST["rol_usu"];
    $usuario->ajaxRegistrarUsuario();

} else if (isset($_POST['accion']) && $_POST['accion'] == 3) { //ventana modal
    $usuario = new ajaxUsuario();
    $usuario->ajaxListaUsuario();

} else if (isset($_POST['accion']) && $_POST['accion'] == 4) { // Actualizar
    $usuario = new ajaxUsuario();
    $usuario->id_usu = $_POST["id_usu"];
    $usuario->nombre_usu = $_POST["nombre_usu"];
    $usuario->clave_usu = $_POST["clave_usu"];
    $usuario->img_usu = $_POST["avatar_usu"];
    $usuario->rol_usu = $_POST["rol_usu"];
    $usuario->ajaxActualizarUsuario();

} else if (isset($_POST['accion']) && $_POST['accion'] == 5) { // Vigencia
    $usuario = new ajaxUsuario();
    $usuario->id_usu = $_POST["id_usu"];
    $usuario->vigencia_usu = $_POST["vigencia_usu"];
    $usuario->ajaxCambiarVigenciaUsuario();

}
