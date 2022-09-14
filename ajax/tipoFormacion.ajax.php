<?php

require_once "../controladores/tipoFormacion.controlador.php";
require_once "../modelos/tipoFormacion.modelo.php";


class ajaxTipoFormacion{

    public $nombre_tipo;

    public function ajaxListarTipoFormacion()
    {
        $tipoFormacion = TipoFormacionControlador::ctrListarTipoFormacion();

        echo json_encode($tipoFormacion);
    }

    public function ajaxRegistrarTipoFormacion()
    {
        $tipoFormacion = TipoFormacionControlador::ctrRegistrarTipoFormacion($this->nombre_tipo);

        echo json_encode($tipoFormacion);
    }
}

if(isset($_POST['accion']) && $_POST['accion'] == 1){ // Listar
    $tipoFormacion = new ajaxTipoFormacion();
    $tipoFormacion->ajaxListarTipoFormacion();
}else if(isset($_POST['accion']) && $_POST['accion'] == 2){ // Registrar

    $registrarTipo = new ajaxTipoFormacion();
    $registrarTipo->nombre_tipo = $_POST["nombre_tipo"];
    $registrarTipo->ajaxRegistrarTipoFormacion();
}