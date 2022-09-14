<?php

require_once 'conexion.php';

class TipoFormacionModelo
{

    static function mdlListarTipoFormacion()
    {
        $consulta = Conexion::conectar()->prepare("SELECT '', id_tipo, nombre_tipo, vigente_tipo, '' as opciones FROM tipo");

        $consulta->execute();

        return $consulta->fetchAll();
    }

    static function mdlRegistrarTipoFormacion($nombre_tipo)
    {

        $consulta = Conexion::conectar()->prepare("INSERT INTO tipo(nombre_tipo, 1)
            VALUES(:nombre_tipo)");

        $consulta->bindParam(":nombre_tipo", $nombre_tipo, PDO::PARAM_STR);

        $consulta->execute();

        return $consulta->fetchAll();

        $consulta = null;
    }
}
