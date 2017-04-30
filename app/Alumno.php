<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'nombre', 'apellidos', 'dni', 'fecha_nacimiento', 'email', 'telefono', 'direccion'];

}
