<?php

namespace App\Http\Controllers;

use App\Profesor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{

    public function index(){
        $Profesores  = Profesor::all();

        return response()->json($Profesores);
    }
  
    public function getProfesor($id){
        $Profesor  = Profesor::find($id);

        return response()->json($Profesor);
    }
  
    public function createProfesor(Request $request){
        $Profesor = Profesor::create($request->all());

        return response()->json($Profesor);
    }
  
    public function updateProfesor(Request $request,$id){
        $Profesor  = Profesor::find($id);
        $Profesor->nombre = $request->input('nombre');
        $Profesor->apellidos = $request->input('apellidos');
        $Profesor->dni = $request->input('dni');
        $Profesor->edad = $request->input('edad');
        $Profesor->email = $request->input('email');
        $Profesor->telefono = $request->input('telefono');
        $Profesor->observaciones = $request->input('observaciones');
        $Profesor->save();
  
        return response()->json($Profesor);
    }
	
    public function deleteProfesor($id){
        $Profesor  = Profesor::find($id);
        $Profesor->delete();

        return response()->json('deleted');
    }
  
    //
}
