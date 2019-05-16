@extends('layouts.app')
@section('content')
    <title> {{$recomendacion->nombre}} </title>
    <div class="container">
        
        <div class="row text-center">
            <div class="col-lg-12 col-md-12">
                <h1>Recomendacíon: {{$recomendacion->nombre}}</h1>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-lg-12 col-md-12">
                <h6>Esta recomendacíon pertenece a la categoría: {{$recomendacion->categoria->nombre}}</h6>
            </div>
        </div>

        <hr>

        <div class="row text-center">
            <div class="col-lg-12 col-md-12">
                <h3>Descripción</h3>
                <p>{{$recomendacion->descripcion}}</p>
            </div>
        </div>
        <br>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Plan</th>
                    <th scope="col">Completado</th>
                    <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @if (count($planes)>0)
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
                @endif
                
            </tbody>
        </table>
        <br>

        @if (auth()->user()->privilegio == 1) 
            <div class="row">
                <div class="col-lg-12"> 
                    <center>
                        @if (count($planes)>0)
                        <form action="{{ route('categorias.destroy',$plan->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Quiere borrar la categoria: {{ $plan->nombre }}?')" >
                                    Borrar <span class="fa fa-trash"></span>
                                </button>
                                <a style="color:white !important;" class="btn btn-info btn-sm" href="/plan/{{$plan->id}}/edit">Editar <span class="fa fa-pencil"></span></a>
                            </form>
                        @endif
                        
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