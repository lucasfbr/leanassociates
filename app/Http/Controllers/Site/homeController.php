<?php

namespace App\Http\Controllers\Site;

use App\Footer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormContato as contato;
use App\ContentServico;
use App\ComoFunciona;


class homeController extends Controller
{
    public function index(){

        $servicos =  ContentServico::offset(0)->limit(4)->get();

        $servicosFooter = ContentServico::all();

        $comoFunciona = ComoFunciona::offset(0)->limit(4)->get();

        $footer = Footer::all();

        return view('site.index', compact(['servicos','comoFunciona','footer', 'servicosFooter']));

    }

    public function contato(Request $request){


        Mail::to($request['email'])->send(new contato($request));

        $cad = \App\Contato::create([
            'empresa'=>$request->empresa,
            'nome'=>$request->nome,
            'email'=>$request->email,
            'telefone'=>$request->fone,
            'mensagem'=>$request->mensagem,
        ]);

        if($cad){
            $status = 200;
            $msg = 'Usuário cadastrado com sucesso';
        }else{
            $status = 500;
            $msg = 'Erro ao cadastrar usuário';
        }

        return response()->json([
            'status' => $status,
            'msg' => $msg
        ]);

    }
}
