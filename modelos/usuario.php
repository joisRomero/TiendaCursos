<?php

include_once 'conexion.php';

class Usuario
{
    private $id;
    private $nombre;
    private $clave;
    private $vigencia;
    private $img;
    private $rol;

    public function existeUsuario($nombre, $clave)
    {
        // $md5clave = md5($clave);

        $consulta = "SELECT * FROM usuario WHERE nombre_usu = '$nombre' AND clave_usu = '$clave' AND vigencia_usu = 1";
        $respuesta = mysqli_query(Conexion::conexion(), $consulta);
        $fila = mysqli_fetch_array($respuesta);

        if (!empty($fila)) {
            return true;
        } else {
            return false;
        }
    }

    public function setearUsuario($nombre)
    {
        $consulta = "SELECT * FROM usuario WHERE nombre_usu = '$nombre'";
        $respuesta = mysqli_query(Conexion::conexion(), $consulta);;
        while ($fila = mysqli_fetch_array($respuesta)) {
            $this->id = $fila['id_usu'];
            $this->nombre = $fila['nombre_usu'];
            $this->vigencia = $fila['vigencia_usu'];
            $this->img = $fila['img_usu'];
            if ($fila['rol_usu'] == 'A') {
                $this->rol = "Administrador";
            } else if ($fila['rol_usu'] == 'E') {
                $this->rol = "Estudiante";
            }
        }
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function getImg()
    {
        return $this->img;
    }
}