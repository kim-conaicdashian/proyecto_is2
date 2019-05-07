@extends('layouts.app')
@section('content')
    <title> {{$plan->nombre}} </title>
    <div class="container">
        <div class="card border-0 shadow my-5 text-center" style="background-color: hsl(360, 100%, 73%, 0.5);">
            <div class="card h-100 text-center" style="background-color:transparent;">
                <br>
                <p style="font-size:12px"><i>Plan de acción seleccionado:</i></p>
                <h1 style="font-family: helvetica">{{$plan->nombre}}</h1>
                <div class="row text-center">
                    @if($plan->categoria)
                        <div class="col"><h6 class="panel-title" style="text-align: center; "><i>Pertenece a la categoría: {{$plan->categoria->nombre}} </i></h6></div>
                        <div class="col"><h6 class="panel-title" style="text-align: center; "><i>Encargado de la categoría: {{$plan->categoria->academico->nombre}} </i></h6></div>
                        <div class="col"><h6 class="panel-title" style="text-align: center; "><i>Fecha de término: {{$plan->fecha_termino}} </i></h6></div>
                    </div>
                    @else
                        <div class="col"><h6 class="panel-title"><i>No hay ningún académico asignado a esta categoría.</i></h6>
                        </div>
                    @endif
                </div>
                <br>
                <div class="row text-center">
                        <hr>
                    <div class="col">
                        <h2>Descripción</h2>
                        <p>{{$plan->descripcion}}</p>
                        <hr>
                    </div>                    
                </div>

                <div class="container">
                    
                    @if(!$plan->evidencias->isEmpty())
                        <h2>Evidencias para este plan:</h2>
                        <hr>
                        @foreach ($evidencias as $evidencia)
                            <h4>{{$evidencia->nombre_archivo}}</h4>
                            <p><i>Archivo asociado:</i> {{$evidencia->archivo_bin}}</p>
                                <a href="/evidencias/{{$evidencia->id}}" class="btn" style="color: black; background-color: hsl(360, 100%, 73%, 0.5); border-color: black">Ver evidencia</a>
                            <br><br>                            
                        @endforeach                                                
                        
                    @else                    
                        <div class="panel-heading"><h6 class="panel-title"><i>No hay evidencias para este plan de acción.</i></h6>
                        </div>
                    @endif
                    
                </div>
                    

            <div style="height: 100px"></div>
                <p class="lead mb-0"></p>
            </div>
        </div>
    </div>
@endsection