<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card border-0 shadow my-5 text-center" style="background-color: hsl(360, 100%, 73%, 0.5);">
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
                <h1 class="panel-title">Recomendaciones para esta categoría:</h1>
                <hr>
                @foreach ($recomendaciones as $recomendacion)
                    
                    <h2><a href="/recomendacion/{{$recomendacion->id}}">{{$recomendacion->nombre}}</a></h2>
                    
                    
                    @if($recomendacion->planes)
                        <div class="container">
                            <br>
                            <p style="font-size:12px"><i>Plan de acción:</i></p>
                            <a href="/plan/{{$recomendacion->planes->id}}"><h4>{{ $recomendacion->planes->nombre }}</h4></a>
                            
                            @if(count($recomendacion->planes->evidencias) > 0)
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th>Evidencias</th>
                                        <th>Archivo asignado</th>
                                        <th>Tipo archivo</th>
                                        </tr>
                                    </thead>
                                    @foreach($recomendacion->planes->evidencias as $evidencia)
                                        <tbody>
                                            <tr>
                                                <td>{{$evidencia->nombre_archivo}}</td>
                                                <td>{{$evidencia->archivo_bin}}</td>
                                                <td>{{$evidencia->tipo_archivo}}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach                                
                                </table>
                                <hr>
                                
                            @else
                                <p style="font-size:12px"><i>No hay evidencias asignadas para este plan de acción.</i></p>
                                <hr>
                            @endif                                                                                                
                        </div>
                    @else
                        <p style="font-size:12px"><i>No hay planes asignados para esta recomendación.</i></p>
                        <hr>
                    @endif

                    
                    
                @endforeach                
            @else            
                <div class="container" style="text:center"><h6><i>No hay recomendaciones asignadas para esta categoría.</i></h6></div>
            @endif
        </div>
    </div>        
    <div style="text-align:center">
        <form action="/recomendacion/create">
            <hr>
            <input style="color: black; background-color: hsl(360, 100%, 73%, 0.5); border-color: black" type="submit" class="btn btn-primary btn-lg" value="Agregar recomendación" />
        </form>
    </div>
    
    <div style="height: 50px"></div>
        <p class="lead mb-0"></p>
    </div>
</div>

    
@endsection