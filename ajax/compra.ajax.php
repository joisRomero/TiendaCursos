<?php

require_once "../controladores/compra.controlador.php";
require_once "../modelos/compra.modelo.php";


class ajaxCompra{

    public $id;
    public $vigencia;
    public $idEstudiante;
    public $idFormacion;

    public function ajaxListarCompra() {
        $compra = CompraControlador::ctrListarCompra();
        echo json_encode($compra);
    }

    public function ajaxGanacia() {
        $compra = CompraControlador::ctrGanacia();
        echo json_encode($compra);
    }
    public function ajaxCursosMasVendidos() {
        $compra = CompraControlador::ctrCursosMasVendidos();
        echo json_encode($compra);
    }

    public function ajaxCambiarVigenciaCompra() {
        $compra = CompraControlador::ctrCambiarVigenciaCompra($this->id, $this->vigencia);
        echo json_encode($compra);
    }

    public function ajaxRegistrarCompra() {
        $compra = CompraControlador::ctrRegistrarCompra(
            $this->idEstudiante,
            $this->idFormacion
        );
        echo json_encode($compra);
    }

}

if(isset($_POST['accion']) && $_POST['accion'] == 1){ //REGISTRAR?
    $registrarCompra = new ajaxCompra();
    $registrarCompra->idEstudiante = $_POST["idEstudiante"];
    $registrarCompra->idFormacion = $_POST["idFormacion"];
    $registrarCompra->ajaxRegistrarCompra();

} else if(isset($_POST['accion']) && $_POST['accion'] == 2) { //LISTAR
    $compra = new ajaxCompra();
    $compra->ajaxListarCompra();
} else if(isset($_POST['accion']) && $_POST['accion'] == 3) { //VIGENCIA
    $compra = new ajaxCompra();
    $compra->id = $_POST["id"];
    $compra->vigencia = $_POST["vigencia"];
    $compra->ajaxCambiarVigenciaCompra();
} else if(isset($_POST['accion']) && $_POST['accion'] == 4) { //VIGENCIA
    $compra = new ajaxCompra();
    $compra->ajaxGanacia();
} else if(isset($_POST['accion']) && $_POST['accion'] == 5) { //VIGENCIA
    $compra = new ajaxCompra();
    $compra->ajaxCursosMasVendidos();
}