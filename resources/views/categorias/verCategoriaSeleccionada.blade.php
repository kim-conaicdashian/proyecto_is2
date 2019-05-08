@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card border-0 shadow my-5 text-center" style="background-color: hsl(360, 100%, 73%, 0.5);">
    
        <br>
        <p style="font-size:12px"><i>Categoría seleccionada:</i></p>
        <h1 style="font-family: helvetica">{{$categoria->nombre}}</h1>
        <div class="container">
            @if(isset($categoria->academico))
                <h3>Académico encargado de esta categoría: {{$categoria->academico->nombre}}</h3>                
            @else
                <h6><i>No hay ningún académico asignado a esta categoria.</i></h6>
            @endif
        </div>
        <br>
        <hr>
        <h2>Descripción</h2>
        <p>{{$categoria->descripcion}}</p>
        <hr>

        <div class="container">
            
            @if(!$categoria->recomendaciones->isEmpty())
                <h2 class="panel-title">Recomendaciones para esta categoría:</h2>
                <hr>
                @foreach ($recomendaciones as $recomendacion)  
                    <h4>{{$recomendacion->nombre}}</h4>
                    
                    @if (auth()->user()->privilegio==1)
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <form action="{{ route('recomendacion.destroy',$recomendacion->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Quiere borrar la recomendación: {{ $recomendacion->nombre }}?')" >Eliminar</button>
                            </form>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <a href="/recomendacion/{{$recomendacion->id}}" class="btn" style="color: black; background-color: hsl(360, 100%, 73%, 0.5); border-color: black">Ver recomendación</a>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <a class="btn btn-info btn-sm" href="/recomendacion/{{$recomendacion->id}}/edit">Editar</a>
                            {{-- <a class="btn btn-info btn-sm" href="/categorias/create/{{$categoria->id}}">Agregar publicacion.</a> --}}
                            {{-- <a class="btn btn-info btn-sm" href="{{route('categorias.show',$categoria->id)}}">Produccion academica</a> --}}
                        </div>
                    </div>
                    @endif
                    

                    <hr>
                @endforeach
                
            @else
                <div class="panel-heading"><h3 class="panel-title">No hay recomendaciones asignadas para esta categoría. </h3>
                </div>
            @endif
            @if (auth()->user()->privilegio == 1) 
                <div style="text-align:center">
                    <form action="/recomendacion/create/{{$categoria->id}}">
                        <input style="color: black; background-color: hsl(360, 100%, 73%, 0.5); border-color: black" type="submit" class="btn btn-primary btn-lg" value="Agregar recomendación" />
                    </form>
                </div>
            @endif
        </div>
        <div style="height: 100px"></div>
            <p class="lead mb-0"></p>
        </div>
    </div>
</div>
@endsection