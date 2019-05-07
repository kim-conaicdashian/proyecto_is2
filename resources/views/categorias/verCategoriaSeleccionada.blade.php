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
                        <div class="col"><h6 class="panel-title" style="text-align: center; ">Encargado de la categoría: {{$categoria->academico->nombre}} </h6>
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
                            
                        @endforeach
                        
                    @else
                    
                        <div class="panel-heading"><h6 class="panel-title"><i>No hay recomendaciones asignadas para esta categoría.</i></h6>
                        </div>
                    @endif
                    
                </div>
                    

            <div style="height: 100px"></div>
                <p class="lead mb-0"></p>
            </div>
        </div>
    </div>
@endsection