<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recomendacion;
use Illuminate\Support\Facades\Auth;
use App\Categoria;
use Session;
use App\PlanAccion;

class ControladorRecomendaciones extends Controller
{
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


        return view('recomendaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $credentials=$this->validate($request, array(
            'nombre' => 'required|min:5|max:100',
            'descripcion'=> 'required|min:10',
        ));
        if($credentials){
            $recomendacion = new Recomendacion();
            $idCategoria= Auth::user()->categoria->id;
            $categoria = Categoria::findOrFail($idCategoria);

            $recomendacion->nombre = $request->input("nombre");
            $recomendacion->descripcion = $request->input("descripcion");
            $recomendacion->categoria()->associate($categoria);
            $recomendacion->save();
            Session::flash('message_crear','Se ha creado una recomendación con éxito.');
            return redirect()->route('categoriaAsignada');
        }else{
            //Si es falso, se regresa a la misma pagina de registro con los errores que hubo.
            return back()->withInput(request(['nombre']));
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
        $recomendacion = Recomendacion::findOrFail($id);
        $planes = PlanAccion::with('recomendacion')->where('recomendacion_id',$recomendacion->id)->paginate(5); 
        return view('recomendaciones.verRecomendacionSeleccionada',compact('recomendacion'))->with(['planes'=>$planes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $recomendacion = Recomendacion::findOrFail($id);
        return view('recomendaciones.edit',compact('recomendacion'));
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
        //
        $credentials=$this->validate($request, array(
            'nombreRec' => 'required|min:5|max:100',
            'descripcionRec'=> 'required|min:10',

        ));
        if($credentials){
            $recomendacion = Recomendacion::findOrFail($id);
            $recomendacion ->nombre= $request->input('nombreRec');
            $recomendacion ->descripcion= $request->input('descripcionRec');
            $recomendacion->save();
            Session::flash('message_editar','Se ha editado la recomendación con éxito.');
            return redirect()->route('categoriaAsignada');
        }else{
            return back()->withInput(request(['nombreCategoria']));
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
      $recomendacion= Recomendacion::findOrFail($id);
      $recomendacion-> delete();
      Session::flash('message_borrar','Se ha eliminado la recomendación con éxito.');
      return redirect()->route('categoriaAsignada');
    }
}
