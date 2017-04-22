<?php

namespace App\Http\Controllers;

use App\Nota;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotaController extends Controller
{

    public function index(){
        $Notas  = Nota::all();

        return response()->json($Notas);
    }
  
    public function getNota($id){
        $Nota  = Nota::find($id);

        return response()->json($Nota);
    }
  
    public function createNota(Request $request){
        $Nota = Nota::create($request->all());

        return response()->json($Nota);
    }
  
    public function updateNota(Request $request,$id){
        $Nota  = Nota::find($id);
        $Nota->id_alumno = $request->input('id_alumno');
        $Nota->id_asignatura = $request->input('id_asignatura');
        $Nota->nota = $request->input('nota');
        $Nota->trimestre = $request->input('trimestre');
        $Nota->observaciones = $request->input('observaciones');
        $Nota->save();
  
        return response()->json($Nota);
    }
	
    public function deleteNota($id){
        $Nota  = Nota::find($id);
        $Nota->delete();

        return response()->json('deleted');
    }
  
    //
}
