<?php

require_once "../controladores/formacionAcademica.controlador.php";
require_once "../modelos/formacionAcademica.modelo.php";


class ajaxFormacionAcademica{

    public $id;
    public $nombre;
    public $descripcion;
    public $aprendizaje;
    public $duracion;
    public $precio;
    public $img;
    public $profesor;
    public $tipo;

    public function ajaxListarFormacionAcademica() {
        $formacionAcademica = FormacionAcademicaControlador::ctrListarFormacionAcademica();

        echo json_encode($formacionAcademica);
    }

    public function ajaxListarNoComprados($idEstudiante) {
        $formacionAcademica = FormacionAcademicaControlador::ctrListarNoComprados($idEstudiante);

        echo json_encode($formacionAcademica);
    }

    public function ajaxListarFormacionAcademicaResumido() {
        $formacionAcademica = FormacionAcademicaControlador::ctrListarFormacionAcademicaResumido();

        echo json_encode($formacionAcademica);
    }

    public function ajaxRegistrarFormacionAcademica()
    {
        $formacionAcademica = FormacionAcademicaControlador::ctrRegistrarFormacionAcademica($this->nombre, $this->descripcion, $this->aprendizaje, $this->duracion, $this->precio, $this->img, $this->profesor, $this->tipo);

        echo json_encode($formacionAcademica);
    }

    public function ajaxActualizarFormacionAcademica() {
        $formacionAcademica = FormacionAcademicaControlador::ctrActualizarFormacionAcademica($this->id, $this->nombre, $this->descripcion, $this->aprendizaje, $this->duracion, $this->precio, $this->profesor, $this->tipo);

        echo json_encode($formacionAcademica);
    }

    public function ajaxCambiarVigenciaFormacionAcademica() {
        $formacionAcademica = FormacionAcademicaControlador::ctrCambiarVigenciaFormacionAcademica($this->id, $this->vigencia);

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

    $formacionAcademica = new ajaxFormacionAcademica();
    $formacionAcademica->nombre = $_POST["nombre"];
    $formacionAcademica->descripcion = $_POST["descripcion"];
    $formacionAcademica->aprendizaje = $_POST["aprendizaje"];
    $formacionAcademica->duracion = $_POST["duracion"];
    $formacionAcademica->precio = $_POST["precio"];
    $formacionAcademica->img = $ruta;
    $formacionAcademica->profesor = $_POST["profesor"];
    $formacionAcademica->tipo = $_POST["tipo"];
    $formacionAcademica->ajaxRegistrarFormacionAcademica();

} else if(isset($_POST['accion']) && $_POST['accion'] == 3) { //ACTUALIZAR
    $formacionAcademica = new ajaxFormacionAcademica();
    $formacionAcademica->id = $_POST["id"];
    $formacionAcademica->nombre = $_POST["nombre"];
    $formacionAcademica->descripcion = $_POST["descripcion"];
    $formacionAcademica->aprendizaje = $_POST["aprendizaje"];
    $formacionAcademica->duracion = $_POST["duracion"];
    $formacionAcademica->precio = $_POST["precio"];
    $formacionAcademica->profesor = $_POST["profesor"];
    $formacionAcademica->tipo = $_POST["tipo"];
    $formacionAcademica->ajaxActualizarFormacionAcademica();

} else if(isset($_POST['accion']) && $_POST['accion'] == 4) { //VIGENCIA
    $formacionAcademica = new ajaxFormacionAcademica();
    $formacionAcademica->id = $_POST["id"];
    $formacionAcademica->vigencia = $_POST["vigencia"];
    $formacionAcademica->ajaxCambiarVigenciaFormacionAcademica();

} else if(isset($_POST['accion']) && $_POST['accion'] == 5){ //LISTAR
    $formacionAcademica = new ajaxFormacionAcademica();
    $formacionAcademica->ajaxListarFormacionAcademicaResumido();

} else if(isset($_POST['accion']) && $_POST['accion'] == 6){ //LISTAR
    $idEstudiante = $_POST["idEstudiante"];
    $formacionAcademica = new ajaxFormacionAcademica();
    $formacionAcademica->ajaxListarNoComprados($idEstudiante);

}