<?php

class Conexion
{
    static public function conectar()
    {
        try {
            $conexion = new PDO(
                'mysql:host=localhost; dbname=tienda_cursos_db',
                'root',
                '',
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')
            );
            return $conexion;
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
    }

    static public function conexion()
    {
        try {
            $conexion = mysqli_connect('localhost', 'root', '', 'tienda_cursos_db');
            mysqli_set_charset($conexion, "utf8");
            return $conexion;
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
    }
}
