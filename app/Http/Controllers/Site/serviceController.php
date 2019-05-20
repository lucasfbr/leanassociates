<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servico;

class serviceController extends Controller
{
    public function index(){

    	$servicos = Servico::all();

        return view('site.service.index', compact('servicos'));
    }

    public function detalhes(Request $request){

        $id = $request->id;
        return view('site.service.detalhes', compact('id'));
    }
}
