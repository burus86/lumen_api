<?php

namespace App\Http\Controllers;

use App\CicloFormativo;
use App\Asignatura;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CicloFormativoController extends Controller
{

    public function index(){
        $CicloFormativos  = CicloFormativo::all();

        return response()->json($CicloFormativos);
    }
  
    public function getCicloFormativo($id){
        $CicloFormativo  = CicloFormativo::find($id);

        return response()->json($CicloFormativo);
    }
  
    public function getCicloFormativoAsignaturas($id){
        $CicloFormativo  = CicloFormativo::find($id);
        $Asignaturas  = Asignatura::where('id_ciclo_formativo', $CicloFormativo->id)
            ->orderBy('nombre', 'desc')
            ->get();

        return response()->json($Asignaturas);
    }
  
    public function createCicloFormativo(Request $request){
        $CicloFormativo = CicloFormativo::create($request->all());

        return response()->json($CicloFormativo);
    }
  
    public function updateCicloFormativo(Request $request,$id){
        $CicloFormativo  = CicloFormativo::find($id);
        $CicloFormativo->referencia = $request->input('referencia');
        $CicloFormativo->nombre = $request->input('nombre');
        $CicloFormativo->nivel = $request->input('nivel');
        $CicloFormativo->duracion = $request->input('duracion');
        $CicloFormativo->familia_profesional = $request->input('familia_profesional');
        $CicloFormativo->save();
  
        return response()->json($CicloFormativo);
    }
	
    public function deleteCicloFormativo($id){
        $CicloFormativo  = CicloFormativo::find($id);
        $CicloFormativo->delete();

        return response()->json('deleted');
    }

}
