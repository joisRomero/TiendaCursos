<?php

require_once 'conexion.php';

class ProfesorModelo
{

    static function mdlListaProfesor()
    {
        $consulta = Conexion::conectar()->prepare("SELECT
            id_pro, dni_pro, nombre_pro, apPater_pro, apMater_pro, descripcion_pro, img, vigencia_pro, '' as opciones
        FROM profesor ORDER by nombre_pro");

        $consulta->execute();

        return $consulta->fetchAll();
    }
    //NO TOCAR LISTA LOS PROFES DEL COMBOBOX DE FORMACIÓN ACADÉMICA
    static function mdlListaProsores()
    {
        $consulta = Conexion::conectar()->prepare("SELECT
            id_pro, CONCAT(apPater_pro, ' ', apMater_pro , ', ',nombre_pro) AS nombreProfesor, vigencia_pro as vigencia
        FROM profesor ORDER by apPater_pro");

        $consulta->execute();

        return $consulta->fetchAll();
    }

    static function mdlRegistrarProfesor($dni, $nombre, $apPater, $apMater, $descripcion, $img)
    {
        try {
            $consulta = Conexion::conectar()->prepare("SELECT * FROM profesor WHERE dni_pro = :dni");
            $consulta->bindParam(":dni", $dni, PDO::PARAM_STR);
            $consulta->execute();
            $res = $consulta->fetchAll();
            if ($res == null) { // valida que sea único
                if (strlen($dni) == 8) { //valida que tenga 8 dígitos
                    $vigencia = 1;
                    $consulta = Conexion::conectar()->prepare("INSERT INTO profesor(dni_pro, nombre_pro, apPater_pro, apMater_pro, descripcion_pro, img, vigencia_pro)
                    VALUES(:dni, :nombre, :apPater, :apMater, :descripcion, :img, :vigencia)");

                    $consulta->bindParam(":dni", $dni, PDO::PARAM_STR);
                    $consulta->bindParam(":nombre", $nombre, PDO::PARAM_STR);
                    $consulta->bindParam(":apPater", $apPater, PDO::PARAM_STR);
                    $consulta->bindParam(":apMater", $apMater, PDO::PARAM_STR);
                    $consulta->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
                    $consulta->bindParam(":img", $img, PDO::PARAM_STR);
                    $consulta->bindParam(":vigencia", $vigencia, PDO::PARAM_STR);

                    $consulta->execute();


                    if ($consulta) {
                        $resultado = "ok";
                    } else {
                        $resultado = "error";
                    }
                } else {
                    $resultado = "no-ocho";
                }
            } else {
                $resultado = "no-unico";
            }
        } catch (Exception $e) {
            $resultado = 'Excepción capturada: ' . $e->getMessage() . "\n";
        }
        return $resultado;

        $consulta =  null;
    }

    static function mdlActualizarProfesor($id, $dni, $nombre, $apPater, $apMater, $descripcion)
    {
        try {
            $consulta1 = Conexion::conectar()->prepare("SELECT dni_pro FROM profesor WHERE id_pro = :id");
            $consulta1->bindParam(":id", $id, PDO::PARAM_STR);
            $consulta1->execute();
            $res1 = $consulta1->fetchAll();
            $consulta1 =  null;

            $consulta2 = Conexion::conectar()->prepare("SELECT dni_pro FROM profesor WHERE dni_pro = :dni");
            $consulta2->bindParam(":dni", $dni, PDO::PARAM_STR);
            $consulta2->execute();
            $res2 = $consulta2->fetchAll();
            $consulta2 =  null;

            if ($dni != $res1) { //si el dni que envío es nuevo
                if (strlen($dni) == 8) { //valida que tenga 8 dígitos
                    if ($dni != $res2) { //si el nuevo dni es diferente a los almacenados
                        $consulta = Conexion::conectar()->prepare("UPDATE profesor
                                    SET dni_pro = :dni,
                                        nombre_pro = :nombre,
                                        apPater_pro = :apPater,
                                        apMater_pro = :apMater,
                                        descripcion_pro = :descripcion
                                    WHERE id_pro = :id");
                        $consulta->bindParam(":id", $id, PDO::PARAM_STR);
                        $consulta->bindParam(":dni", $dni, PDO::PARAM_STR);
                        $consulta->bindParam(":nombre", $nombre, PDO::PARAM_STR);
                        $consulta->bindParam(":apPater", $apPater, PDO::PARAM_STR);
                        $consulta->bindParam(":apMater", $apMater, PDO::PARAM_STR);
                        $consulta->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);

                        $consulta->execute();

                        if ($consulta){$resultado = "ok";}
                    } else {
                        $resultado = "no-unico";
                    }
                } else {
                    $resultado = "no-ocho";
                }
            } else { //actualiza sus datos menos el dni
                if (strlen($dni) == 8) { //valida que tenga 8 dígitos
                    $consulta = Conexion::conectar()->prepare("UPDATE profesor
                                SET nombre_pro = :nombre,
                                    apPater_pro = :apPater,
                                    apMater_pro = :apMater,
                                    descripcion_pro = :descripcion
                                WHERE id_pro = :id");
                    $consulta->bindParam(":id", $id, PDO::PARAM_STR);
                    $consulta->bindParam(":dni", $dni, PDO::PARAM_STR);
                    $consulta->bindParam(":nombre", $nombre, PDO::PARAM_STR);
                    $consulta->bindParam(":apPater", $apPater, PDO::PARAM_STR);
                    $consulta->bindParam(":apMater", $apMater, PDO::PARAM_STR);
                    $consulta->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);

                    $consulta->execute();

                    if ($consulta) {
                        $resultado = "ok";
                    } else {
                        $resultado = "error";
                    }
                } else {
                    $resultado = "no-ocho";
                }
            }

        } catch (Exception $e) {
            $resultado = 'Excepción capturada: ' . $e->getMessage() . "\n";
        }
        return $resultado;

        $consulta =  null;
    }

    static function mdlCambiarVigenciaProfesor($id, $vigencia)
    {
        try {
            if ($vigencia == 1) {
                $vigencia = 0;
                $consulta = Conexion::conectar()->prepare("UPDATE profesor
                    SET vigencia_pro = :vigencia
                    WHERE id_pro = :id");
                $consulta->bindParam(":id", $id, PDO::PARAM_STR);
                $consulta->bindParam(":vigencia", $vigencia, PDO::PARAM_STR);
            } else {
                $vigencia = 1;
                $consulta = Conexion::conectar()->prepare("UPDATE profesor
                    SET vigencia_pro = :vigencia
                    WHERE id_pro = :id");
                $consulta->bindParam(":id", $id, PDO::PARAM_STR);
                $consulta->bindParam(":vigencia", $vigencia, PDO::PARAM_STR);
            }

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
