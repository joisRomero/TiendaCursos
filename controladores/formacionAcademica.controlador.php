<?php

class FormacionAcademicaControlador
{

    static function ctrListarFormacionAcademica()
    {
        $respuesta = FormacionAcademicaModelo::mdlListarFormacionAcademica();
        return $respuesta;
    }

    static function ctrListarNoComprados($idEstudiante)
    {
        $respuesta = FormacionAcademicaModelo::mdlListarNoComprados($idEstudiante);
        return $respuesta;
    }

    static function ctrListarFormacionAcademicaResumido()
    {
        $respuesta = FormacionAcademicaModelo::mdlListarFormacionAcademicaResumido();
        return $respuesta;
    }

    static function ctrRegistrarFormacionAcademica( $nombre, $descripcion, $aprendizaje, $duracion, $precio, $img, $profesor, $tipo) {

        $respuesta = FormacionAcademicaModelo::mdlRegistrarFormacionAcademica($nombre, $descripcion, $aprendizaje, $duracion, $precio, $img, $profesor, $tipo);
        return $respuesta;
    }

    static function ctrActualizarFormacionAcademica($id, $nombre, $descripcion, $aprendizaje, $duracion, $precio, $profesor, $tipo) {
        $respuesta = FormacionAcademicaModelo::mdlActualizarFormacionAcademica($id, $nombre, $descripcion, $aprendizaje, $duracion, $precio, $profesor, $tipo);
        return $respuesta;
    }

    static function ctrCambiarVigenciaFormacionAcademica($id, $vigencia) {
        $respuesta = FormacionAcademicaModelo::mdlCambiarVigenciaFormacionAcademica($id, $vigencia);
        return $respuesta;
    }
}
