<?php

class CompraControlador {

    static function ctrListarCompra(){
        $respuesta = CompraModelo::mdlListarCompra();
        return $respuesta;
    }

    static function ctrListarCompraConFecha($fechaInicio, $fechaFin){
        $respuesta = CompraModelo::mdlListarCompraConFecha($fechaInicio, $fechaFin);
        return $respuesta;
    }

    static function ctrGanacia(){
        $respuesta = CompraModelo::mdlGanacia();
        return $respuesta;
    }

    static function ctrCursosMasVendidos(){
        $respuesta = CompraModelo::mdlCursosMasVendidos();
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