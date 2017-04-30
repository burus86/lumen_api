<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'nombre', 'apellidos', 'dni', 'edad', 'email', 'telefono', 'observaciones'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profesores'; // Necesario indicar el nombre de la tabla. Fuente: https://laravel.com/docs/5.4/eloquent#eloquent-model-conventions
}
