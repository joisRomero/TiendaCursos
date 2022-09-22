<?php

class CompraControlador {

    static function ctrListarCompra(){
        $respuesta = CompraModelo::mdlListarCompra();
        return $respuesta;
    }

    static function ctrCambiarVigenciaCompra($id, $vigencia){
        $respuesta = CompraModelo::mdlCambiarVigenciaCompra($id, $vigencia);
        return $respuesta;
    }

    static function ctrRegistrarCompra($idEstudiante, $idFormacion) {
        $registrarCompra = CompraModelo::mdlRegistrarCompra($idEstudiante, $idFormacion);
        return $registrarCompra;
    }
}