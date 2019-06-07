<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Term;

class TermController extends Controller
{

    public function index(){

    	$terms = Term::paginate(6);

    	return view('admin.terms.index', compact('terms'));

    }

    public function detail($id){

    	$term = Term::find($id);

    	return view('admin.terms.detail', compact('term'));

    }

    public function create(){

    	return view('admin.terms.create');
    	
    }

    public function store(Request $request){
    	
    	 $this->validate($request,[
            'title' => 'required|max:255',
            'content' => 'required',
            ]);

    	if(Term::create($request->all())){
    		return redirect()->to('admin/terms')->with('sucesso','Contrato cadastrado com sucesso!');
    	}else{
    		return redirect()->to('admin/terms')->with('erro','Erro ao cadastrar o contrato, tente novamente mais tarde.');
    	} 

    }

    public function edit($id){
    	
    	$term = Term::find($id);

    	return view('admin.terms.edit', compact('term'));	
    }

    public function update(Request $request, $id){
    	
    	 $this->validate($request,[
            'title' => 'required|max:255',
            'content' => 'required',
            ]);

    	$term = Term::find($id); 

    	if($term->update($request->all())){
    		return redirect()->to('admin/terms')->with('sucesso','Contrato editado com sucesso!');
    	}else{
    		return redirect()->to('admin/terms')->with('erro','Erro ao editar o contrato, tente novamente mais tarde.');
    	} 

    }

    public function delete($id){
    	
    	$term = Term::find($id);

    	if($term->delete()){
    		return redirect()->back()->with('sucesso','Contrato deletado com sucesso!');
    	}else{
    		return redirect()->back()->with('erro','Erro ao deletar o contrato, tente novamente mais tarde.');
    	}

    }
}
