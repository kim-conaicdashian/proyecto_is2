@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card border-0 shadow my-5 text-center" style="background-color: hsl(360, 100%, 73%, 0.5);">
            <div class="card h-100 text-center" style="background-color:transparent;">
                <br>
                <p style="font-size:12px"><i>Categoría seleccionada:</i></p>
                <h1 style="font-family: helvetica">{{$categoria->nombre}}</h1>
                <div class="row text-center">
                    @if(isset($categoria->academico))
                        <div class="panel-heading"><h3 class="panel-title">Académicos encargado de esta categoría: {{$categoria->academico->nombre}} </h3>
                        </div>
                    @else
                        <div class="col"><h6 class="panel-title"><i>No hay ningún académico asignado a esta categoria.</i></h6>
                        </div>
                    @endif
                </div>
                <br>
                <div class="row text-center">
                        <hr>
                    <div class="col"><h2>Descripción</h2>
                        <p>{{$categoria->descripcion}}</p>
                        <hr>
                    </div>                    
                </div>

                <div class="container">
                    
                    @if(!$categoria->recomendaciones->isEmpty())
                        <h2 class="panel-title">Recomendaciones para esta categoría:</h2>
                        <hr>
                        @foreach ($recomendaciones as $recomendacion)
                            <h4>{{$recomendacion->nombre}}</h4>
                                <a href="/recomendacion/{{$recomendacion->id}}" class="btn" style="color: black; background-color: hsl(360, 100%, 73%, 0.5); border-color: black">Ver recomendación</a>
                            <hr>
                            @if (auth()->user()->privilegio==1)
                                <div style="float: left">
                                    <a class="btn btn-info btn-sm" href="/recomendacion/{{$recomendacion->id}}/edit">Editar</a>
                                    {{-- <a class="btn btn-info btn-sm" href="/categorias/create/{{$categoria->id}}">Agregar publicacion.</a> --}}
                                    {{-- <a class="btn btn-info btn-sm" href="{{route('categorias.show',$categoria->id)}}">Produccion academica</a> --}}
                                    <form action="{{ route('recomendacion.destroy',$recomendacion->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Quiere borrar la recomendación: {{ $recomendacion->nombre }}?')" >Eliminar</button>
                                    </form>
                                </div>
                            @endif
                            <div class="panel-heading"><h3 class="panel-title">Recomendaciones para esta categoría: {{$recomendacion->nombre}} </h3>
                            </div>
                            
                        @endforeach
                        
                    @else
                        <div class="panel-heading"><h3 class="panel-title">No hay recomendaciones asignadas para esta categoría. </h3>
                        </div>
                    @endif
                    
                </div>
                @if (auth()->user()->privilegio== 1)
                    <div style="text-align:center">
                        <form action="{{route('recomendacion.create2',$categoria->id)}}">
                            <hr>
                            <input type="submit" class="btn btn-primary btn-lg" value="Agregar recomendación" />
                        </form>
                    </div>
                @endif
            <div style="height: 100px"></div>
                <p class="lead mb-0"></p>
            </div>
        </div>
    </div>
@endsection