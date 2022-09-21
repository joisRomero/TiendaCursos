<?php

require_once 'conexion.php';

class ProfesorModelo {

    //NO TOCAR LISTA LOS PROFES DEL COMBOBOX DE FORMACIÓN ACADÉMICA
    static function mdlListaProsores()
    {
        $consulta = Conexion::conectar()->prepare("SELECT
            id_pro, CONCAT(apPater_pro, ' ', apMater_pro , ', ',nombre_pro) AS nombreProfesor, vigencia_pro as vigencia
        FROM profesor ORDER by apPater_pro");

        $consulta->execute();

        return $consulta->fetchAll();
    }
}