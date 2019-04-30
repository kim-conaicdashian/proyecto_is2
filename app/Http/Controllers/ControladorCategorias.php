<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Categoria;
use App\Academico;
use App\Rules\Categoria as AppCategoria;

class ControladorCategorias extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categorias= Categoria::all();
        $academico_id = auth()->user()->id;
        $categoria_academico = Categoria::findOrFail($academico_id);
        $categorias = DB::table('categorias')->paginate(5);
        return view('categorias.listaCategorias',compact('categorias','categoria_academico'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $academico_id = auth()->user()->id;
        $categoria_academico = Categoria::findOrFail($academico_id);
        $academicos = Academico::all();
        return view('categorias.crearCategoria',compact('academicos','categoria_academico'));
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
        $credentials=$this->validate($request, array(
            'nombreCategoria' => 'required|min:5|max:100|regex:/([a-zA-Z]+\w*+$)+/'.$categoria->id,
            'descripcionCategoria'=> 'required|min:20|regex:/([a-zA-Z]+\w*+$)+/',
            
        ));
        
        
        if($credentials){
            // $categoria = new Categoria();
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
        $academico_id = auth()->user()->id;
        $categoria_academico = Categoria::findOrFail($academico_id);
        $categoria= Categoria::findOrFail($id);
        $academicos= Academico::all();
        return view('categorias.editar',compact('categoria','academicos','categoria_academico'));
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
            'nombreCategoria' => 'required|min:5|max:100|regex:/([a-zA-Z]+\w*+$)+/',
            'descripcionCategoria'=> 'required|min:10|regex:/([a-zA-Z]+\w*+$)+/',
            
        ));
        // dd($request->academicoID);
        if($credentials){
            $categoria = Categoria::findOrFail($id);
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
