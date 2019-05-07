<?php

namespace App\Http\Controllers\Admin;

use App\Formation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Psy\Util\Json;

class FormationController extends Controller
{
    public function index(){

        $formation = Formation::all();

        return response()->json($formation);

    }

    public function store(Request $request){

        $formation = Formation::create($request->all);

        return response()->json('ok',200);

    }

    public function update(Request $request, $id){

    }

    public function delete(Request $request, $id){

    }
}
