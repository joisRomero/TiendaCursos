<?php

require_once "../controladores/tipoFormacion.controlador.php";
require_once "../modelos/tipoFormacion.modelo.php";


class ajaxTipoFormacion{

    public $id_tipo;
    public $nombre_tipo;
    public $vigente_tipo;

    public function ajaxListarTipoFormacion()
    {
        $tipoFormacion = TipoFormacionControlador::ctrListarTipoFormacion();

        echo json_encode($tipoFormacion);
    }

    public function ajaxListaTipoFormacion()
    {
        $tipoFormacion = TipoFormacionControlador::ctrListaTipoFormacion();

        echo json_encode($tipoFormacion, JSON_UNESCAPED_UNICODE);
    }

    public function ajaxRegistrarTipoFormacion()
    {
        $tipoFormacion = TipoFormacionControlador::ctrRegistrarTipoFormacion($this->nombre_tipo);
        echo json_encode($tipoFormacion);
    }

    public function ajaxActualizarTipoFormacion()
    {
        $tipoFormacion = TipoFormacionControlador::ctrActualizarTipoFormacion($this->id_tipo, $this->nombre_tipo);
        echo json_encode($tipoFormacion);
    }

    public function ajaxCambiarVigenciaTipoFormacion(){

        $tipoFormacion = TipoFormacionControlador::crtCambiarVigenciaTipoFormacion($this->id_tipo, $this->vigente_tipo);
        echo json_encode($tipoFormacion);
    }
}

if (isset($_POST['accion']) && $_POST['accion'] == 1) { // Listar
    $tipoFormacion = new ajaxTipoFormacion();
    $tipoFormacion->ajaxListarTipoFormacion();

} else if (isset($_POST['accion']) && $_POST['accion'] == 2) { // Registrar
    $registrarTipo = new ajaxTipoFormacion();
    $registrarTipo->nombre_tipo = $_POST["nombre_tipo"];
    $registrarTipo->ajaxRegistrarTipoFormacion();

} else if (isset($_POST['accion']) && $_POST['accion'] == 4) { // Actualizar
    $actualizarTipo = new ajaxTipoFormacion();
    $actualizarTipo->id_tipo = $_POST["id_tipo"];
    $actualizarTipo->nombre_tipo = $_POST["nombre_tipo"];
    $actualizarTipo->ajaxActualizarTipoFormacion();

} else if (isset($_POST['accion']) && $_POST['accion'] == 5) { // Vigencia
    $cambiarVigenciaTipo = new ajaxTipoFormacion();
    $cambiarVigenciaTipo->id_tipo = $_POST["id_tipo"];
    $cambiarVigenciaTipo->vigente_tipo = $_POST["vigente_tipo"];
    $cambiarVigenciaTipo->ajaxCambiarVigenciaTipoFormacion();

}
if (isset($_POST['accion']) && $_POST['accion'] == 3) {                    //LISTAR PARA COMBOBOX
    $tipoFormacion = new ajaxTipoFormacion();
    $tipoFormacion->ajaxListaTipoFormacion();
}