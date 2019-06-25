<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index(){

        return view('admin.project.index');

    }

    public function store(Request $request){

        $dados['content_service_id'] = $request->input('catSelecionada');
        $dados['nome'] = $request->input('titulo');
        $dados['valores'] = $request->input('valor');
        $dados['descricao'] = $request->input('descricao');
        $user_id = $request->input('user');

        $project = Project::create($dados);

        if($project){

            $project->user()->attach([$user_id]);

        }

        return response()->json($project,200);

    }

}
