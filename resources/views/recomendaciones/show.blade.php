@extends('layouts.app')
@section('content')
    <title> {{$recomendacion->nombre}} </title>
    <div class="container">
        
        <div class="row text-center">
            <div class="col-lg-12 col-md-12">
                <h1>Recomendación: {{$recomendacion->nombre}}</h1>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-lg-12 col-md-12">
                <h6>Esta recomendación pertenece a la categoría: {{$recomendacion->categoria->nombre}}</h6>
            </div>
        </div>
        @if (auth()->user()->privilegio == 1) 
            <a style="float:right; color:white !important;" class="btn btn-success btn-md" href="{{ route('recomendacion.reporte', $recomendacion->id) }}">
                <span class="fa fa-download"></span> 
                Generar reporte
            </a>
        @endif
        <br>
        <hr>

        <div class="row text-center">
            <div class="col-lg-12 col-md-12">
                <h3>Descripción</h3>
                <p class="descripcion-texto">{{$recomendacion->descripcion}}</p>
            </div>
        </div>
        <br>

        @if (count($planes)>0)
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Plan</th>
                        <th scope="col">Completado</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($planes as $plan)
                        <tr>
                            <td><a  href="/plan/{{$plan->id}}" >{{$plan->nombre}}</a></td>
                            @if ( $plan->completado == 1)
                                <td>Sí</td>
                            @else
                                <td>No</td>
                            @endif
                            
                            <td>{{$plan->fecha_termino}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay planes para esta recommendación.</p>
        @endif

        <br>

        @if (auth()->user()->privilegio == 1) 
            <div class="row">
                <div class="col-lg-12"> 
                    <center>
                        <form action="{{ route('recomendacion.destroy',$recomendacion->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Quiere borrar la categoria: {{ $recomendacion->nombre }}?')" >
                                Borrar <span class="fa fa-trash"></span>
                            </button>
                            <a style="color:white !important;" class="btn btn-info btn-sm" href="/plan/{{$recomendacion->id}}/edit">Editar <span class="fa fa-pencil"></span></a>
                        </form>
                        
                    </center>  
                </div>
            </div>
        @endif
        <center>
            <form action="{{ route('plan.create')}}">
                    <input type='hidden' value='{{$recomendacion->id}}' name='rec_id'/><br>
                    <input type='submit' class="btn btn-secondary" value='Agregar plan de acción'/>
            </form>
        </center>
    </div>
@endsection