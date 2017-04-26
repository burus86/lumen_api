<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CicloFormativo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['referencia', 'nombre', 'nivel', 'duracion', 'familia_profesional'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ciclos_formativos'; // Necesario indicar el nombre de la tabla. Fuente: https://laravel.com/docs/5.4/eloquent#eloquent-model-conventions
}
