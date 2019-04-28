<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recomendacion extends Model
{
    protected $table = 'recomendaciones';
    protected $fillable = ['nombre','descripcion'];
    public $timestamps = false;
    public function categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id');
    }

    public function planes(){
        return $this->hasOne(PlanAccion::class);
    }
}
