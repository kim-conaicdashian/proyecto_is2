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
        return view('categorias.listaCategorias',compact('categorias'));
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
        
        $credentials=$this->validate($request, array(
            'nombreCategoria' => 'required|min:5|max:100',
            'descripcionCategoria'=> 'required|min:10',
            
        ));
        if($credentials){
            $categoria = new Categoria();
            $categoria ->nombre= $request->input('nombreCategoria');
            $categoria ->descripcion= $request->input('descripcionCategoria');
            //condiciona que si se envia el formulario sin academicos pongo el atributo academico_id con el valor de null
            if($request->academicoID == 'NULL'){
                $categoria ->academico_id= null;
                $categoria->save();
                return redirect()->route('categorias.index');
            }else{
                $academico = Academico::findOrFail($request->academicoID);
                $categoria -> academico()->associate($academico);
                $categoria->save();
                return redirect()->route('categorias.index');
            }
            
        }else{
            //Si es falso, se regresa a la misma pagina de registro con los errores que hubo.
            return back()->withInput(request(['nombreCategoria']));
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
        
        $credentials=$this->validate($request, array(
            'nombreCategoria' => 'required|min:5|max:100',
            'descripcionCategoria'=> 'required|min:10',
            
        ));
        // dd($request->academicoID);
        if($credentials){
            $categoria = Categoria::findOrFail($id);
            $categoria ->nombre= $request->input('nombreCategoria');
            $categoria ->descripcion= $request->input('descripcionCategoria');
            //condiciona que si se envia el formulario sin academicos pongo el atributo academico_id con el valor de null
            if($request->academicoID == null){
                $categoria ->academico_id= null;
                $categoria->save();
                return redirect()->route('categorias.index');
            }else{
                $academico = Academico::findOrFail($request->academicoID);
                $categoria -> academico()->associate($academico);
                $categoria->save();
                return redirect()->route('categorias.index');
            }
        }else{
            //Si es falso, se regresa a la misma pagina de registro con los errores que hubo.
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
        $categoria= Categoria::findOrFail($id);
        $categoria-> delete();
        return redirect()->route('categorias.index');
    }
}
