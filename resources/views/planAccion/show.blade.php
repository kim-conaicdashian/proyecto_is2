<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<style>
    .col-centered{
        float: none;
        margin: 0 auto;
    }
    .styling-btn {
        padding-top: 10px;
        padding-bottom: 10px;
        font-size: 20px;
    }
</style>
    <title> {{$plan->nombre}} </title>
    <div class="container">
        <div class="card border-0 shadow my-5 text-center background-style">
            <div class="card h-100 text-center" style="background-color:transparent;">
                <br>
                <p style="font-size:12px"><i>Plan de acción seleccionado:</i></p>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <h1 style="font-family: helvetica">{{$plan->nombre}}</h1>
                    </div>
                    @if(auth()->user()->privilegio == 1)
                        <div class="col-lg-3">
                            <a style="color:white !important;" class="btn btn-success btn-md" href="{{ route('plan.reporte', $plan->id) }}">
                                <span class="fa fa-download"></span> 
                                Generar reporte
                            </a>
                        </div>
                    @endif
                </div>
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
                        <h2> Criterio de hecho </h2>
                        @if($plan->criterio == NULL)
                            <i> Aún no hay un criterio de hecho para este plan de acción. Edite el plan de acción para agregar uno. </i>
                        @else
                            <p> {{$plan->criterio}}</p>
                        @endif
                    </div>                    
                </div>
                <div class="container">
                    @if(auth()->user()->categoria)
                        @if($plan->categoria->id == auth()->user()->categoria->id)
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-3 col-centered">
                                    </div>
                                    <div class="col-lg-3 col-centered">
                                        <form action="{{ route('plan.destroy', $plan->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button style="background: linear-gradient(to bottom right, #800000 1%, #cc0000 100%);" type="submit" style="color: black" class="btn btn-danger btn-sm btn-block" 
                                                onclick="return confirm('¿Está seguro de borrar este plan?')" >
                                                <span class="fa fa-trash styling-btn"></span>
                                                    Eliminar
                                                </button>
                                    </div>
                                    <div class="col-lg-3 col-centered">
                                                <a style="color:white !important;" class="btn btn-info btn-sm btn-block" href="/plan/{{$plan->id}}/edit">
                                                    <span class="fa fa-edit styling-btn"></span>
                                                    Editar
                                                </a>
                                        </form>
                                    </div>
                                    <div class="col-lg-3 col-centered">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                    <br>
                    <form method="POST" action='{{route('plan.completado',$plan->id)}}'>
                        @csrf
                        @method('put')
                        <div class="form-group" >
                            <label for="exampleInputPassword1" style="font-size: 24px;">Plan completado</label>
                            <select name="completado">
                                {{-- checo si el plan esta completado o no para que el usuario pueda ver el estado del
                                    select
                                --}}
                                @if ($plan->completado == 0)
                                    <option value="0" selected>No</option>
                                    <option value="1">Sí</option>
                                @else 
                                    <option value="0">No</option>
                                    <option value="1" selected>Sí</option>
                                @endif
                            </select>
                        </div>
                        <button style="background: linear-gradient(to bottom right, #000000 1%, #999966 101%);" type="submit" class="btn btn-sm btn-secondary">Actualizar plan</button>
                    </form>
                    <hr>    
                    @if(!$plan->evidencias->isEmpty())
                        <h2>Evidencias para este plan:</h2>
                        <hr>
                        @foreach ($evidencias as $evidencia)
                            <h4>{{$evidencia->nombre_archivo}}</h4>
                            <p><i>Archivo asociado:</i> {{$evidencia->archivo_bin}}</p>
                                <a href="/evidencias/{{$evidencia->id}}" class="btn" style="background: linear-gradient(to bottom right, #339933 1%, #33cc33 101%);">Ver evidencia</a>
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
    </div>
@endsection