<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['prefix' => 'api/v1'], function($app)
{
	/* ALUMNOS */
	$app->get('alumnos','AlumnoController@index');
	$app->get('alumnos/{id}','AlumnoController@getAlumno');
	$app->post('alumnos','AlumnoController@createAlumno');
	$app->put('alumnos/{id}','AlumnoController@updateAlumno');
	$app->delete('alumnos/{id}','AlumnoController@deleteAlumno');
	$app->get('alumnos/{id}/delete','AlumnoController@deleteAlumno');
	$app->get('alumnos/{id}/notas','AlumnoController@getAlumnoNotas');
	$app->get('alumnos/{id}/notas/trimestre/{trimestre}','AlumnoController@getAlumnoNotasTrimestre');

	/* PROFESORES */
	$app->get('profesores','ProfesorController@index');
	$app->get('profesores/{id}','ProfesorController@getProfesor');
	$app->post('profesores','ProfesorController@createProfesor');
	$app->put('profesores/{id}','ProfesorController@updateProfesor');
	$app->delete('profesores/{id}','ProfesorController@deleteProfesor');
	$app->get('profesores/{id}/delete','ProfesorController@deleteProfesor');

    /* CICLOS FORMATIVOS */
    // TODO: Verificar si funcionan todos los métodos
    $app->get('ciclosformativos','CicloFormativoController@index');
    $app->get('ciclosformativos/{id}','CicloFormativoController@getCicloFormativo');
    $app->post('ciclosformativos','CicloFormativoController@createCicloFormativo');
    $app->put('ciclosformativos/{id}','CicloFormativoController@updateCicloFormativo');
    $app->delete('ciclosformativos/{id}','CicloFormativoController@deleteCicloFormativo');
    $app->get('ciclosformativos/{id}/delete','CicloFormativoController@deleteCicloFormativo');
    $app->get('ciclosformativos/{id}/asignaturas','CicloFormativoController@getCicloFormativoAsignaturas');

	/* ASIGNATURAS */
	$app->get('asignaturas','AsignaturaController@index');
	$app->get('asignaturas/{id}','AsignaturaController@getAsignatura');
	$app->post('asignaturas','AsignaturaController@createAsignatura');
	$app->put('asignaturas/{id}','AsignaturaController@updateAsignatura');
	$app->delete('asignaturas/{id}','AsignaturaController@deleteAsignatura');
	$app->get('asignaturas/{id}/delete','AsignaturaController@deleteAsignatura');

	/* NOTAS */
	$app->get('notas','NotaController@index');
	$app->get('notas/{id}','NotaController@getNota');
	$app->post('notas','NotaController@createNota');
	$app->put('notas/{id}','NotaController@updateNota');
	$app->delete('notas/{id}','NotaController@deleteNota');
	$app->get('notas/{id}/delete','NotaController@deleteNota');

	/* USUARIOS */
	$app->get('usuarios','UsuarioController@index');
	$app->get('usuarios/{id}','UsuarioController@getUsuario');
	$app->post('usuarios','UsuarioController@createUsuario');
	$app->put('usuarios/{id}','UsuarioController@updateUsuario');
	$app->delete('usuarios/{id}','UsuarioController@deleteUsuario');
	$app->get('usuarios/{id}/delete','UsuarioController@deleteUsuario');
	$app->get('usuarios/emails/{email}/passwords/{password}','UsuarioController@loginUsuario');
	$app->get('usuarios/emails/{email}','UsuarioController@recuperarUsuarioPassword');

});
