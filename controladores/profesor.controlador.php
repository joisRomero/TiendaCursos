<?php


class ProfesorControlador{

    static function ctrListaProfesor() {
        $respuesta = ProfesorModelo::mdlListaProfesor();
        return $respuesta;
    }

    //Lista para la ventana modal::COMBOBOX de la FORMACIÓN ACADÉMICA
    static function ctrListaProfesores() {
        $respuesta = ProfesorModelo::mdlListaProsores();
        return $respuesta;
    }

    static function ctrRegistrarProfesor($dni, $nombre, $apPater, $apMater, $descripcion, $img) {
        $respuesta = ProfesorModelo::mdlRegistrarProfesor($dni, $nombre, $apPater, $apMater, $descripcion, $img);
        return $respuesta;
    }

    static function ctrActualizarProfesor($id, $dni, $nombre, $apPater, $apMater, $descripcion) {
        $respuesta = ProfesorModelo::mdlActualizarProfesor($id, $dni, $nombre, $apPater, $apMater, $descripcion);
        return $respuesta;
    }

    static function ctrCambiarVigenciaProfesor($id, $vigencia) {
        $respuesta = ProfesorModelo::mdlCambiarVigenciaProfesor($id, $vigencia);
        return $respuesta;
    }
}