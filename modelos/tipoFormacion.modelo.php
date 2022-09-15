<?php

require_once 'conexion.php';

class TipoFormacionModelo
{

    static function mdlListarTipoFormacion()
    {
        $consulta = Conexion::conectar()->prepare("SELECT '', id_tipo, nombre_tipo, vigente_tipo, '' as opciones FROM tipo ORDER BY nombre_tipo ASC");

        $consulta->execute();

        return $consulta->fetchAll();
    }

    static function mdlListaTipoFormacion()
    {
        $consulta = Conexion::conectar()->prepare("SELECT id_tipo, nombre_tipo, vigente_tipo FROM tipo ORDER BY nombre_tipo ASC");

        $consulta->execute();

        return $consulta->fetchAll();
    }

    static function mdlRegistrarTipoFormacion($nombre_tipo)
    {
        try {
            $vigencia = 1;
            $consulta = Conexion::conectar()->prepare("INSERT INTO tipo(nombre_tipo, vigente_tipo)
            VALUES(:nombre_tipo, :vigencia)");

            $consulta->bindParam(":nombre_tipo", $nombre_tipo, PDO::PARAM_STR);
            $consulta->bindParam(":vigencia", $vigencia, PDO::PARAM_STR);

            $consulta->execute();


            if ($consulta) {
                $resultado = "ok";
            } else {
                $resultado = "error";
            }
        } catch (Exception $e) {
            $resultado = 'Excepción capturada: ' . $e->getMessage() . "\n";
        }
        return $resultado;

        $consulta =  null;
    }
}
