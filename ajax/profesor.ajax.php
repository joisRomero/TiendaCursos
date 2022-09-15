<?php

require_once "../controladores/profesor.controlador.php";
require_once "../modelos/profesor.modelo.php";

class ajaxProfesor
{
    public function ajaxListaProfesores()
    {
        $profesor = ProfesorControlador::ctrListaProfesores();

        echo json_encode($profesor, JSON_UNESCAPED_UNICODE);
    }
}


if (isset($_POST['accion']) && $_POST['accion'] == 1){  //LISTAR PARA COMBOBOX
    $profesor = new ajaxProfesor();
    $profesor->ajaxListaProfesores();
}