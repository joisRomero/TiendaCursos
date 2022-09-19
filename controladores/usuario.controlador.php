<?php

class UsuarioControlador{

    //Lista para la tabla
    static function ctrListarUsuario(){
        $respuesta = UsuarioModelo::mdlListarUsuario();
        return $respuesta;
    }

    //Lista para la ventana modal::COMBOBOX
    static function ctrListaUsuario(){
        $respuesta = UsuarioModelo::mdlListaUsuario();
        return $respuesta;
    }

    static function ctrRegistrarUsuario($nombre_usu, $clave_usu, $img_usu, $rol_usu){
        $respuesta = UsuarioModelo::mdlRegistrarUsuario($nombre_usu, $clave_usu, $img_usu, $rol_usu);
        return $respuesta;
    }

    static function ctrActualizarUsuario($id_usu, $nombre_usu, $clave_usu, $img_usu, $rol_usu){
        $respuesta = UsuarioModelo::mdlActualizarUsuario($id_usu, $nombre_usu, $clave_usu, $img_usu, $rol_usu);
        return $respuesta;
    }

    static function ctrCambiarVigenciaUsuario($id_usu, $vigencia_usu){
        $respuesta = UsuarioModelo::mdlCambiarVigenciaUsuario($id_usu, $vigencia_usu);
        return $respuesta;
    }
}