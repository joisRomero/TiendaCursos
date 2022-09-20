<?php

require_once 'conexion.php';

class UsuarioModelo {
    //Lista para la tabla
    static function mdlListarUsuario() {
        $consulta = Conexion::conectar()->prepare("SELECT id_usu, nombre_usu, clave_usu, rol_usu, vigencia_usu, '' as opciones FROM usuario ORDER BY nombre_usu ASC");
        $consulta->execute();
        return $consulta->fetchAll();
    }

    //Lista para el REGISTRO (ventana modal) del ESTUDIANTE::COMBOBOX(NO TOCAR!)
    static function mdlListaUsuario() {
        $consulta = Conexion::conectar()->prepare("SELECT id_usu, nombre_usu, clave_usu, img_usu, rol_usu, vigencia_usu
        FROM usuario
        WHERE rol_usu='E' AND id_usu NOT IN (SELECT u.id_usu
        FROM usuario as u
        INNER JOIN estudiante as e
        ON e.id_usu = u.id_usu
        WHERE u.rol_usu='E') ORDER BY nombre_usu ASC");
        $consulta->execute();
        return $consulta->fetchAll();
    }

    static function mdlRegistrarUsuario($nombre_usu, $clave_usu, $rol_usu) {
        try {
            $vigencia_usu = 1;
            $img_usu = "assets/dist/img/profile/profile.svg";
            $consulta = Conexion::conectar()->prepare("INSERT INTO usuario(nombre_usu, clave_usu, img_usu, rol_usu, vigencia_usu)
            VALUES(:nombre_usu, :clave_usu, :img_usu, :rol_usu, :vigencia_usu)");

            $consulta->bindParam(":nombre_usu", $nombre_usu, PDO::PARAM_STR);
            $consulta->bindParam(":clave_usu", $clave_usu, PDO::PARAM_STR);
            $consulta->bindParam(":img_usu", $img_usu, PDO::PARAM_STR);
            $consulta->bindParam(":rol_usu", $rol_usu, PDO::PARAM_STR);
            $consulta->bindParam(":vigencia_usu", $vigencia_usu, PDO::PARAM_STR);

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

    static function mdlActualizarUsuario($id_usu, $nombre_usu, $clave_usu, $img_usu) {
        try{
            $consulta = Conexion::conectar()->prepare("UPDATE usuario
                        SET nombre_usu = :nombre_usu,
                            clave_usu = :clave_usu,
                            img_usu = :img_usu
                        WHERE id_usu = :id_usu");
            $consulta->bindParam(":id_usu", $id_usu, PDO::PARAM_STR);
            $consulta->bindParam(":nombre_usu", $nombre_usu, PDO::PARAM_STR);
            $consulta->bindParam(":clave_usu", $clave_usu, PDO::PARAM_STR);
            $consulta->bindParam(":img_usu", $img_usu, PDO::PARAM_STR);

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

    static function mdlCambiarVigenciaUsuario($id_usu, $vigencia_usu) {
        try{
            if ($vigencia_usu == 1) {
                $vigencia_usu = 0;
                $consulta = Conexion::conectar()->prepare("UPDATE usuario
                    SET vigencia_usu = :vigencia_usu
                    WHERE id_usu = :id_usu");
                $consulta->bindParam(":id_usu", $id_usu, PDO::PARAM_STR);
                $consulta->bindParam(":vigencia_usu", $vigencia_usu, PDO::PARAM_STR);

            } else {
                $vigencia_usu = 1;
                $consulta = Conexion::conectar()->prepare("UPDATE usuario
                    SET vigencia_usu = :vigencia_usu
                    WHERE id_usu = :id_usu");
                $consulta->bindParam(":id_usu", $id_usu, PDO::PARAM_STR);
                $consulta->bindParam(":vigencia_usu", $vigencia_usu, PDO::PARAM_STR);
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