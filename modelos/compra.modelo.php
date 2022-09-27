<?php

require_once 'conexion.php';

class CompraModelo {

    static function mdlListarCompra() {
        $consulta = Conexion::conectar()->prepare("SELECT c.id_compra, c.fecha_compra, c.vigente_compra, CONCAT(e.nombre_estu, ' ', e.apellidos_estu) as nombreEstudiante, CONCAT(p.nombre_pro, ' ', p.apPater_pro, ' ', p.apMater_pro) as nombreProfesor, f.nombre_forma as nombreFormacion, t.nombre_tipo as tipo
            FROM compra as c
            INNER JOIN estudiante as e
            ON c.id_estu = e.id_estu
            INNER JOIN formacion_academica as f
            ON c.id_forma = f.id_forma
            INNER JOIN profesor as p
            ON f.id_pro = p.id_pro
            INNER JOIN tipo as t
            ON f.id_tipo = t.id_tipo");
        $consulta->execute();
        return $consulta->fetchAll();
    }

    static function mdlGanacia() {
        $consulta = Conexion::conectar()->prepare("SELECT SUM(f.precio_forma) FROM compra as c INNER JOIN formacion_academica as f on c.id_forma = f.id_forma");
        $consulta->execute();
        return $consulta->fetchAll();
    }

    static function mdlCursosMasVendidos() {
        $consulta = Conexion::conectar()->prepare("SELECT fa.nombre_forma, fa.duracion_forma, fa.precio_forma, t.nombre_tipo, COUNT(*) as cantidad 
            FROM compra as c 
            INNER JOIN formacion_academica as fa 
            on c.id_forma = fa.id_forma 
            INNER JOIN tipo as t on fa.id_tipo = t.id_tipo 
            GROUP BY fa.nombre_forma, fa.duracion_forma, fa.precio_forma, t.id_tipo 
            ORDER BY COUNT(*) DESC
            LIMIT 5");
        $consulta->execute();
        return $consulta->fetchAll();
    }

    static function mdlCambiarVigenciaCompra($id, $vigencia){
        try{
            if ($vigencia == 1) {
                $vigencia = 0;
                $consulta = Conexion::conectar()->prepare("UPDATE compra
                    SET vigente_compra = :vigencia
                    WHERE id_compra = :id");
                $consulta->bindParam(":id", $id, PDO::PARAM_STR);
                $consulta->bindParam(":vigencia", $vigencia, PDO::PARAM_STR);

            } else {
                $vigencia = 1;
                $consulta = Conexion::conectar()->prepare("UPDATE compra
                    SET vigente_compra = :vigencia
                    WHERE id_compra = :id");
                $consulta->bindParam(":id", $id, PDO::PARAM_STR);
                $consulta->bindParam(":vigencia", $vigencia, PDO::PARAM_STR);
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

    static function mdlRegistrarCompra(
        $idEstudiante,
        $idFormacion
    ) {
        try {
            $fecha = date('Y-m-d');
            $vigencia = 1;
            $consulta = Conexion::conectar()->prepare("INSERT INTO compra (fecha_compra, vigente_compra, id_estu, id_forma)
                VALUES (:fecha, :vigencia, :idEstudiante, :idFormacion)");

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
