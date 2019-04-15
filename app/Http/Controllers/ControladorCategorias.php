<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Academico;

class ControladorCategorias extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias= Categoria::all();
        return view('categorias.inicio',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $academicos = Academico::all();
        return view('categorias.crearCategoria',compact('academicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $academico = Academico::findOrFail($request->academicoID);
        $categoria ->nombre= $request->input('nombreCategoria');
        $categoria ->descripcion= $request->input('descripcionCategoria');
        $categoria -> academico()-> associate($academico);
        $categoria->save();

        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria= Categoria::findOrFail($id);
        $academicos= Academico::all();
        return view('categorias.editar',compact('categoria','academicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $academico = Academico::findOrFail($request->academicoID);
        
        $categoria ->nombre= $request->input('nombreCategoria');
        $categoria ->descripcion= $request->input('descripcionCategoria');
        $categoria -> academico()-> associate($academico);
        $categoria->save();
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria= Categoria::findOrFail($id);
        $categoria-> delete();
        return redirect()->route('categorias.index');
    }
}
