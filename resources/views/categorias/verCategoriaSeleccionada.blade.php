@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card border-0 shadow my-5 text-center" style="background-color: hsl(360, 100%, 73%, 0.5);">
    
        <br>
        <p style="font-size:12px"><i>Categoría seleccionada:</i></p>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h1 style="font-family: helvetica">{{$categoria->nombre}}</h1>
            </div>
            @if(auth()->user()->privilegio == 1)
                <div class="col-lg-3">
                    <a class="btn btn-success btn-md" href="#">
                        <span class="fa fa-download"></span> 
                        Generar reporte
                    </a>
                </div>
            @endif
        </div>
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
                        <div class="col-lg-4 col-md-3">
                            <a class="btn btn-info btn-md" href="/recomendacion/{{$recomendacion->id}}/edit" style="">
                                <span class="fa fa-edit"></span> 
                                Editar
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <a href="/recomendacion/{{$recomendacion->id}}" class="btn" style="background-color: grey; border-color: black; color:white;">Ver recomendación</a>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <form action="{{ route('recomendacion.destroy',$recomendacion->id) }}" method="POST" style="">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-md" 
                                    onclick="return confirm('¿Quiere borrar la recomendación: {{ $recomendacion->nombre }}?')"
                                    >
                                    <span class="fa fa-trash"></span>
                                    Eliminar
                                </button>
                            </form>
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
                <div class="row">
                    <div class="col-lg-4 col-md-3">        
                    </div>
                    <div style="text-align:center" class="col-lg-4 col-md-3">
                        <form action="/recomendacion/create/{{$categoria->id}}">
                            <input style="color: white; background-color: grey; border-color: black" type="submit" class="btn btn-primary btn-lg" value="Agregar recomendación" />
                        </form>
                    </div>
                </div>
            @endif
        </div>
        <div style="height: 100px"></div>
            <p class="lead mb-0"></p>
        </div>
    </div>
</div>
@endsection