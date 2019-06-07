<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Servico;
use App\ContentServico;

class ServicoController extends Controller
{

    public function index(){

        $servicos = Servico::orderBy('created_at', 'desc')->get();

         return view('admin.servicos.index', compact('servicos'));
    }

    public function create(){

        return view('admin.servicos.create');
    }

    public function store(Request $request){

        $this->validate($request,[
            'title' => 'required|max:255',
            'content' => 'required',
            ]);

        if(Servico::create($request->all())){

            return redirect('admin/servicos')->with('sucesso','Serviço cadastrado com sucesso!');

        }

        return redirect()->back()->with('erro','Ocorreu algum erro ao cadastrar o serviço, tente novamente mais tarde');
        
    }

    public function edit($id){

        $servico = Servico::find($id);

        return view('admin.servicos.edit', compact('servico'));
    }

    public function update(Request $request, $id){

        $this->validate($request,[
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $servico = Servico::find($id);

        if($servico->update($request->all())){

            return redirect('admin/servicos')->with('sucesso','Serviço editado com sucesso!');
        }

        return redirect()->back()->with('erro','Ocorreu algum erro ao cadastrar o serviço, tente novamente mais tarde');
    }

    public function detail($id){

        $servico = Servico::find($id);

        return view('admin.servicos.detail', compact('servico'));

    }

    public function delete($id){

        $servico = Servico::find($id);

        if($servico->delete()){
            return redirect()->back()->with('sucesso','Serviço excluído com sucesso!');
        }

        return redirect()->back()->with('erro','Ocorreu algum erro ao excluir o serviço, tente novamente mais tarde');
    }


    public function contentIndex(){

        $servicos = ContentServico::paginate(6);

         return view('admin.servicos.content.index', compact('servicos'));
    }

    public function contentCreate(){

        return view('admin.servicos.content.create');
    }

    public function contentStore(Request $request){

        $this->validate($request,[
            'titulo' => 'required|max:255',
            'descricao' => 'required',
            'img' => 'required|file|image|mimes:jpeg,jpg,png',
            ]);

        if(ContentServico::create($request->all())){

            return redirect('admin/servicosContent')->with('sucesso','Serviço cadastrado com sucesso!');

        }

        return redirect()->back()->with('erro','Ocorreu algum erro ao cadastrar o serviço, tente novamente mais tarde');
        
    }

    public function contentEdit($id){

        $servico = ContentServico::find($id);

        return view('admin.servicos.content.edit', compact('servico'));
    }

    public function contentUpdate(Request $request, $id){

        $this->validate($request,[
            'titulo' => 'required|max:255',
            'descricao' => 'required',
            'img' => 'file|image|mimes:jpeg,jpg,png',
        ]);

        $servico = ContentServico::find($id);

        if($servico->update($request->all())){

            return redirect('admin/servicosContent')->with('sucesso','Serviço editado com sucesso!');
        }

        return redirect()->back()->with('erro','Ocorreu algum erro ao cadastrar o serviço, tente novamente mais tarde');
    }

    public function contentDetail($id){

        $servico = ContentServico::find($id);

        return view('admin.servicos.content.detail', compact('servico'));

    }

    public function contentDelete($id){

        $servico = ContentServico::find($id);

        if($servico->delete()){
            return redirect()->back()->with('sucesso','Serviço excluído com sucesso!');
        }

        return redirect()->back()->with('erro','Ocorreu algum erro ao excluir o serviço, tente novamente mais tarde');
    }

}
