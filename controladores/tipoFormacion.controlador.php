<?php

class TipoFormacionControlador {

    static function ctrListarTipoFormacion()
    {
        $respuesta = TipoFormacionModelo::mdlListarTipoFormacion();
        return $respuesta;
    }

    static function ctrRegistrarTipoFormacion($nombre_tipo)
    {
        $respuesta = TipoFormacionModelo::mdlRegistrarTipoFormacion($nombre_tipo);
        return $respuesta;
    }
    
    static function ctrListaTipoFormacion()
    {
        $respuesta = TipoFormacionModelo::mdlListaTipoFormacion();
        return $respuesta;
    }
}