<?php

require_once 'conexion.php';

class FormacionAcademicaModelo
{

    static function mdlListarFormacionAcademica()
    {
        $consulta = Conexion::conectar()->prepare("SELECT fa.id_forma, fa.nombre_forma, fa.descripcion_forma, fa.aprendizaje_forma, 
		concat(fa.duracion_forma, ' Semanas'), fa.fechaCreacion_forma, fa.precio_forma,
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
}
