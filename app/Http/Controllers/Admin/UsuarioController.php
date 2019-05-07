<?php

namespace App\Http\Controllers\Admin;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    protected $msg;

    public function __construct()
    {
        //objeto que cointerá as mensagens de retorno
        $this->msg = array();
    }

    public function index()
    {
        $users = User::paginate(10);

        return view('admin.usuarios.index', compact('users'));

    }

    public function create(){

        return view('admin.usuarios.create');

    }

    public function store(Request $request){

        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required',
        ]);

        $request['password'] = bcrypt($request->input('password'));
        $request['password_confirmation'] = bcrypt($request->input('password'));

        $usuario = User::create($request->all());

        if($usuario){

            Profile::create(['user_id' => $usuario->id]);

            $this->msg[0] = 'sucesso';
            $this->msg[1] = 'Usuário cadastrado com sucesso!';
        }else{
            $this->msg[0] = 'erro';
            $this->msg[1] = 'Não foi possível cadastrar o usuário, tente novamente mais tarde';
        }

        return redirect()->back()->with($this->msg[0], $this->msg[1]);
    }

    public function edit($id){

        $user = User::find($id);

        return view('admin.usuarios.edit', compact('user'));
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required|email|max:255',
            'role' => 'required',
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

        $user = User::find($id);

        if($user->update($dados)){
            $this->msg[0] = 'sucesso';
            $this->msg[1] = 'Usuário editado com sucesso!';
        }else{
            $this->msg[0] = 'erro';
            $this->msg[1] = 'Não foi possível editar o usuário, tente novamente mais tarde';
        }

        return redirect()->back()->with($this->msg[0], $this->msg[1]);
    }

    public function detail($id){

        $user = User::find($id);

        return view('admin.usuarios.detail', compact('user'));

    }

    public function delete($id){

        $user = User::find($id);

        if(auth()->user()->id == $id){
            $this->msg[0] = 'erro';
            $this->msg[1] = 'Você esta logado com esse usuário, portanto não poderá deletar';
        }else if($user->role === 0){
            $this->msg[0] = 'erro';
            $this->msg[1] = 'Este usuário é um ADMIN, portanto não poderá deletar';
        }else{

            if($user->delete()){
                $this->msg[0] = 'sucesso';
                $this->msg[1] = 'Usuário deletado com sucesso!';
            }else{
                $this->msg[0] = 'erro';
                $this->msg[1] = 'Não foi possível deletar o usuário, tente novamente mais tarde';
            }

        }

        return redirect()->back()->with($this->msg[0], $this->msg[1]);
    }




}
