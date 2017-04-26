<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function index(){
        $usuarios  = Usuario::all();

        return response()->json($usuarios);
    }
  
    public function getUsuario($id){
        $usuario  = Usuario::find($id);

        return response()->json($usuario);
    }
  
    public function createUsuario(Request $request){
        $usuario = Usuario::create($request->all());

        return response()->json($usuario);
    }
  
    public function updateUsuario(Request $request,$id){
        $usuario  = Usuario::find($id);
        $usuario->usuario = $request->input('usuario');
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password'); // FIXME: Encriptar contraseña
        $usuario->rol = $request->input('rol');
        $usuario->activo = $request->input('activo');
        $usuario->ultima_conexion = $request->input('ultima_conexion');
        $usuario->save();
  
        return response()->json($usuario);
    }
	
    public function deleteUsuario($id){
        $usuario  = Usuario::find($id);
        $usuario->delete();

        return response()->json('deleted');
    }
  
    public function loginUsuario($email, $password){
        $usuario  = Usuario::where('email', $email)
            ->where('password', $password)
            ->first();

        return response()->json($usuario);
    }
  
    public function recuperarUsuarioPassword($email){
		//if (Usuario::where('email', $email)->count() > 0)
		$usuario  = Usuario::where('email', $email)->first();

        return response()->json($usuario);
    }
  
}
