<?php

namespace App\Http\Controllers\Admin;

use App\Profile;
use App\User;
use App\ContentServico;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index(){

        $id = auth()->user()->id;

        $user = User::find($id);

        return view('admin.profile.index',compact('user'));

    }

    public function update(Request $request, $id){

        $msg = '';

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
        //dd($arrayValidate);

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

            $user_id = auth()->user()->id;

            $user = User::find($user_id);

            if(auth()->user()->role == 1) {

                //verifica se formação do usuário foi cadastrada
                if (($user->formation)->isEmpty()) {
                    $msg .= "Formação incompleta, acesse: <a href=/admin/profile> Link </a> e adicione suas formações!</br>";
                }

                //verifica se as experiencias  do usuário foram cadastradas
                if (($user->experience)->isEmpty()) {
                    $msg .= "Experiências proficionais incompletas, acesse: <a href=/admin/profile> Link </a> e complete suas experiências!";
                }

                if($msg){
                    return redirect()->back()->with('erro',$msg);
                }

            }else{

                if($user->perfil == '0'){
                    $user['perfil'] = '1';
                    $user->save();
                }

                return redirect()->back()->with('sucesso','Perfil editado com sucesso!');
            }

        }


    }

    public function interesseList(){

        $user = User::find(auth()->user()->id);

        $checked = $user->contentServico;

        $servicos = ContentServico::all();

        return response()->json(['servicos'=>$servicos, 'checked'=>$checked]);

    }

    public function interesseUpdate(Request $request, $servicos){

        $user = User::find(auth()->user()->id);

        $servicos = $request->input('servicos');

        //o metodo sync adiciona os ids enviados e remove os que não existam no array, todos relacionados
        //ao usuário em questão
        if($user->contentServico()->sync($servicos)){
            return response()->json(['data'=>true,'status'=>200]);
        }else{
            return response()->json(['data'=>false,'status'=>500]);
        }

    }

    public function verificaPerfil(){

        $user = User::find(auth()->user()->id);

        if($user->perfil == 1 || $user->role == 0){
            return response()->json(['data'=>true,'status'=>'200']);
        }else{
            return response()->json(['data'=>false,'status'=>'202']);
        }

    }


}
