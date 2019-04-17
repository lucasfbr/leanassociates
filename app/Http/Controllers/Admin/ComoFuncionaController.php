<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\ComoFunciona;

class ComoFuncionaController extends Controller
{
    
     public function index(){

        $comofunciona = ComoFunciona::limit(6)->get();

         return view('admin.comofunciona.index', compact('comofunciona'));
    }

    public function create(){

        return view('admin.comofunciona.create');
    }

    public function store(Request $request){

        $this->validate($request,[
            'titulo' => 'required|max:255',
            'texto' => 'required',
            'img' => 'required',
            ]);

        if(ComoFunciona::create($request->all())){

            return redirect()->back()->with('sucesso','Registro cadastrado com sucesso!');

        }

        return redirect()->back()->with('erro','Ocorreu algum erro ao salvar o registro, tente novamente mais tarde');
        
    }

    public function edit($id){

        $comofunciona = ComoFunciona::find($id);

        return view('admin.comofunciona.edit', compact('comofunciona'));
    }

    public function update(Request $request, $id){

        $this->validate($request,[
            'titulo' => 'required|max:255',
            'texto' => 'required',
            'img' => 'required',
        ]);

        $comofunciona = ComoFunciona::find($id);

        if($comofunciona->update($request->all())){

            return redirect()->back()->with('sucesso','Registro editado com sucesso!');
        }

        return redirect()->back()->with('erro','Ocorreu algum erro ao editar o registro, tente novamente mais tarde');
    }

    public function detail($id){

        $comofunciona = ComoFunciona::find($id);

        return view('admin.comofunciona.detail', compact('comofunciona'));

    }

    public function delete($id){

        $comofunciona = ComoFunciona::find($id);

        if($comofunciona->delete()){
            return redirect()->back()->with('sucesso','Registro excluído com sucesso!');
        }

        return redirect()->back()->with('erro','Ocorreu algum erro ao excluir o registro, tente novamente mais tarde');
    }
}
