<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{

    public function index(){
        $Alumnos  = Alumno::all();

        return response()->json($Alumnos);
    }
  
    public function getAlumno($id){
        $Alumno  = Alumno::find($id);

        return response()->json($Alumno);
    }
  
    public function createAlumno(Request $request){
        $Alumno = Alumno::create($request->all());

        return response()->json($Alumno);
    }
  
    public function updateAlumno(Request $request,$id){
        $Alumno  = Alumno::find($id);
        $Alumno->nombre = $request->input('nombre');
        $Alumno->apellidos = $request->input('apellidos');
        $Alumno->dni = $request->input('dni');
        $Alumno->fecha_nacimiento = $request->input('fecha_nacimiento');
        $Alumno->email = $request->input('email');
        $Alumno->telefono = $request->input('telefono');
        $Alumno->direccion = $request->input('direccion');
        $Alumno->save();
  
        return response()->json($Alumno);
    }
	
    public function deleteAlumno($id){
        $Alumno  = Alumno::find($id);
        $Alumno->delete();

        return response()->json('deleted');
    }
  
    //
}
