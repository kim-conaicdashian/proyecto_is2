<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlanAccion;
use Illuminate\Support\Facades\Auth;
use App\Categoria;
use App\Recomendacion;

class ControladorPlanDeAccion extends Controller
{

    public function listaPlanes(){
        $academico_id = auth()->user()->id;
        $categoria_academico = Categoria::findOrFail($academico_id);
        $idCategoria= Auth::user()->categoria->id;//agarro el id de la categoria que tiene el usuario autenticado
        $categoria = Categoria::findOrFail($idCategoria);
        $planes = PlanAccion::where('categoria_id',$idCategoria)->get();//agarro todos los planes que tengan la categoria del usuario
        $recomendaciones = Recomendacion::where('categoria_id', $idCategoria)->get();
        return view('planAccion.inicio',compact('planes','categoria', 'recomendaciones','categoria_academico'));
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
        //Se agrego parametro $id_recomendacion.
        $rec = $_REQUEST['rec_id'];
        return view('planAccion.crearPlanAccion', compact('rec'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials=$this->validate($request, array(
            'nombrePlan' => 'required|min:5|max:100|regex:/([a-zA-Z]+\w*+$)+/',
            'descripcionPlan'=> 'required|min:20|regex:/([a-zA-Z]+\w*+$)+/',
        ));
        if($credentials){
            $plan = new PlanAccion();
            $idCategoria= Auth::user()->categoria->id;
            $categoria = Categoria::findOrFail($idCategoria);
            
            $plan->nombre = $request->input("nombrePlan");
            $plan->descripcion = $request->input("descripcionPlan");
            $plan->categoria()->associate($categoria);
            $plan->recomendacion_id = $request->input("rec");
            $plan->save();
            $recomendacion = Recomendacion::findOrFail($request->input("rec"));
            $recomendacion ->plan_accion = $plan ->id;
            $recomendacion->save();
            return redirect()->route('categoriaAsignada');
        }else{
            //Si es falso, se regresa a la misma pagina de registro con los errores que hubo.
            return back()->withInput(request(['nombrePlan']));
        }
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
        $credentials=$this->validate($request, array(
            'nombrePlan' => 'required|min:5|max:100|regex:/([a-zA-Z]+\w*+$)+/',
            'descripcionPlan'=> 'required|min:20|regex:/([a-zA-Z]+\w*+$)+/',
            
        ));
        if($credentials){
            $plan = PlanAccion::findOrFail($id);
            $idCategoria= Auth::user()->categoria->id;
            $categoria = Categoria::findOrFail($idCategoria);
            
            $plan->nombre = $request->input("nombrePlan");
            $plan->descripcion = $request->input("descripcionPlan");
            $plan->categoria()->associate($categoria);
            $plan->save();
            return redirect()->route('categoriaAsignada');
        }else{
            return back()->withInput(request(['nombrePlan']));
        }
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
