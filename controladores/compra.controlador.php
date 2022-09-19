<?php

class CompraControlador
{
    static function ctrRegistrarCompra(
        $idEstudiante,
        $idFormacion
    ) {
        $registrarCompra = CompraModelo::mdlRegistrarCompra(
            $idEstudiante,
            $idFormacion
        );
        return $registrarCompra;
    }
}