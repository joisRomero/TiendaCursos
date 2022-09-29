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
        $consulta = Conexion::conectar()->prepare("SELECT id_tipo, nombre_tipo, vigente_tipo FROM tipo WHERE vigente_tipo = 1 ORDER BY nombre_tipo ASC");

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

    static function mdlActualizarTipoFormacion($id_tipo, $nombre_tipo)
    {
        try{
            $consulta = Conexion::conectar()->prepare("UPDATE tipo
                        SET nombre_tipo = :nombre_tipo
                        WHERE id_tipo = :id_tipo");
            $consulta->bindParam(":id_tipo", $id_tipo, PDO::PARAM_STR);
            $consulta->bindParam("nombre_tipo", $nombre_tipo, PDO::PARAM_STR);

            $consulta->execute();

            if($consulta){
                $resultado = "ok";
            }else{
                $resultado = "error";
            }
        }catch (Exception $e){
            $resultado = 'Excepción capturada: ' . $e->getMessage() . "\n";
        }
        return $resultado;

        $consulta =  null;
    }

    static function mdlCambiarVigenciaTipoFormacion($id_tipo, $vigente_tipo)
    {
        try{
            if ($vigente_tipo == 1) {
                $vigente_tipo = 0;
                $consulta = Conexion::conectar()->prepare("UPDATE tipo
                    SET vigente_tipo = :vigente_tipo
                    WHERE id_tipo = :id_tipo");
                $consulta->bindParam(":id_tipo", $id_tipo, PDO::PARAM_STR);
                $consulta->bindParam(":vigente_tipo", $vigente_tipo, PDO::PARAM_STR);

            } else {
                $vigente_tipo = 1;
                $consulta = Conexion::conectar()->prepare("UPDATE tipo
                    SET vigente_tipo = :vigente_tipo
                    WHERE id_tipo = :id_tipo");
                $consulta->bindParam(":id_tipo", $id_tipo, PDO::PARAM_STR);
                $consulta->bindParam(":vigente_tipo", $vigente_tipo, PDO::PARAM_STR);
            }

            $consulta->execute();

            if($consulta){
                $resultado = "ok";
            }else{
                $resultado = "error";
            }
        }catch (Exception $e){
            $resultado = 'Excepción capturada: ' . $e->getMessage() . "\n";
        }
        return $resultado;

        $consulta =  null;
    }
}
