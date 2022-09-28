<?php

require_once "../controladores/estudiante.controlador.php";
require_once "../modelos/estudiante.modelo.php";

class ajaxEstudiante {
    public $id_estu;
    public $nombre_estu;
    public $apellidos_estu;
    public $correo_estu;
    public $vigencia_estu;
    public $usuario_estu;

    //Lista para la tabla
    public function ajaxListarEstudiante() {
        $estudiante = EstudianteControlador::ctrListarEstudiante();
        echo json_encode($estudiante);
    }

    public function ajaxCantidadEstudiante() {
        $estudiante = EstudianteControlador::ctrCantidadEstudiante();
        echo json_encode($estudiante);
    }

    public function ajaxUltimosCincoRegistrados() {
        $estudiante = EstudianteControlador::ctrUltimosCincoRegistrados();
        echo json_encode($estudiante);
    }

    //Lista para la ventana modal
    // public function ajaxListaEstudiante() {
    //     $estudiante = EstudianteControlador::ctrListaEstudiante();
    //     echo json_encode($estudiante);
    // }

    public function ajaxRegistrarEstudiante() {
        $estudiante = EstudianteControlador::ctrRegistrarEstudiante($this->nombre_estu, $this->apellidos_estu, $this->correo_estu, $this->usuario_estu);
        echo json_encode($estudiante);
    }

    public function ajaxActualizarEstudiante() {
        $estudiante = EstudianteControlador::ctrActualizarEstudiante($this->id_estu, $this->nombre_estu, $this->apellidos_estu, $this->correo_estu, $this->usuario_estu);
        echo json_encode($estudiante);
    }

    public function ajaxCambiarVigenciaEstudiante() {
        $estudiante = EstudianteControlador::ctrCambiarVigenciaEstudiante($this->id_estu, $this->vigencia_estu);
        echo json_encode($estudiante);
    }
}

if (isset($_POST['accion']) && $_POST['accion'] == 1) { // Listar
    $estudiante = new ajaxEstudiante();
    $estudiante->ajaxListarEstudiante();

} else if (isset($_POST['accion']) && $_POST['accion'] == 2) { // Registrar
    $estudiante = new ajaxEstudiante();
    $estudiante->nombre_estu = $_POST["nombre_estu"];
    $estudiante-> apellidos_estu= $_POST["apellidos_estu"];
    $estudiante-> correo_estu= $_POST["correo_estu"];
    $estudiante-> usuario_estu= $_POST["usuario_estu"];
    $estudiante->ajaxRegistrarEstudiante();

// } else if (isset($_POST['accion']) && $_POST['accion'] == 3) { //ventana modal
//     $estudiante = new ajaxEstudiante();
//     $estudiante->ajaxListaEstudiante();

} else if (isset($_POST['accion']) && $_POST['accion'] == 4) { // Actualizar
    $estudiante = new ajaxEstudiante();
    $estudiante->id_estu = $_POST["id_estu"];
    $estudiante->nombre_estu = $_POST["nombre_estu"];
    $estudiante->apellidos_estu = $_POST["apellidos_estu"];
    $estudiante->correo_estu = $_POST["correo_estu"];
    $estudiante->usuario_estu = $_POST["idUsuario_estu"];
    $estudiante->ajaxActualizarEstudiante();

} else if (isset($_POST['accion']) && $_POST['accion'] == 5) { // Vigencia
    $estudiante = new ajaxEstudiante();
    $estudiante->id_estu = $_POST["id_estu"];
    $estudiante->vigencia_estu = $_POST["vigencia_estu"];
    $estudiante->ajaxCambiarVigenciaEstudiante();

} else if (isset($_POST['accion']) && $_POST['accion'] == 6) { 
    $estudiante = new ajaxEstudiante();
    $estudiante->ajaxCantidadEstudiante();

} else if (isset($_POST['accion']) && $_POST['accion'] == 7) {
    $estudiante = new ajaxEstudiante();
    $estudiante->ajaxUltimosCincoRegistrados();
}