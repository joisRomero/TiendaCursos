<?php
include_once '../modelos/usuario.php';
include_once '../controladores/sesionUsuario.php';
$sesionUsuario = new SesionUsuario();
$usuario = new Usuario();
$usuario->setearUsuario($sesionUsuario->getUsuarioActual());

if (!isset($_SESSION['usuario'])) {
    header("location:../vistas/index.php");
}

$con = new Conexion();
$idUsur = $usuario->getId();
$s_estudiante = "SELECT * FROM estudiante WHERE id_usu = $idUsur";
$r_estudiante = mysqli_query($con->conexion(), $s_estudiante);
while ($fila = mysqli_fetch_array($r_estudiante)) {
    $idEstudiante = $fila['id_estu'];
}

$con = new Conexion();
$s_formaciones = "SELECT f.id_forma ,f.nombre_forma, f.descripcion_forma, f.img
                    FROM compra as c
                    INNER JOIN formacion_academica as f
                    on c.id_forma = f.id_forma
                    WHERE c.id_estu = $idEstudiante and c.vigente_compra = 1"; //ORDER BY id_forma DESC
$r_formaciones = mysqli_query($con->conexion(), $s_formaciones);

function limitarCadena($cadena, $limite){
	if(strlen($cadena) > $limite){
		return substr($cadena, 0, $limite) . "[...]";
	}
	return $cadena;
}

