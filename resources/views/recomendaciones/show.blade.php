@extends('layouts.app')
@section('content')
    <title> {{$recomendacion->nombre}} </title>
    <div class="container">
        <div class="card border-0 shadow my-5 text-center" style="background-color: hsl(360, 100%, 73%, 0.5);">
            <div class="card h-100 text-center" style="background-color:transparent;">
                <br>
                <p style="font-size:12px"><i>Recomendación seleccionada:</i></p>
                <h1 style="font-family: helvetica">{{$recomendacion->nombre}}</h1>
                <div class="row text-center">
                    @if($categoria)
                        <div class="col"><h6 class="panel-title" style="text-align: center; "><i>Pertenece a la categoría: {{$categoria->nombre}} </i></h6></div>
                        <div class="col"><h6 class="panel-title" style="text-align: center; "><i>Encargado de la categoría: {{$categoria->academico->nombre}} </i></h6>
                    </div>
                    @else
                        <div class="col"><h6 class="panel-title"><i>No hay ningún académico asignado a esta categoría.</i></h6>
                        </div>
                    @endif
                </div>
                <br>
                <div class="row text-center">
                        <hr>
                    <div class="col"><h2>Descripción</h2>
                        <p>{{$recomendacion->descripcion}}</p>
                        <hr>
                    </div>                    
                </div>

                <div class="container">
                    @if($planes->count() != 0)
                    <h2 class="panel-title">Plan de acción para esta categoría:</h2>
                        @foreach($planes as $plan)
                            <hr>

                            <h4>{{$plan->nombre}}</h4>
                            <a href="/plan/{{$plan->id}}" class="btn" style="color: black; background-color: hsl(360, 100%, 73%, 0.5); border-color: black">Ver plan de acción</a>                        
                        @endforeach
                    @else                    
                        <div class="panel-heading"><h6 class="panel-title"><i>No hay plan de acción para esta recomendación.</i></h6>
                        </div>
                    @endif
                    @if(auth()->user()->categoria)
                        @if(auth()->user()->categoria->id == $categoria->id)
                            <div style="text-align:center">
                                <form action="{{ route('plan.create')}}">
                                    <hr>
                                    <input type='hidden' value='{{$recomendacion->id}}' name='rec_id'/>
                                    <input style="color: black; background-color: hsl(360, 100%, 73%, 0.5); border-color: black" type="submit" class="btn btn-primary btn-lg" value="Agregar plan de acción" />
                                </form>
                            </div>
                        @endif
                    @endif
                </div>
            <div style="height: 100px"></div>
                <p class="lead mb-0"></p>
            </div>
        </div>
    </div>
@endsection