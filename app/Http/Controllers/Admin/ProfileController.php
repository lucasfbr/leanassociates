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

        return view('admin.profile.index',compact('user'));

    }

    public function update(Request $request, $id){

        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email',
            'foto' => 'file|image|mimes:jpeg,jpg,png',
            'cnpj' => 'required',
            'fone' => 'required',
            'whatsapp' => 'required',
            'uf' => 'required',
            'cidade' => 'required',
            'bairro' => 'required',
        ]);

        if($request->input('password')){

            $this->validate($request, [
                'password' => 'required|min:6|confirmed',
            ]);

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
}
