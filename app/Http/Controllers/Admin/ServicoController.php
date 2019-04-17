<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Servico;

class ServicoController extends Controller
{

    public function index(){

        $servicos = Servico::limit(6)->get();

         return view('admin.servicos.index', compact('servicos'));
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

        $servico = Servico::find($id);

        return view('admin.servicos.edit', compact('servico'));
    }

    public function update(Request $request, $id){

        $this->validate($request,[
            'titulo' => 'required|max:255',
            'descricao' => 'required',
            'img' => 'file|image|mimes:jpeg,jpg,png',
        ]);

        $servico = Servico::find($id);

        if($servico->update($request->all())){

            return redirect()->back()->with('sucesso','Serviço editado com sucesso!');
        }

        return redirect()->back()->with('erro','Ocorreu algum erro ao cadastrar o serviço, tente novamente mais tarde');
    }

    public function delete($id){

        $servico = Servico::find($id);

        if($servico->delete()){
            return redirect()->back()->with('sucesso','Serviço excluído com sucesso!');
        }

        return redirect()->back()->with('erro','Ocorreu algum erro ao excluir o serviço, tente novamente mais tarde');
    }
}
