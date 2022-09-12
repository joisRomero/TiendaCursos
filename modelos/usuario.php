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
        $respuesta = mysqli_query(Conexion::conexion(), $consulta);;
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
}