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

    static function ctrActualizarTipoFormacion($id_tipo, $nombre_tipo)
    {
        $respuesta = TipoFormacionModelo::mdlActualizarTipoFormacion($id_tipo, $nombre_tipo);
        return $respuesta;
    }

    static function crtCambiarVigenciaTipoFormacion($id_tipo, $vigente_tipo)
    {
        $respuesta = TipoFormacionModelo::mdlCambiarVigenciaTipoFormacion($id_tipo, $vigente_tipo);
        return $respuesta;
    }
}