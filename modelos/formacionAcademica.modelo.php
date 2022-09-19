<?php

require_once 'conexion.php';

class FormacionAcademicaModelo
{

    static function mdlListarFormacionAcademica()
    {
        $consulta = Conexion::conectar()->prepare("SELECT fa.id_forma, fa.nombre_forma, 
                                                fa.descripcion_forma, fa.aprendizaje_forma, 
		                                        concat(fa.duracion_forma, ' Horas'), 
                                                fa.fechaCreacion_forma, fa.precio_forma,
                                                concat(p.nombre_pro,' ',p.apPater_pro,' ' ,p.apMater_pro) as nombreProfesor, 
		                                        t.nombre_tipo, fa.img, fa.vigente_forma,'' as opciones
                                                from formacion_academica as fa
                                                INNER JOIN profesor as p
                                                on fa.id_pro = p.id_pro
                                                INNER JOIN tipo as t
                                                on t.id_tipo = fa.id_tipo
                                                ORDER BY fa.nombre_forma");
        $consulta->execute();

        return $consulta->fetchAll();
    }

    static function mdlListarFormacionAcademicaResumido(){
        $consulta = Conexion::conectar()->prepare("SELECT fa.id_forma, fa.nombre_forma, 
                                                fa.descripcion_forma,
		                                        t.id_tipo, fa.img, fa.vigente_forma
                                                from formacion_academica as fa
                                                INNER JOIN tipo as t
                                                on t.id_tipo = fa.id_tipo
                                                WHERE fa.vigente_forma = 1
                                                ORDER BY fa.nombre_forma");
        $consulta->execute();

        return $consulta->fetchAll();
    }

    static function mdlRegistrarFormacionAcademica(
        $nombre,
        $descripcion,
        $aprendizaje,
        $duracion,
        $precio,
        $img,
        $profesor,
        $tipo
    ) {
        try {
            $fecha = date('Y-m-d');
            $vigencia = 1;
            $consulta = Conexion::conectar()->prepare("INSERT INTO formacion_academica ( 
                                                nombre_forma, descripcion_forma, aprendizaje_forma, 
                                                duracion_forma, fechaCreacion_forma, precio_forma, 
                                                vigente_forma, img, id_pro, id_tipo) 
                                                VALUES (:nombre, :descripcion, :aprendizaje,
                                                :duracion, :fechaCreacion, :precio, :vigencia, :img, :profesor, :tipo)");

            $consulta->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $consulta->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $consulta->bindParam(":aprendizaje", $aprendizaje, PDO::PARAM_STR);
            $consulta->bindParam(":duracion", $duracion, PDO::PARAM_STR);
            $consulta->bindParam(":fechaCreacion", $fecha, PDO::PARAM_STR);
            $consulta->bindParam(":precio", $precio, PDO::PARAM_STR);
            $consulta->bindParam(":vigencia", $vigencia, PDO::PARAM_STR);
            $consulta->bindParam(":img", $img, PDO::PARAM_STR);
            $consulta->bindParam(":profesor", $profesor, PDO::PARAM_STR);
            $consulta->bindParam(":tipo", $tipo, PDO::PARAM_STR);

            $consulta->execute();

            if ($consulta) {
                $resultado = "ok";
            } else {
                $resultado = "error";
            }
        } catch (Exception $e) {
            $resultado = 'Excepción capturada: '.$e->getMessage()."\n";
        }
        return $resultado;
        
        $consulta =  null;

    }
}
