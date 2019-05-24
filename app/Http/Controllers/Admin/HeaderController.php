<?php

namespace App\Http\Controllers\Admin;

use App\Header;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeaderController extends Controller
{
    public function index(){

        $headers = Header::all();

        return view('admin.header.index', compact('headers'));

    }

    public function create(){

        return view('admin.header.create');

    }

    public function store(Request $request){

        $this->validate($request,[
            'logo' => 'required',
            'logo-desc' => 'required',
            'banner' => 'required',
            'banner-desc' => 'required'
        ]);

        if(Header::create($request->all())){
            return redirect('admin/header')->with('sucesso', 'Cadastro realizado com sucesso!');
        }else{
            return redirect('admin/header')->with('erro', 'Ocorreu algum erro ao fazer o cadastro, tente novamente mais tarde!');
        }

    }

    public function edit($id){

        $header = Header::find($id);

        return view('admin.header.create', compact('header'));

    }

    public function update(Request $request, $id){

        $this->validate($request,[
            'logo' => 'required',
            'logo-desc' => 'required',
            'banner' => 'required',
            'banner-desc' => 'required'
        ]);

        $header = Header::find($id);

        if($header->update($request->all())){
            return redirect('admin/header')->with('sucesso', 'Registro editado com sucesso!');
        }else{
            return redirect('admin/header')->with('erro', 'Ocorreu algum erro ao fazer a edição deste registro, tente novamente mais tarde!');
        }

    }

    public function detail($id){

        $header = Header::find($id);

        return view('admin.header.create', compact('header'));

    }

    public function delete($id){

        $header = Header::find($id);

        if($header->delete()){
            return redirect('admin/header')->with('sucesso', 'Registro deletado com sucesso!');
        }else{
            return redirect('admin/header')->with('erro', 'Ocorreu algum erro ao deletar o registro, tente novamente mais tarde!');
        }

    }
}
