@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1>Categoría: {{$categoria->nombre}}</h1>
                <div class="panel panel-primary" id="result_panel">
                    @if(isset($categoria->academico))
                        <div class="panel-heading"><h3 class="panel-title">Académicos encargado de esta categoría: {{$categoria->academico->nombre}} </h3>
                        </div>
                    @else
                        <div class="panel-heading"><h3 class="panel-title">No hay ningún académico asignado a esta categoria. </h3>
                        </div>
                    @endif
                    
                </div>
                <br>
                <div class="form-group " >
                        <div class="panel-heading"><h3 class="panel-title">Descripción</h3>
                    <p>{{$categoria->descripcion}}</p>
                    
                </div>

                <div class="panel panel-primary" id="result_panel">
                    @if(!$categoria->recomendaciones->isEmpty())
                        @foreach ($recomendaciones as $recomendacion)
                            <hr>
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