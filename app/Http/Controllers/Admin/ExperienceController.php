<?php

namespace App\Http\Controllers\Admin;

use App\Experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    public function index(){

        $id = auth()->user()->id;

        $experience = Experience::where('user_id',$id)->get();

        return response()->json($experience);
        
        

        /*
        if($experience)
        	return response()->json($formation, 200);
        else{
        	return response()->json('', 500);
        }*/

    }

    public function store(Request $request){

        $experience = Experience::create($request->all());

        return response()->json('ok',200);

    }

    public function edit($id){

        $experience = Experience::find($id);

        if($experience){
            $status = 200;
        }else{
            $experience = 404;
        }

        return response()->json($experience, $status);
    }

    public function update(Request $request, $id){

        $experience = Experience::find($id);

        if($experience->update($request->all())){

            $status = 200;
            $msg = 'Experiência editada com sucesso';

        }else{
            $status = 404;
            $msg = 'Erro ao editar sua experiência';
        }

        return response()->json([
            'status' => $status,
            'msg' => $msg
        ]);

    }

    public function delete($id){

        $experience = Experience::find($id);

        if($experience->delete()){
            $status = 200;
            $msg = 'Experiência deletada com sucesso';
        }else{
            $status = 404;
            $msg = 'Erro ao deletar sua experiência';
        }

        return response()->json([
            'status' => $status,
            'msg' => $msg
        ]);

    }
}
