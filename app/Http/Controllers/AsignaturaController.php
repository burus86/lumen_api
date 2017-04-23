<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\Profesor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{

    public function index(){
        $Asignaturas  = Asignatura::all();
        foreach ($Asignaturas as $Asignatura) {
            $Asignatura->profesor = Profesor::find($Asignatura->id_profesor);
            $Asignatura->nombre_profesor = $Asignatura->profesor->nombre." ".$Asignatura->profesor->apellidos;
        }
        return response()->json($Asignaturas);
    }
  
    public function getAsignatura($id){
        $Asignatura  = Asignatura::find($id);
        $Asignatura->profesor = Profesor::find($Asignatura->id_profesor);
        $Asignatura->nombre_profesor = $Asignatura->profesor->nombre." ".$Asignatura->profesor->apellidos;

        return response()->json($Asignatura);
    }
  
    public function createAsignatura(Request $request){
        $Asignatura = Asignatura::create($request->all());

        return response()->json($Asignatura);
    }
  
    public function updateAsignatura(Request $request,$id){
        $Asignatura  = Asignatura::find($id);
        $Asignatura->id_profesor = $request->input('id_profesor');
        $Asignatura->nombre = $request->input('nombre');
        $Asignatura->curso = $request->input('curso');
        $Asignatura->horas_semana = $request->input('horas_semana');
        $Asignatura->save();
  
        return response()->json($Asignatura);
    }
	
    public function deleteAsignatura($id){
        $Asignatura  = Asignatura::find($id);
        $Asignatura->delete();

        return response()->json('deleted');
    }
  
    //
}
