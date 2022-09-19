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

    static function ctrRegistrarFormacionAcademica(
        $nombre,
        $descripcion,
        $aprendizaje,
        $duracion,
        $precio,
        $img,
        $profesor,
        $tipo
    ) {
        $registrarFormacionAcademica = FormacionAcademicaModelo::mdlRegistrarFormacionAcademica(
            $nombre,
            $descripcion,
            $aprendizaje,
            $duracion,
            $precio,
            $img,
            $profesor,
            $tipo
        );
        return $registrarFormacionAcademica;
    }
}
