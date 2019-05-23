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

function termStatus($status)
{
    $result = '';
    
    if($status == 0){

        $result = '<span class="text-danger">Inativo</span>';

    }else{
        
        $result = '<span class="text-success">Ativo</span>';

    }

    return $result;
}

function termTipe($tipe)
{
    $result = '';
    
    if($tipe == 1){

        $result = 'Consultores';

    }else{
        
        $result = 'Empresas';

    }

    return $result;
}

function order($key){

    $result = array();

    if($key == 0){
        $result[0] = 'order-1';
        $result[1] = 'order-2';
    }

    if($key == 1){
        $result[0] = 'order-2';
        $result[1] = 'order-1';
    }

    if($key == 2){
        $result[0] = 'order-1';
        $result[1] = 'order-2';
    }

    if($key == 3){
        $result[0] = 'order-2';
        $result[1] = 'order-1';
    }

    return $result;

}


?>