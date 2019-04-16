<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Servico;

class ServicoController extends Controller
{
    public function create(){

        return view('admin.servicos.index');
    }

    public function store(Request $request){

        if(Servico::create($request->all())){

            return redirect('/admin/servicos')->with('sucesso','Serviço cadastrado com sucesso!');

        }else{

            return redirect('/admin/servicos')->with('erro','Ocorreu algum erro ao cadastrar o serviço, tente novamente mais tarde');
        }





    }
}
