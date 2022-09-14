<?php

class FormacionAcademicaControlador {

    static function ctrListarFormacionAcademica()
    {
        $respuesta = FormacionAcademicaModelo::mdlListarFormacionAcademica();
        return $respuesta;
    }
}