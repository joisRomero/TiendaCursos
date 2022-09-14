<?php

class TipoFormacionControlador {

    static function ctrListarTipoFormacion()
    {
        $respuesta = TipoFormacionModelo::mdlListarTipoFormacion();
        return $respuesta;
    }
}