<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlanAccion;
use Illuminate\Support\Facades\Auth;
use App\Categoria;

class ControladorPlanDeAccion extends Controller
{

    public function listaPlanes(){
        $idCategoria= Auth::user()->categoria->id;//agarro el id de la categoria que tiene el usuario autenticado
        $categoria = Categoria::findOrFail($idCategoria);
        $planes = PlanAccion::where('categoria_id',$idCategoria)->get();//agarro todos los planes que tengan la categoria del usuario
        return view('planAccion.inicio',compact('planes','categoria'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //falta mandar la categoria para manejarla en la vista
        return view('planAccion.crearPlanAccion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plan = new PlanAccion();
        $idCategoria= Auth::user()->categoria->id;
        $categoria = Categoria::findOrFail($idCategoria);
        
        $plan->nombre = $request->input("nombrePlan");
        $plan->descripcion = $request->input("descripcionPlan");
        $plan->categoria()->associate($categoria);
        $plan->save();
        return redirect()->route('categoriaAsignada');
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
        $plan= PlanAccion::findOrFail($id);
        return view('planAccion.editar',compact('plan'));
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
        $plan = PlanAccion::findOrFail($id);
        $idCategoria= Auth::user()->categoria->id;
        $categoria = Categoria::findOrFail($idCategoria);
        
        $plan->nombre = $request->input("nombrePlan");
        $plan->descripcion = $request->input("descripcionPlan");
        $plan->categoria()->associate($categoria);
        $plan->save();
        return redirect()->route('categoriaAsignada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan= PlanAccion::findOrFail($id);
        $plan->delete();
        return redirect()->route('categoriaAsignada');
    }
}
