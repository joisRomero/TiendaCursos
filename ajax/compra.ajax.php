<?php

require_once "../controladores/compra.controlador.php";
require_once "../modelos/compra.modelo.php";


class ajaxCompra{

    public $idEstudiante;
    public $idFormacion;

    public function ajaxRegistrarCompra()
    {
        $compra = CompraControlador::ctrRegistrarCompra(
            $this->idEstudiante,
            $this->idFormacion
        );
        echo json_encode($compra);
    }

}

if(isset($_POST['accion']) && $_POST['accion'] == 1){ //LISTAR
    $registrarCompra = new ajaxCompra();
    $registrarCompra->idEstudiante = $_POST["idEstudiante"];
    $registrarCompra->idFormacion = $_POST["idFormacion"];

    $registrarCompra->ajaxRegistrarCompra();
}