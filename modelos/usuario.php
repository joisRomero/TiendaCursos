<?php

include_once 'conexion.php';

class Usuario {
    private $id;
    private $dni;
    private $nombre;
    private $apPaterno;
    private $apMaterno;
    private $correo;
    private $nombreUsuario;
    private $clave;
    private $vigencia;
    private $rol;

    function __construct($id, $dni, $nombre, $apPaterno, $apMaterno, $correo, $nombreUsuario, $clave, $vigencia, $rol)
    {
        $this->id = $id;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apPaterno = $apPaterno;
        $this->apMaterno = $apMaterno;
        $this->correo = $correo;
        $this->nombreUsuario = $nombreUsuario;
        $this->clave = $clave;
        $this->vigencia = $vigencia;
        $this->rol = $rol;
    }

    public function existeUsuario($nombreUsuario, $clave){
        // $md5clave = md5($clave);

        $consulta = "SELECT * FROM usuario WHERE nombreUsuario_usu = '$nombreUsuario' AND clave_usu = '$clave'";
        $respuesta = mysqli_query(Conexion::conexion(), $consulta);
        $fila = mysqli_fetch_array($respuesta);

        if(!empty($fila)){
            return true;
        }else{
            return false;
        }
    }

    public function setearUsuario($nombreUsuario)
    {
        $consulta = "SELECT * FROM usuario WHERE nombreUsuario_usu = '$nombreUsuario'";
        $respuesta = mysqli_query(Conexion::conexion(), $consulta);
        while($fila = mysqli_fetch_array($respuesta)){
            $this->id = $fila['id_usu'];
            $this->dni = $fila['dni_usu'];
            $this->nombre = $fila['nombre_usu'];
            $this->apPaterno = $fila['apPater_usu'];
            $this->apMaterno = $fila['apMater_usu'];
            $this->correo = $fila['correo_usu'];
            $this->nombreUsuario = $fila['nombreUsuario_usu'];
            $this->clave = $fila['clave_usu'];
            $this->vigencia = $fila['vigencia_usu'];

            if ($fila['rol_usu'] == 'A'){
                $this->rol = "Administrador";
            } else if ($fila['rol_usu'] == 'P'){
                $this->rol = "Profesor";
            } else if ($fila['rol_usu'] == 'E'){
                $this->rol = "Estudiante";
            }
        }
    }

    public function getNombre(){
        return $this->nombre.' '.$this->apPaterno.' '.$this->apMaterno;
    }

    public function getNombreUsuario(){
        return $this->nombreUsuario;
    }

    public function getRol(){
        return $this->rol;
    }

    public function registrarUsuario($id, $dni, $nombre, $apPaterno, $apMaterno, $correo, $nombreUsuario, $clave, $vigencia, $rol){
        $consulta = "INSERT INTO usuario(id_usu, dni_usu, nombre_usu, apPater_usu, apMater_usu, correo_usu, nombreUsuario_usu, clave_usu, rol_usu, vigencia_usu)
        VALUES('$id', '$dni', '$nombre', '$apPaterno', '$apMaterno', '$correo', '$nombreUsuario', '$clave', '$rol', '$vigencia')";
        $respuesta = mysqli_query(Conexion::conexion(), $consulta);
        return $respuesta;
    }

    public function actualizarUsuario($id, $dni, $nombre, $apPaterno, $apMaterno, $correo, $nombreUsuario, $clave, $vigencia, $rol){
        $consulta = "UPDATE usuario
        SET dni_usu = '$dni', nombre_usu = '$nombre', apPater_usu' = $apPaterno', apMater_usu = '$apMaterno', correo_usu = '$correo', nombreUsuario_usu = '$nombreUsuario', clave_usu = '$clave', rol_usu = '$rol', vigencia_usu = '$vigencia'
        WHERE id_usu = '$id'";
        $respuesta = mysqli_query(Conexion::conexion(), $consulta);
        return $respuesta;
    }

    public function leerUsuario($nombreUsuario){
        $consulta = "SELECT dni_usu, nombre_usu, apPater_usu', apMater_usu, correo_usu, nombreUsuario_usu, clave_usu, rol_usu, vigencia_usu
        FROM usuario WHERE nombreUsuario_usu = '$nombreUsuario'";
        $respuesta = mysqli_query(Conexion::conexion(), $consulta);
        return $respuesta;
    }

    public function darDeBajaUsuario($id){
        $consulta = "UPDATE usuario
        SET vigencia_usu = 0;
        WHERE id_usu = '$id'";
        $respuesta = mysqli_query(Conexion::conexion(), $consulta);
        return $respuesta;
    }

}