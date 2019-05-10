<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card border-0 shadow my-5 text-center" style="background-color: hsl(360, 100%, 73%, 0.5);">
        <p style="font-size:12px; padding-top:10px;"><i>Categoría seleccionada:</i></p>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h1 style="font-family: helvetica">{{$categoria->nombre}}</h1>
            </div>
            @if(auth()->user()->privilegio == 1)
                <div class="col-lg-3">
                    <a class="btn btn-success btn-md" href="#">
                        <span class="fa fa-download"></span> 
                        Generar reporte
                    </a>
                </div>
            @endif
        </div>        
        @if(isset($categoria->academico))
            <h6>Encargado de la categoría: <i>{{$categoria->academico->nombre}}</i> </h6>
        @else
            <h6 class="panel-title"><i>No hay ningún académico asignado a esta categoria.</i></h6>
        @endif
        
        <br>
        
        <hr>
        <h2>Descripción</h2>
        <p>{{$categoria->descripcion}}</p>
        <hr>
    
          
        @if(!$categoria->recomendaciones->isEmpty())
            <h1>Recomendaciones para esta categoría:</h1>
            <hr>
            @foreach ($recomendaciones as $recomendacion)
                <h2><a href="/recomendacion/{{$recomendacion->id}}">{{$recomendacion->nombre}}</a></h2>                    
                @if($recomendacion->planes->count() != 0)
                    <div class="container">
                        <br>
                        <p style="font-size:12px"><i>Planes de acción:</i></p>
                        @foreach($recomendacion->planes as $plan)
                            <a href="/plan/{{$plan->id}}" ><h4 >{{ $plan->nombre }}</h4></a>
                            <form method="POST" action='{{route('plan.completado',$plan->id)}}'>
                                @csrf
                                @method('put')
                                <div class="form-group" >
                                    {{-- checo si el plan esta completado o no para que el usuario pueda ver el estado del
                                         la etiqueta
                                    --}}
                                    @if ($plan->completado == 0)
                                        <label for="exampleInputPassword1" style="font-size: 24px;">Plan en progreso</label>
                
                                    @else 
                                        <label for="exampleInputPassword1" style="font-size: 24px;">Plan completado <span style="color:#00A800;" class="fa fa-check"></span></label>
                
                                    @endif
                                    
                                </div>
                            </form>
                            <hr>
                            @if(count($plan->evidencias) > 0)
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th>Evidencias</th>
                                        <th>Archivo asignado</th>
                                        <th>Tipo archivo</th>
                                        </tr>
                                    </thead>
                                    @foreach($plan->evidencias as $evidencia)
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
                            @endif
                        @endforeach
                        <hr>
                        <form action="{{ route('plan.create')}}">
                            <input type='hidden' value='{{$recomendacion->id}}' name='rec_id'/>
                            <input type='submit' class="btn btn-secondary" style="float:right" value='Crear plan de acción'/>
                        </form>
                        
                    </div>
                @else
                    <p style="font-size:12px"><i>No hay planes asignados para esta recomendación.</i></p>
                    <hr>
                @endif
                <div style="height: 50px"></div>
                    <p class="lead mb-0"></p>
                </div>                   
            @endforeach                
        @else            
            <div class="container" style="text:center"><h6><i>No hay recomendaciones asignadas para esta categoría.</i></h6></div>
        @endif
        
    </div>       
    @if (auth()->user()->privilegio == 1) 
        <div style="text-align:center">
            <form action="/recomendacion/create/{{$categoria->id}}">
                <hr>
                <input style="background-color: grey; border-color: black; color:white;" type="submit" class="btn btn-primary btn-lg" value="Agregar recomendación" />
            </form>
        </div>
    @endif
</div>

@endsection