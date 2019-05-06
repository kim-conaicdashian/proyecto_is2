<!DOCTYPE html>
    @extends('layouts.app')
    @section('content')
    <title> Mi categoría </title>
    <style>
        .filterable {
            margin-top: 15px;
        }
        .filterable .panel-heading .pull-right {
            margin-top: -20px;
        }
        .filterable .filters input[disabled] {
            background-color: transparent;
            border: none;
            cursor: auto;
            box-shadow: none;
            padding: 0;
            height: auto;
        }
        .filterable .filters input[disabled]::-webkit-input-placeholder {
            color: #333;
        }
        .filterable .filters input[disabled]::-moz-placeholder {
            color: #333;
        }
        .filterable .filters input[disabled]:-ms-input-placeholder {
            color: #333;
        }
    </style>
    
    @if (Session::has('message_crear'))
        <div class="alert alert-success">{{ Session::get('message_crear') }}</div>
    @elseif (Session::has('message_borrar'))
        <div class="alert alert-warning">{{ Session::get('message_borrar') }}</div>
    @elseif (Session::has('message_editar'))
        <div class="alert alert-info">{{ Session::get('message_editar') }}</div>
    @endif
    <div class="container">
        <h1 style="text-align: center">{{auth()->user()->categoria->nombre}}</h1>
        <hr>
        <h2 style="text-align: center">Descripcion de la categoria : {{auth()->user()->categoria->descripcion}}</h2>
        <hr>
        @if($recomendaciones->count() == 0)
            <h3 style="text-align: center"> No hay recomendaciones para la categoría {{auth()->user()->categoria->nombre}}</h3>
        @else
            <div class="accordion" id="recomendaciones">
                @foreach ($recomendaciones as $recomendacion)
                    <div class="card">
                        <div class="card-header" id="heading{{$recomendacion->id}}">
                            <h2 class="mb-0">
                                <div  data-toggle="collapse" data-target="#{{$recomendacion->id}}" aria-expanded="false" aria-controls="collapse{{$recomendacion->id}}">
                                    <a href="{{route('recomendacion.show',$recomendacion->id)}}">{{$recomendacion->nombre}}</a>
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
                                </div>
                            </h2>
                        </div>
                        <div id="collapse{{$recomendacion->id}}" class="collapse show" aria-labelledby="heading{{$recomendacion->id}}" data-parent="#recomendaciones">
                            <div class="card-body">
                                <h3>Descripción: {{$recomendacion->descripcion}}</h3>
                                <hr>
                                @if ($recomendacion->plan_accion != NULL)
                                    @foreach ($planes as $plan)
                                        @if ($plan->recomendacion_id == $recomendacion->id)
                                            <h3> Plan de acción propuesto </h3>
                                            <table style="width:100%">
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Descripcion</th>
                                                    <th>Acciones</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$plan->nombre}}</td>
                                                    <td>{{$plan->descripcion}}</td>
                                                    <td>
                                                        <div style="float: right">
                                                            <a class="btn btn-info btn-sm" href="/plan/{{$plan->id}}/edit">Editar</a>
                                                            {{-- <a class="btn btn-info btn-sm" href="/categorias/create/{{$categoria->id}}">Agregar publicacion.</a> --}}
                                                            {{-- <a class="btn btn-info btn-sm" href="{{route('categorias.show',$categoria->id)}}">Produccion academica</a> --}}
                                                            <form style="float:left" action="{{ route('plan.destroy',$plan->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Quiere borrar el plan de acción:  {{ $plan->nombre }}?')" >Eliminar</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        @endif
                                    @endforeach
                                @else
                                    <p style="font-weight: bold"> No hay un plan de acción actualmente para esta recomendación. </p>
                                    <form action="{{ route('plan.create')}}">
                                        <input type='hidden' value='{{$recomendacion->id}}' name='rec_id'/>
                                        <input type='submit' class="btn btn-primary" value='Crear plan de acción' />
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
<br>
@endsection