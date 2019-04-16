<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Servico;

class ServicoController extends Controller
{

    public function index(){

         return view('admin.servicos.index');
    }

    public function create(){

        return view('admin.servicos.create');
    }

    public function store(Request $request){

        $this->validate($request,[
            'titulo' => 'required|max:255',
            'descricao' => 'required',
            'img' => 'required|file|image|mimes:jpeg,jpg,png',
            ]);

        if(Servico::create($request->all())){

            return redirect()->back()->with('sucesso','Serviço cadastrado com sucesso!');

        }

        return redirect()->back()->with('erro','Ocorreu algum erro ao cadastrar o serviço, tente novamente mais tarde');
        
    }

    public function edit($id){

    }

    public function update(Request $request, $id){
        
    }

    public function delete($id){
        
    }
}
