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
            'logoDescricao' => 'required',
            'banner' => 'required',
            'bannerDescricao' => 'required'
        ]);

        if(Header::create($request->all())){
            return redirect('admin/header')->with('sucesso', 'Cadastro realizado com sucesso!');
        }else{
            return redirect('admin/header')->with('erro', 'Ocorreu algum erro ao fazer o cadastro, tente novamente mais tarde!');
        }

    }

    public function edit($id){

        $header = Header::find($id);

        return view('admin.header.edit', compact('header'));

    }

    public function update(Request $request, $id){

        $arrayValidate = [
            'logoDescricao' => 'required',
            'bannerDescricao' => 'required'
        ];

        //se o logo for alterado, adiciona a validação para o logo
        if($request->file('logo')){
            $arrayValidate['logo'] = 'file|image|mimes:jpeg,jpg,png';
        }

        //se o banner for alterado, adiciona a validação para o banner
        if($request->file('banner')){
            $arrayValidate['banner'] = 'file|image|mimes:jpeg,jpg,png';
        }

        $this->validate($request,$arrayValidate);

        if(!$request->input('status')){
            $request['status'] = '0';
        }

        $header = Header::find($id);

        //dd($request->all());

        if($header->update($request->all())){
            return redirect('admin/header')->with('sucesso', 'Registro editado com sucesso!');
        }else{
            return redirect('admin/header')->with('erro', 'Ocorreu algum erro ao fazer a edição deste registro, tente novamente mais tarde!');
        }

    }

    public function detail($id){

        $header = Header::find($id);

        return view('admin.header.detail', compact('header'));

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
