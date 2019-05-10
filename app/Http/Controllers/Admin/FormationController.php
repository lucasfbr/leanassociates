<?php

namespace App\Http\Controllers\Admin;

use App\Formation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Psy\Util\Json;

class FormationController extends Controller
{
    public function index(){

        $id = auth()->user()->id;

        $formation = Formation::where('user_id',$id)->get();

        return response()->json($formation);

    }

    public function store(Request $request){

        $formation = Formation::create($request->all());

        return response()->json('ok',200);

    }

    public function edit($id){

        $formation = Formation::find($id);

        if($formation){
            $status = 200;
        }else{
            $status = 404;
        }

        return response()->json($formation, $status);
    }

    public function update(Request $request, $id){

        $formation = Formation::find($id);

        if($formation->update($request->all())){

            $status = 200;
            $msg = 'Formação editada com sucesso';

        }else{
            $status = 404;
            $msg = 'Erro ao editar a formação';
        }

        return response()->json([
            'status' => $status,
            'msg' => $msg
        ]);

    }

    public function delete($id){

        $formation = Formation::find($id);

        if($formation->delete()){
            $status = 200;
            $msg = 'Formação deletada com sucesso';
        }else{
            $status = 404;
            $msg = 'Erro ao deletar a formação';
        }

        return response()->json([
            'status' => $status,
            'msg' => $msg
        ]);

    }
}
