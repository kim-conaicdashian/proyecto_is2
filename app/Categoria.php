<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table='categorias';
    protected $fillable =['nombre','descripcion'];
    
    public function academico(){
        return $this->belongsTo(Academico::class);
    }
    public function planes(){
        return $this->hasMany(PlanAccion::class);
    }
}
