<?php


class ProfesorControlador{

    static function ctrListaProfesores()
    {
        $respuesta = ProfesorModelo::mdlListaProsores();
        return $respuesta;
    }

}