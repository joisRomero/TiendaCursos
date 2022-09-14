<?php

require_once "../controladores/tipoFormacion.controlador.php";
require_once "../modelos/tipoFormacion.modelo.php";


class ajaxTipoFormacion{

    public function ajaxListarTipoFormacion()
    {
        $tipoFormacion = TipoFormacionControlador::ctrListarTipoFormacion();

        echo json_encode($tipoFormacion);
    }
}

if(isset($_POST['accion']) && $_POST['accion'] == 1){
    $tipoFormacion = new ajaxTipoFormacion();
    $tipoFormacion->ajaxListarTipoFormacion();
}