<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academico extends Model
{
    protected $table='academicos';
    protected $fillable =['nombre','email','password'];

    public function categoria(){
        return $this->hasOne(Categoria::class, 'academico_id');
    }
}
