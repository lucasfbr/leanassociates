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



?>