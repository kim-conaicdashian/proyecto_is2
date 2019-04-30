<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
use App\Categoria;

class PermisoUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $academico_id = auth()->user()->id;
        $academico_categoria_id = Categoria::where('academico_id', $academico_id)->get();
        //dd(sizeof($academico_categoria_id));
        if(sizeof($academico_categoria_id) == 0){
            Auth::logout();
            Session::flash('message','No se te ha asignado una categoria. Por favor comunicate con el Cordinador');
            return redirect('login');
        }
        return $next($request);
    }
}
