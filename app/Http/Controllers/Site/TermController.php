<?php

namespace App\Http\Controllers\Site;

use App\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TermController extends Controller
{
    public function index($type){

        $term = Term::where('type',$type)->where('status','1')->get();

        return view('site.term.index', compact('term'));

    }
}
