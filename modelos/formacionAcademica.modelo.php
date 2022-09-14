<?php

require_once 'conexion.php';

class FormacionAcademicaModelo
{

    static function mdlListarFormacionAcademica()
    {
        $consulta = Conexion::conectar()->prepare("SELECT '',fa.nombre_forma,fa.duracion_forma,fa.fechaCreacion_forma,fa.precio_forma, 
        concat(p.nombre_pro,p.apPater_pro,p.apMater_pro) as nombreProfesor, t.nombre_tipo, '' as opciones
        from formacion_academica as fa
        INNER JOIN profesor as p
        on fa.id_pro = p.id_pro
        INNER JOIN tipo as t
        on t.id_tipo = fa.id_tipo");

        $consulta->execute();

        return $consulta->fetchAll();
    }
}
