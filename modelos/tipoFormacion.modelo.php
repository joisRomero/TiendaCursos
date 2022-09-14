<?php

require_once 'conexion.php';

class TipoFormacionModelo
{

    static function mdlListarTipoFormacion()
    {
        $consulta = Conexion::conectar()->prepare("SELECT '', nombre_tipo, '' as opciones FROM tipo");

        $consulta->execute();

        return $consulta->fetchAll();
    }
}