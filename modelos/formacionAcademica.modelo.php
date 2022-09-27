<?php

require_once 'conexion.php';

class FormacionAcademicaModelo
{

    static function mdlListarFormacionAcademica()
    {
        $consulta = Conexion::conectar()->prepare(
            "SELECT fa.id_forma, fa.nombre_forma, fa.descripcion_forma,
            fa.aprendizaje_forma, concat(fa.duracion_forma, ' h'), fa.fechaCreacion_forma,
            concat('S/' ,fa.precio_forma), p.id_pro, concat(p.nombre_pro,' ',p.apPater_pro,' ' ,p.apMater_pro) as nombreProfesor, t.id_tipo, t.nombre_tipo, fa.img, fa.vigente_forma,'' as opciones
            from formacion_academica as fa
            INNER JOIN profesor as p
            on fa.id_pro = p.id_pro
            INNER JOIN tipo as t
            on t.id_tipo = fa.id_tipo
            ORDER BY fa.nombre_forma"
            );
        $consulta->execute();

        return $consulta->fetchAll();
    }

    static function mdlCantidadFormacionAcademica()
    {
        $consulta = Conexion::conectar()->prepare("SELECT COUNT(*) from formacion_academica");
        $consulta->execute();

        return $consulta->fetchAll();
    }

    static function mdlListarFormacionAcademicaInicio()
    {
        $consulta = Conexion::conectar()->prepare("SELECT f.nombre_forma, f.duracion_forma, f.precio_forma, t.nombre_tipo 
            FROM formacion_academica as f INNER JOIN tipo as t on t.id_tipo = f.id_tipo ORDER by f.fechaCreacion_forma DESC LIMIT 5");
        $consulta->execute();

        return $consulta->fetchAll();
    }

    static function mdlListarNoComprados($idEstudiante)
    {
        $vigencia = 1;
        $consulta = Conexion::conectar()->prepare(
            "SELECT fa.id_forma, fa.nombre_forma,
            fa.descripcion_forma,
            t.id_tipo, fa.img, fa.vigente_forma
            from formacion_academica as fa
            INNER JOIN tipo as t
            on t.id_tipo = fa.id_tipo
            WHERE id_forma NOT IN (SELECT f.id_forma
            FROM compra as c
            INNER JOIN formacion_academica as f
            on c.id_forma = f.id_forma
            WHERE c.id_estu = :idEstudiante and c.vigente_compra = :vigencia)
            ORDER BY fa.nombre_forma"
            );
        $consulta->bindParam(":idEstudiante", $idEstudiante, PDO::PARAM_STR);
        $consulta->bindParam(":vigencia", $vigencia, PDO::PARAM_STR);

        $consulta->execute();

        return $consulta->fetchAll();
    }

    static function mdlListarFormacionAcademicaResumido()
    {
        $consulta = Conexion::conectar()->prepare("SELECT fa.id_forma, fa.nombre_forma,
        fa.descripcion_forma,
		t.id_tipo, fa.img, fa.vigente_forma
        from formacion_academica as fa
        INNER JOIN tipo as t
        on t.id_tipo = fa.id_tipo
        WHERE fa.vigente_forma = 1
        ORDER BY fa.nombre_forma"
        );
        $consulta->execute();

        return $consulta->fetchAll();
    }

    static function mdlRegistrarFormacionAcademica($nombre, $descripcion, $aprendizaje, $duracion, $precio, $img, $profesor, $tipo) {
        try {
            $fecha = date('Y-m-d');
            $vigencia = 1;
            $consulta = Conexion::conectar()->prepare(
                "INSERT INTO formacion_academica (
                    nombre_forma, descripcion_forma, aprendizaje_forma,
                    duracion_forma, fechaCreacion_forma, precio_forma,
                    vigente_forma, img, id_pro, id_tipo)
                VALUES (
                    :nombre, :descripcion, :aprendizaje,
                    :duracion, :fechaCreacion, :precio,
                    :vigencia, :img, :profesor, :tipo)"
                );

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
            $resultado = 'Excepción capturada: ' . $e->getMessage() . "\n";
        }
        return $resultado;

        $consulta =  null;
    }

    static function mdlActualizarFormacionAcademica($id, $nombre, $descripcion, $aprendizaje, $duracion, $precio, $profesor, $tipo) {

        try {
            $consulta = Conexion::conectar()->prepare("UPDATE formacion_academica
                SET nombre_forma = :nombre,
                    descripcion_forma = :descripcion,
                    aprendizaje_forma = :aprendizaje,
                    duracion_forma = :duracion,
                    precio_forma = :precio,
                    id_pro = :profesor,
                    id_tipo = :tipo
                WHERE id_forma = :id");
            $consulta->bindParam(":id", $id, PDO::PARAM_STR);
            $consulta->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $consulta->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $consulta->bindParam(":aprendizaje", $aprendizaje, PDO::PARAM_STR);
            $consulta->bindParam(":duracion", $duracion, PDO::PARAM_STR);
            $consulta->bindParam(":precio", $precio, PDO::PARAM_STR);
            $consulta->bindParam(":profesor", $profesor, PDO::PARAM_STR);
            $consulta->bindParam(":tipo", $tipo, PDO::PARAM_STR);

            $consulta->execute();

            if ($consulta) {
                $resultado = "ok";
            } else {
                $resultado = "error";
            }
        }catch(Exception $e) {
            $resultado = 'Excepción capturada: ' . $e->getMessage() . "\n";
        }
        return $resultado;

        $consulta =  null;
    }

    static function mdlCambiarVigenciaFormacionAcademica($id, $vigencia) {
        try {
            if($vigencia == 1) {
                $vigencia = 0;
                $consulta = Conexion::conectar()->prepare("UPDATE formacion_academica
                    SET vigente_forma = :vigencia
                    WHERE id_forma = :id");
                $consulta->bindParam(":id", $id, PDO::PARAM_STR);
                $consulta->bindParam(":vigencia", $vigencia, PDO::PARAM_STR);
            } else {
                $vigencia = 1;
                $consulta = Conexion::conectar()->prepare("UPDATE formacion_academica
                    SET vigente_forma = :vigencia
                    WHERE id_forma = :id");
                $consulta->bindParam(":id", $id, PDO::PARAM_STR);
                $consulta->bindParam(":vigencia", $vigencia, PDO::PARAM_STR);
            }

            $consulta->execute();

            if ($consulta) {
                $resultado = "ok";
            } else {
                $resultado = "error";
            }
        }catch(Exception $e) {
            $resultado = 'Excepción capturada: ' . $e->getMessage() . "\n";
        }
        return $resultado;

        $consulta =  null;
    }
}
