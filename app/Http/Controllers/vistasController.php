<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Academico;
use App\Recomendacion;

class vistasController extends Controller{

    public function home(){
        $categorias = Categoria::all();
        $academico_id = auth()->user()->id;
        $academico = Academico::findOrFail($academico_id);
        //$categoria_academico = Categoria::findOrFail($academico_id);
        //dd($categoria_academico);
        //$categoria_academico = Categoria::where('academico_id', $academico_id)->get();
        //dd($categoria->nombre);
        // dd($categoria_academico->academico->nombre);
        return view('home', compact('academico','categorias'));
    }

    public function panelAdmin(){
        return view('panelAdministrador.inicioAdministrador');
    }

    public function recomendacionesAdmin(){
        $recomendaciones = Recomendacion::orderBy('categoria_id')->get();
        return view('panelAdministrador.recomendacionesAdministrador',compact('recomendaciones'));
    }
}
