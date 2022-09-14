<?php

require_once "../controladores/formacionAcademica.controlador.php";
require_once "../modelos/formacionAcademica.modelo.php";


class ajaxFormacionAcademica{

    public function ajaxListarFormacionAcademica()
    {
        $formacionAcademica = FormacionAcademicaControlador::ctrListarFormacionAcademica();

        echo json_encode($formacionAcademica);
    }
    
}

if(isset($_POST['accion']) && $_POST['accion'] == 1){
    $formacionAcademica = new ajaxFormacionAcademica();
    $formacionAcademica->ajaxListarFormacionAcademica();
}