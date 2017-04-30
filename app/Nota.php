<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'id_alumno', 'id_asignatura', 'nota', 'trimestre', 'observaciones'];

}
