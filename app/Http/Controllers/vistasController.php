<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class vistasController extends Controller{

    public function home(){
        $categorias = Categoria::all();
        $academico_id = auth()->user()->id;
        $categoria_academico = Categoria::where('academico_id', $academico_id)->get();
        
        dd($categoria_academico);
        return view('home',compact('categorias', 'categoria_academico'));
    }
}
