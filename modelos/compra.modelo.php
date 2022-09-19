<?php

require_once 'conexion.php';

class CompraModelo
{
    static function mdlRegistrarCompra(
        $idEstudiante,
        $idFormacion
    ) {
        try {
            $fecha = date('Y-m-d');
            $vigencia = 1;
            $consulta = Conexion::conectar()->prepare("INSERT INTO compra (fecha_compra, vigente_compra, 
                                                        id_estu, id_forma) VALUES (:fecha, :vigencia, :idEstudiante,
                                                        :idFormacion)");

            $consulta->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $consulta->bindParam(":vigencia", $vigencia, PDO::PARAM_STR);
            $consulta->bindParam(":idEstudiante", $idEstudiante, PDO::PARAM_STR);
            $consulta->bindParam(":idFormacion", $idFormacion, PDO::PARAM_STR);

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
