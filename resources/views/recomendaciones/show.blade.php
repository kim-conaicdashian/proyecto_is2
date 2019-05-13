@extends('layouts.app')
@section('content')
    <title> {{$recomendacion->nombre}} </title>
    <div class="container">
        <div class="card border-0 shadow my-5 text-center background-style">
            <div class="card h-100 text-center" style="background-color:transparent;">
                <br>
                <p style="font-size:12px"><i>Recomendación seleccionada:</i></p>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <h1 style="font-family: helvetica">{{$recomendacion->nombre}}</h1>
                    </div>
                    @if(auth()->user()->privilegio == 1)
                        <div class="col-lg-3">
                            <a class="btn btn-success btn-md" href="{{ route('recomendacion.reporte', $recomendacion->id) }}" style="color:white !important;">
                                <span class="fa fa-download"></span> 
                                Generar reporte
                            </a>
                        </div>
                    @endif
                </div>
                <div class="row text-center">
                    {{-- @if($categoria) --}}
                    @if(isset($categoria->academico))
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
                            <a href="/plan/{{$plan->id}}" class="btn" style="background-color: grey; border-color: black; color:white !important;">Ver plan de acción</a>                        
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
                                    <input style="background-color: grey; border-color: black; color:white;" type="submit" class="btn btn-primary btn-lg" value="Agregar plan de acción" />
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