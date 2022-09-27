<?php

class EstudianteControlador {

    //Lista para la tabla
    static function ctrListarEstudiante() {
        $respuesta = EstudianteModelo::mdlListarEstudiante();
        return $respuesta;
    }

    static function ctrCantidadEstudiante() {
        $respuesta = EstudianteModelo::mdlCantidadEstudiante();
        return $respuesta;
    }

    static function ctrUltimosCincoRegistrados() {
        $respuesta = EstudianteModelo::mdlUltimosCincoRegistrados();
        return $respuesta;
    }

    //Lista para la ventana modal
    // static function ctrListaEstudiante() {
    //     $respuesta = EstudianteModelo::mdlListaEstudiante();
    //     return $respuesta;
    // }

    static function ctrRegistrarEstudiante($nombre_estu, $apellidos_estu, $correo_estu, $usuario_estu) {
        $respuesta = EstudianteModelo::mdlRegistrarEstudiante($nombre_estu, $apellidos_estu, $correo_estu, $usuario_estu);
        return $respuesta;
    }

    static function ctrActualizarEstudiante($id_estu, $nombre_estu, $apellidos_estu, $correo_estu, $usuario_estu) {
        $respuesta = EstudianteModelo::mdlActualizarEstudiante($id_estu, $nombre_estu, $apellidos_estu, $correo_estu, $usuario_estu);
        return $respuesta;
    }

    static function ctrCambiarVigenciaEstudiante($id_estu, $vigencia_estu) {
        $respuesta = EstudianteModelo::mdlCambiarVigenciaEstudiante($id_estu, $vigencia_estu);
        return $respuesta;
    }

}

