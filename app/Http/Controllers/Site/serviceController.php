<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servico;
use App\ContentServico;

class serviceController extends Controller
{
    public function index(){

        $serviceHeader = Servico::orderby('created_at','DESC')->take(1)->get();

        $servicos = ContentServico::all();


        return view('site.service.index', compact(['servicos','serviceHeader']));
    }

    public function detail($id){

        $servico = ContentServico::find($id);

        return view('site.service.detalhes', compact('servico'));

    }
}
