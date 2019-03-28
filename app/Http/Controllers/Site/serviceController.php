<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    public function index(){
        return view('site.service.index');
    }

    public function detalhes(Request $request){

        $id = $request->id;
        return view('site.service.detalhes', compact('id'));
    }
}
