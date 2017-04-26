<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function index(){
        $Usuarios  = Usuario::all();

        return response()->json($Usuarios);
    }
  
    public function getUsuario($id){
        $Usuario  = Usuario::find($id);

        return response()->json($Usuario);
    }
  
    public function createUsuario(Request $request){
        $Usuario = Usuario::create($request->all());

        return response()->json($Usuario);
    }
  
    public function updateUsuario(Request $request,$id){
        $Usuario  = Usuario::find($id);
        $Usuario->usuario = $request->input('usuario');
        $Usuario->email = $request->input('email');
        $Usuario->password = $request->input('password'); // FIXME: Encriptar contraseña
        $Usuario->rol = $request->input('rol');
        $Usuario->activo = $request->input('activo');
        $Usuario->ultima_conexion = $request->input('ultima_conexion');
        $Usuario->save();
  
        return response()->json($Usuario);
    }
	
    public function deleteUsuario($id){
        $Usuario  = Usuario::find($id);
        $Usuario->delete();

        return response()->json('deleted');
    }
  
    //
}
