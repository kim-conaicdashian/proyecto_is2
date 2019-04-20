<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evidencia;
use App\PlanAccion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


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
        try {
            $evidencia = new Evidencia();
            $archivo = request()->file('archivo');
            
            $evidencia->nombre_archivo = $request->input('nombreEvidencia');

            $evidencia->tipo_archivo = request()->file('archivo')->guessClientExtension();
            $evidencia->archivo_bin = '';
            $plan = PlanAccion::findOrFail($request->input('plan'));
            $evidencia->save();
            $evidencia->planes()->attach($plan);
            //request()->file('archivo')->store('archivos');
            //dd(Storage::url(request()->file('archivo')));
            //Storage::putFileAs(request()->file('archivo'), new File('/'), 'example.jpg');
        } catch (\Throwable $err) {
            echo "Se necesita subir un archivo.";
        }

        return redirect()->route('evidencias.index');
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
        try {            
            $evidencia = Evidencia::findOrFail($id);
            $archivo = request()->file('archivo');
            
            $evidencia->nombre_archivo = $request->input('nombreEvidencia');

            $evidencia->tipo_archivo = request()->file('archivo')->guessClientExtension();
            $evidencia->archivo_bin = '';
            $plan = PlanAccion::findOrFail($request->input('plan'));
            
            
            $evidencia->save();
            $evidencia->planes()->attach($plan);
            
            //request()->file('archivo')->store('archivos');
            //dd(Storage::url(request()->file('archivo')));
            //Storage::putFileAs(request()->file('archivo'), new File('/'), 'example.jpg');
        } catch (\Throwable $err) {
            echo "Se necesita subir un archivo.";
        }

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
