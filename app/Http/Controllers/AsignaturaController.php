<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\CicloFormativo;
use App\Profesor;
use App\Nota;
use App\Alumno;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{

    public function index(){
        $Asignaturas  = Asignatura::all();
        foreach ($Asignaturas as $Asignatura) {
            $Asignatura->profesor = Profesor::find($Asignatura->id_profesor);
            $Asignatura->nombre_profesor = $Asignatura->profesor->nombre." ".$Asignatura->profesor->apellidos;
			$Asignatura->cicloformativo = CicloFormativo::find($Asignatura->id_ciclo_formativo);
            $Asignatura->nombre_cicloformativo = $Asignatura->cicloformativo->referencia;
        }
        return response()->json($Asignaturas);
    }
  
    public function getAsignatura($id){
        $Asignatura  = Asignatura::find($id);
        $Asignatura->profesor = Profesor::find($Asignatura->id_profesor);
        $Asignatura->nombre_profesor = $Asignatura->profesor->nombre." ".$Asignatura->profesor->apellidos;
		$Asignatura->cicloformativo = CicloFormativo::find($Asignatura->id_ciclo_formativo);
		$Asignatura->nombre_cicloformativo = $Asignatura->cicloformativo->referencia;

        return response()->json($Asignatura);
    }
  
    public function getAsignaturaNotas($id){
        $asignatura  = Asignatura::find($id);
        $notas  = Nota::where('id_asignatura', $asignatura->id)
            ->get();
        foreach ($notas as $nota) {
            $nota->asignatura = Asignatura::find($nota->id_asignatura);
            $nota->alumno = Alumno::find($nota->id_alumno);
            $nota->nombre_asignatura = $nota->asignatura->codigo.": ".$nota->asignatura->nombre;
            $nota->nombre_alumno = $nota->alumno->nombre." ".$nota->alumno->apellidos;
        }

        return response()->json($notas);
    }

    public function createAsignatura(Request $request){
        $Asignatura = Asignatura::create($request->all());

        return response()->json($Asignatura);
    }
  
    public function updateAsignatura(Request $request,$id){
        $Asignatura  = Asignatura::find($id);
        $Asignatura->id_ciclo_formativo = $request->input('id_ciclo_formativo'); // FIXME
        $Asignatura->id_profesor = $request->input('id_profesor');
        $Asignatura->codigo = $request->input('codigo');
        $Asignatura->nombre = $request->input('nombre');
        $Asignatura->curso = $request->input('curso');
        $Asignatura->horas_semana = $request->input('horas_semana');
        $Asignatura->horas_totales = $request->input('horas_totales');
        $Asignatura->creditos = $request->input('creditos');
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
