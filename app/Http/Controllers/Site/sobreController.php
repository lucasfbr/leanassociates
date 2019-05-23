<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ComoFunciona;

class sobreController extends Controller
{
    public function index(){

        $comoFunciona = ComoFunciona::all();

        return view('site.sobre.index', compact('comoFunciona'));
    }
}
