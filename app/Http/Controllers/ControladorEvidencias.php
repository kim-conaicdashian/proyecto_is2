<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evidencia;
use App\PlanAccion;
use App\Categoria;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use PDF;


class ControladorEvidencias extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $evidencias = Evidencia::all();
        return view('evidencias.lista', compact('evidencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $planes = PlanAccion::all();
        return view('evidencias.crear', compact('planes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evidencia = new Evidencia();
        $verificados = $this->validate($request, array(
            'nombreEvidencia' => 'required|min:5|max:100|regex:/^[a-zA-Z][\s\S]*/',
            'archivo' => 'required',
            'plan'
        ));

        if($verificados)
        {
            
            $archivo = request()->file('archivo');
            
            $evidencia->nombre_archivo = $request->input('nombreEvidencia');

            $evidencia->tipo_archivo = $archivo->getClientOriginalExtension();

            $nombreArchivo = $archivo->getClientOriginalName();

            $evidencia->archivo_bin = "/archivos/".$nombreArchivo;
            $plan = PlanAccion::findOrFail($request->input('plan'));
            
            $evidencia->save();
            $evidencia->planes()->attach($plan);
            
            // el tercer parámetro indica a qué sistema de archivos se subirá. En este caso, es a public_path()
            $archivo->storeAs('archivos/', $nombreArchivo, 'uploads');

            return redirect()->route('evidencias.index');

        }else{
            //Si es falso, se regresa a la misma pagina de registro con los errores que hubo.
            return back()->withInput(request(['nombreCategoria'=>'hehexd']));
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
        $evidencia = Evidencia::findOrFail($id);
        return view('evidencias.mostrar', compact('evidencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $evidencia= Evidencia::findOrFail($id);
        $planes= PlanAccion::all();
        return view('evidencias.editar', compact('evidencia','planes'));
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
        $evidencia = Evidencia::findOrFail($id);
        $verificados = $this->validate($request, array(
            'nombreEvidencia' => 'required|min:5|max:100|regex:/^[a-zA-Z][\s\S]*/',
        ));
        
        $archivo = request()->file('archivo');
        
        $evidencia->nombre_archivo = $request->input('nombreEvidencia');

        // el tercer parámetro indica a qué sistema de archivos se subirá. En este caso, es a public_path()
        if($request->hasFile('archivo'))
        {
            $nombreArchivo = $archivo->getClientOriginalName();
            $evidencia->tipo_archivo = $archivo->getClientOriginalExtension();
            $archivo->storeAs('archivos/', $nombreArchivo, 'uploads');                
            $evidencia->archivo_bin = "/archivos/".$nombreArchivo;    
        }
        
        $plan = PlanAccion::findOrFail($request->input('plan'));
        
        $estaEnPlanes = false;
        for( $i = 0; $i < count($evidencia->planes) ; $i++ )
        {
            if($plan->id == $evidencia->planes[$i]->id)
            {
                $estaEnPlanes = true;
                break;
            }
        }

        if(!$estaEnPlanes)
        {
            $evidencia->planes()->attach($plan);
        }

        $evidencia->save();                                                                                                                

        return redirect()->route('evidencias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evidencia = Evidencia::findOrFail($id);
        $evidencia->delete();
        return redirect()->route('evidencias.index');
    }
}
