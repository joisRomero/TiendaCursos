<?php

require_once "../controladores/profesor.controlador.php";
require_once "../modelos/profesor.modelo.php";

class ajaxProfesor {

    public $id;
    public $dni;
    public $nombre;
    public $apPater;
    public $apMater;
    public $descripcion;
    public $img;
    public $vigencia;

    public function ajaxListaProfesor() {
        $profesor = ProfesorControlador::ctrListaProfesor();
        echo json_encode($profesor, JSON_UNESCAPED_UNICODE);
    }

    public function ajaxUltimosCincoRegistrados() {
        $profesor = ProfesorControlador::ctrUltimosCincoRegistrados();
        echo json_encode($profesor, JSON_UNESCAPED_UNICODE);
    }

    public function ajaxListaProfesores() {
        $profesor = ProfesorControlador::ctrListaProfesores();
        echo json_encode($profesor, JSON_UNESCAPED_UNICODE);
    }

    public function ajaxCantidadProfesores() {
        $profesor = ProfesorControlador::ctrCantidadProfesores();
        echo json_encode($profesor, JSON_UNESCAPED_UNICODE);
    }

    public function ajaxRegistrarProfesor() {
        $profesor = ProfesorControlador::ctrRegistrarProfesor($this->dni,$this->nombre, $this->apPater, $this->apMater, $this->descripcion,$this->img);
        echo json_encode($profesor);
    }

    public function ajaxActualizarProfesor() {
        $profesor = ProfesorControlador::ctrActualizarProfesor($this->id, $this->dni, $this->nombre, $this->apPater, $this->apMater, $this->descripcion);
        echo json_encode($profesor);
    }

    public function ajaxCambiarVigenciaProfesor() {
        $profesor = ProfesorControlador::ctrCambiarVigenciaProfesor($this->id, $this->vigencia);
        echo json_encode($profesor);
    }
}


if (isset($_POST['accion']) && $_POST['accion'] == 1){  //LISTAR
    $profesor = new ajaxProfesor();
    $profesor->ajaxListaProfesor();

} else if (isset($_POST['accion']) && $_POST['accion'] == 2) { // REGISTRAR
    $imagen = $_FILES['imagen'];
    $nombreImagen = $imagen['name'];
    $temporal = $imagen['tmp_name'];
    $carpeta = "../vistas/assets/dist/img/profesor";
    $ruta = $carpeta.'/'.$nombreImagen;
	move_uploaded_file($temporal, $carpeta."/".$nombreImagen);

    $profesor = new ajaxProfesor();
    $profesor->dni = $_POST['dni'];
    $profesor->nombre = $_POST['nombre'];
    $profesor->apPater = $_POST['apPater'];
    $profesor->apMater = $_POST['apMater'];
    $profesor->descripcion = $_POST['descripcion'];
    $profesor->img = $ruta;
    $profesor->ajaxRegistrarProfesor();

} else if(isset($_POST['accion']) && $_POST['accion'] == 3){ //LISTAR PARA COMBOBOX
    $profesor = new ajaxProfesor();
    $profesor->ajaxListaProfesores();

} else if (isset($_POST['accion']) && $_POST['accion'] == 4) { // ACTUALIZAR
    $profesor = new ajaxProfesor();
    $profesor->id = $_POST['id'];
    $profesor->dni = $_POST['dni'];
    $profesor->nombre = $_POST['nombre'];
    $profesor->apPater = $_POST['apPater'];
    $profesor->apMater = $_POST['apMater'];
    $profesor->descripcion = $_POST['descripcion'];
    $profesor->ajaxActualizarProfesor();

} else if (isset($_POST['accion']) && $_POST['accion'] == 5) { // VIGENCIA
    $profesor = new ajaxProfesor();
    $profesor->id = $_POST['id'];
    $profesor->vigencia = $_POST['vigencia'];
    $profesor->ajaxCambiarVigenciaProfesor();

} else if (isset($_POST['accion']) && $_POST['accion'] == 6) { 
    $profesor = new ajaxProfesor();
    $profesor->id = $_POST['id'];
    $profesor->vigencia = $_POST['vigencia'];
    $profesor->ajaxCambiarVigenciaProfesor();

} else if (isset($_POST['accion']) && $_POST['accion'] == 7) { 
    $profesor = new ajaxProfesor();
    $profesor->ajaxCantidadProfesores();

} else if (isset($_POST['accion']) && $_POST['accion'] == 8) { 
    $profesor = new ajaxProfesor();
    $profesor->ajaxUltimosCincoRegistrados();

}