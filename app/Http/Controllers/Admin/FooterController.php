<?php

namespace App\Http\Controllers\admin;

use App\Footer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FooterController extends Controller
{
    public function index(){

        $footer = Footer::all();

        return view('admin.footer.index', compact('footer'));

    }

    public function create(){

        return view('admin.footer.create');

    }

    public function store(Request $request){

        $this->validate($request,[
            'titulo' => 'required|max:255',
            'contato' => 'required',
            'icone' => 'required',
        ]);

        if(Footer::create($request->all())){
            return redirect('admin/footer')->with('sucesso', 'Cadastro realizado com sucesso!');
        }else{
            return redirect('admin/footer')->with('erro', 'Ocorreu algum erro ao fazer o cadastro, tente novamente mais tarde!');
        }

    }

    public function edit($id){

        $footer = Footer::find($id);

        return view('admin.footer.edit', compact('footer'));

    }

    public function update(Request $request, $id){

        $this->validate($request,[
            'titulo' => 'required|max:255',
            'contato' => 'required',
            'icone' => 'required',
        ]);

        $footer = Footer::find($id);

        if($footer->update()){
            return redirect('admin/footer')->with('sucesso', 'Contato editado com sucesso!');
        }else{
            return redirect('admin/footer')->with('erro', 'Ocorreu algum erro ao editar seu contato, tente novamente mais tarde!');
        }

    }

    public function delete($id){

        $footer = Footer::find($id);

        if($footer->delete()){
            return redirect('admin/footer')->with('sucesso', 'Contato excluído com sucesso!');
        }else{
            return redirect('admin/footer')->with('erro', 'Ocorreu algum erro ao excluir seu contato, tente novamente mais tarde!');
        }

    }
}
