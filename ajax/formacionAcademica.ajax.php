<?php

require_once "../controladores/formacionAcademica.controlador.php";
require_once "../modelos/formacionAcademica.modelo.php";


class ajaxFormacionAcademica{

    public $nombre;
    public $descripcion;
    public $aprendizaje;
    public $duracion;
    public $precio;
    public $img;
    public $profesor;
    public $tipo;

    public function ajaxListarFormacionAcademica()
    {
        $formacionAcademica = FormacionAcademicaControlador::ctrListarFormacionAcademica();

        echo json_encode($formacionAcademica);
    }

    public function ajaxListarNoComprados($idEstudiante){
        $formacionAcademica = FormacionAcademicaControlador::ctrListarNoComprados($idEstudiante);

        echo json_encode($formacionAcademica);
    }

    public function ajaxListarFormacionAcademicaResumido()
    {
        $formacionAcademica = FormacionAcademicaControlador::ctrListarFormacionAcademicaResumido();

        echo json_encode($formacionAcademica);
    }
    
    public function ajaxRegistrarFormacionAcademica()
    {
        $formacionAcademica = FormacionAcademicaControlador::ctrRegistrarFormacionAcademica(
            $this->nombre,
            $this->descripcion,
            $this->aprendizaje,
            $this->duracion,
            $this->precio,
            $this->img,
            $this->profesor,
            $this->tipo
        );
        echo json_encode($formacionAcademica);
    }

}

if(isset($_POST['accion']) && $_POST['accion'] == 1){ //LISTAR
    $formacionAcademica = new ajaxFormacionAcademica();
    $formacionAcademica->ajaxListarFormacionAcademica();
} else if (isset($_POST['accion']) && $_POST['accion'] == 2){ //REGISTRAR
    $imagen = $_FILES['imagen'];
    $nombreImagen = $imagen['name'];
    $temporal = $imagen['tmp_name'];
    $carpeta = "../vistas/assets/dist/img/formacion";
    $ruta = $carpeta.'/'.$nombreImagen;
	move_uploaded_file($temporal, $carpeta."/".$nombreImagen);

    $registrarFormacacion = new ajaxFormacionAcademica();
    $registrarFormacacion->nombre = $_POST["nombre"];
    $registrarFormacacion->descripcion = $_POST["descripcion"];
    $registrarFormacacion->aprendizaje = $_POST["aprendizaje"];
    $registrarFormacacion->duracion = $_POST["duracion"];
    $registrarFormacacion->precio = $_POST["precio"];
    $registrarFormacacion->img = $ruta;
    $registrarFormacacion->profesor = $_POST["profesor"];
    $registrarFormacacion->tipo = $_POST["tipo"];

    $registrarFormacacion->ajaxRegistrarFormacionAcademica();
} else if(isset($_POST['accion']) && $_POST['accion'] == 5){ //LISTAR
    $formacionAcademica = new ajaxFormacionAcademica();
    $formacionAcademica->ajaxListarFormacionAcademicaResumido();
} else if(isset($_POST['accion']) && $_POST['accion'] == 6){ //LISTAR
    $idEstudiante = $_POST["idEstudiante"];
    $formacionAcademica = new ajaxFormacionAcademica();
    $formacionAcademica->ajaxListarNoComprados($idEstudiante);
} 