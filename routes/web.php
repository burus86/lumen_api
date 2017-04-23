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
	$app->put('alumnos/{id}','AlumnoController@updateAlumno'); // $app->get('alumnos/{id}/update','AlumnoController@updateAlumno');
	$app->get('alumnos/{id}/delete','AlumnoController@deleteAlumno'); // $app->delete('alumnos/{id}','AlumnoController@deleteAlumno');

	/* PROFESORES */
	$app->get('profesores','ProfesorController@index');
	$app->get('profesores/{id}','ProfesorController@getProfesor');
	$app->post('profesores','ProfesorController@createProfesor');
	$app->put('profesores/{id}','ProfesorController@updateProfesor');
	$app->get('profesores/{id}/delete','ProfesorController@deleteAlumno'); // $app->delete('profesores/{id}','ProfesorController@deleteProfesor');

	/* ASIGNATURAS */
	$app->get('asignaturas','AsignaturaController@index');
	$app->get('asignaturas/{id}','AsignaturaController@getAsignatura');
	$app->post('asignaturas','AsignaturaController@createAsignatura');
	$app->put('asignaturas/{id}','AsignaturaController@updateAsignatura');
	$app->get('asignaturas/{id}/delete','AsignaturaController@deleteAlumno'); // $app->delete('asignaturas/{id}','AsignaturaController@deleteAsignatura');

	/* NOTAS */
	$app->get('notas','NotaController@index');
	$app->get('notas/{id}','NotaController@getNota');
	$app->post('notas','NotaController@createNota');
	$app->put('notas/{id}','NotaController@updateNota');
	$app->get('notas/{id}/delete','NotaController@deleteAlumno'); // $app->delete('notas/{id}','NotaController@deleteNota');

	/* USUARIOS */
	$app->get('usuarios','UsuarioController@index');
	$app->get('usuarios/{id}','UsuarioController@getUsuario');
	$app->post('usuarios','UsuarioController@createUsuario');
	$app->put('usuarios/{id}','UsuarioController@updateUsuario');
	$app->get('usuarios/{id}/delete','UsuarioController@deleteAlumno'); // $app->delete('usuarios/{id}','UsuarioController@deleteUsuario');

});
