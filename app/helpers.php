<?php

function tipoRole($role){

    $valor = '';

    if($role == 0){
        $valor = 'Admin';
    }else if($role == 1){
        $valor = 'Consultor';
    }else{
        $valor = 'Empresa';
    }

    return $valor;
}

function data_br($value, $format='d/m/Y')
{
    return date($format, strtotime($value));
}


?>