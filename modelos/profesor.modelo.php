<?php

require_once 'conexion.php';

class ProfesorModelo {

    static function mdlListaProsores()
    {
        $consulta = Conexion::conectar()->prepare("SELECT id_pro, CONCAT(apPater_pro, ' ', apMater_pro , ' ',nombre_pro) AS nombreProfesor,
                                                vigencia_pro FROM profesor 
                                                ORDER by apPater_pro ");

        $consulta->execute();

        return $consulta->fetchAll();
    }
}