<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_ciclo_formativo', 'id_profesor', 'codigo', 'nombre', 'curso', 'horas_semana', 'horas_totales', 'creditos'];

}
