<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academico;
use App\Categoria;

class ControladorAcademicos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $academicos = Academico::orderBy('id')->paginate(10);
        //dd($academicos);
        $categorias = Categoria::all();
        return view('academicos.mostrarAcademicos', compact('academicos', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $academico = new Academico();
        $request->validate([
            'nombre' => 'required',
            'email'=> 'required|email|unique:academicos,email',
            'password' => 'required|min:3|confirmed'
        ]);

        $academico->nombre = $request ->input('nombre');
        $academico->email = $request-> input('email');
        $academico->password = bcrypt(request('password'));

        $academico->remember_token = "_token";
        $academico->save();
        
        return redirect()->route('academicos.index');
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
    public function edit(Academico $academico){
        return view('academicos.editarAcademico', compact('academico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Academico $academico){
        dd($request);
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed'
        ]);

        $academico->nombre = $request->input('nombre');
        if($academico->email != $request->input('email')){
            $academico->email = $request-> input('email');
        }
        if($academico->password != $request->password){
            $academico->password = bcrypt(request('password'));
        }
        $academico->save();
        return redirect()->route('academicos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Academico $academico){
        $academico->delete();
        return redirect()->route('academicos.index');
    }

    public function editPerfil(){
        $academico_id = auth()->user()->id;
        $academico = Academico::find($academico_id);
        return view('academicos.editarPerfil', compact('academico'));
    }

    public function updatePerfil(Request $request, Academico $academico){
        //dd(Crypt);
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed'
        ]);

        $academico->nombre = $request->input('nombre');
        if($academico->email != $request->input('email')) $academico->email = $request-> input('email');
        if($request->password == "knhdl +w-") $academico->password = $academico->password;
        else $academico->password = bcrypt(request('password'));
        $academico->save();
        return redirect()->route('home');
    }
}
