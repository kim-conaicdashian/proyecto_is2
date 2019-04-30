<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class vistasController extends Controller{

    public function home(){
        // $categorias = Categoria::all();
        $academico_id = auth()->user()->id;
        $categoria = Categoria::findOrFail($academico_id);
        
        $categoria_academico = Categoria::where('academico_id', $academico_id)->get();
        dd($categoria->nombre);
        // dd($categoria_academico->academico->nombre);
        return view('home',compact('categorias', 'categoria_academico'));
    }
}
