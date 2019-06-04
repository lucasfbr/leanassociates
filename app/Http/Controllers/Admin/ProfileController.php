<?php

namespace App\Http\Controllers\Admin;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){

        $id = auth()->user()->id;

        $user = User::find($id);

        //dd($user->profile());

        return view('admin.profile.index',compact('user'));

    }

    public function update(Request $request, $id){



        $arrayValidate = [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'fone' => ['required', 'regex:/^[0-9]{2}-[0-9]{9}$/'],
                'whatsapp' => 'required',
                'cep' => ['required', 'regex:/^[0-9]{5}-[0-9]{3}$/'],
                'uf' => 'required',
                'cidade' => 'required',
                'bairro' => 'required',
                'rua' => 'required',
                'numero' => 'required',
        ];

        //adiciona cnpj a validação do consultor
        if(auth()->user()->role === 1){

            $arrayValidate['cnpj'] = 'required|formato_cnpj';
        }

        //adiciona cnpj e empresa a validação do cliente
        if(auth()->user()->role === 2){

            $arrayValidate['cnpj'] = 'required|formato_cnpj';
            $arrayValidate['empresa'] = 'required';

        }

        //se a foto for alterada, adiciona a validação para a foto
        if($request->file('foto')){
            $arrayValidate['foto'] = 'file|image|mimes:jpeg,jpg,png';
        }

        //se o password for alterado, valida o password
        if($request->input('password')){
            $arrayValidate['password'] = 'required|min:6|confirmed';
        }

        //executa a validação
        $this->validate($request,$arrayValidate);

        if($request->input('password')){

            $request['password'] = bcrypt($request->input('password'));
            $request['password_confirmation'] = bcrypt($request->input('password'));
            $dados = $request->all();
        }else{
            $dados = $request->except(['password','password_confirmation']);
        }

        $profile = Profile::find($id);

        if($profile->update($dados)){
            return redirect()->back()->with('sucesso','Perfil editado com sucesso!');
        }

        return redirect()->back()->with('erro','Ocorreu algum erro ao editar seu perfil, tente novamente mais tarde');
    }

    public function interesseList(){

        $user = User::find(auth()->user()->id);

        $servicos = $user->contentServico;

        return response()->json($servicos);

    }
}
