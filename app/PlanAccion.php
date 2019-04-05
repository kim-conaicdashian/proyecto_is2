<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanAccion extends Model
{
    protected $table='planes_de_acciones';

    public function evidencias(){
        return $this->belongsToMany('App\Evidencia','evidencias_planes');
    }
    public function categoria(){
        return $this->belongsTo('App\Categoria','categoria_id');
    }
}
