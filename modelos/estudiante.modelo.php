<?php

require_once 'conexion.php';

class EstudianteModelo {
    //Lista para la tabla
    static function mdlListarEstudiante() {
        $consulta = Conexion::conectar()->prepare("SELECT e.id_estu, e.nombre_estu, e.apellidos_estu, e.correo_estu, e.vigente_estu, u.id_usu, u.nombre_usu, '' as opciones
        FROM estudiante as e
        INNER JOIN usuario as u
        ON e.id_usu = u.id_usu
        WHERE u.rol_usu = 'E'
        ORDER BY e.nombre_estu");
        $consulta->execute();
        return $consulta->fetchAll();
    }
    // //Lista para la ventana modal
    // static function mdlListaEstudiante() {
    //     $consulta = Conexion::conectar()->prepare("SELECT e.id_estu, e.nombre_estu, e.apellidos_estu, e.correo_estu, e.vigente_estu, u.nombre_usu
    //     FROM estudiante as e
    //     INNER JOIN usuario as u
    //     ON e.id_usu = u.id_usu
    //     WHERE u.rol_usu = 'E'
    //     ORDER BY e.nombre_estu");
    //     $consulta->execute();
    //     return $consulta->fetchAll();
    // }

    static function mdlRegistrarEstudiante($nombre_estu, $apellidos_estu, $correo_estu, $usuario_estu) {
        try {
            $vigencia_estu = 1;
            $consulta = Conexion::conectar()->prepare("INSERT INTO estudiante(nombre_estu, apellidos_estu, correo_estu, vigente_estu, id_usu)
            VALUES(:nombre_estu, :apellidos_estu, :correo_estu, :vigencia_estu, :usuario_estu)");

            $consulta->bindParam(":nombre_estu", $nombre_estu, PDO::PARAM_STR);
            $consulta->bindParam(":apellidos_estu", $apellidos_estu, PDO::PARAM_STR);
            $consulta->bindParam(":correo_estu", $correo_estu, PDO::PARAM_STR);
            $consulta->bindParam(":vigencia_estu", $vigencia_estu, PDO::PARAM_STR);
            $consulta->bindParam(":usuario_estu", $usuario_estu, PDO::PARAM_STR);

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

    static function mdlActualizarEstudiante($id_estu, $nombre_estu, $apellidos_estu, $correo_estu) {
        try{
            $consulta = Conexion::conectar()->prepare("UPDATE estudiante
                        SET nombre_estu = :nombre_estudiante,
                            apellidos_estu = :apellidos_estudiante,
                            correo_estu = :correo_estudiante
                        WHERE id_estu = :id_estudiante");
            $consulta->bindParam(":id_estudiante", $id_estu, PDO::PARAM_STR);
            $consulta->bindParam(":nombre_estudiante", $nombre_estu, PDO::PARAM_STR);
            $consulta->bindParam(":apellidos_estudiante", $apellidos_estu, PDO::PARAM_STR);
            $consulta->bindParam(":correo_estudiante", $correo_estu, PDO::PARAM_STR);

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

    static function mdlCambiarVigenciaEstudiante($id_estu, $vigencia_estu) {
        try{
            if ($vigencia_estu == 1) {
                $vigencia_estu = 0;
                $consulta = Conexion::conectar()->prepare("UPDATE estudiante
                    SET vigente_estu = :vigencia_estudiante
                    WHERE id_estu = :id_estudiante");
                $consulta->bindParam(":id_estudiante", $id_estu, PDO::PARAM_STR);
                $consulta->bindParam(":vigencia_estudiante", $vigencia_estu, PDO::PARAM_STR);

            } else {
                $vigencia_estu = 1;
                $consulta = Conexion::conectar()->prepare("UPDATE estudiante
                    SET vigente_estu = :vigencia_estudiante
                    WHERE id_estu = :id_estudiante");
                $consulta->bindParam(":id_estudiante", $id_estu, PDO::PARAM_STR);
                $consulta->bindParam(":vigencia_estudiante", $vigencia_estu, PDO::PARAM_STR);
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