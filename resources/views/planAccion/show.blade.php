@extends('layouts.app')
@section('content')
    <title> {{$plan->nombre}} </title>
    <div class="container">
        <div class="card border-0 shadow my-5 text-center" style="background-color: hsl(360, 100%, 73%, 0.5);">
            <div class="card h-100 text-center" style="background-color:transparent;">
                <br>
                <p style="font-size:12px"><i>Plan de acción seleccionado:</i></p>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <h1 style="font-family: helvetica">{{$plan->nombre}}</h1>
                        <br>
                    </div>
                    @if(auth()->user()->privilegio == 1)
                        <div class="col-lg-3">
                            <a style="color:white !important;" class="btn btn-success btn-md" href="#">
                                <span class="fa fa-download"></span> 
                                Generar reporte
                            </a>
                            <br>
                        </div>
                    @endif
                </div>
                <div class="row text-center">
                    @if($plan->categoria)
                        <div class="col"><h6 class="panel-title" style="text-align: center; "><i>Pertenece a la categoría: {{$plan->categoria->nombre}} </i></h6></div>
                        <div class="col"><h6 class="panel-title" style="text-align: center; "><i>Encargado de la categoría: {{$plan->categoria->academico->nombre}} </i></h6></div>
                        <div class="col"><h6 class="panel-title" style="text-align: center; "><i>Fecha de término: {{$plan->fecha_termino}} </i></h6></div>
                    </div>
                    <br>
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
                        <br>
                        <hr>
                        <br>
                        <h2> Criterio de hecho </h2>
                        <br>
                        @if($plan->criterio == NULL)
                            <i> Aún no hay un criterio de hecho para este plan de acción. Edite el plan de acción para agregar uno. </i>
                            <br>
                        @else
                            <p> {{$plan->criterio}}</p>
                            <br>
                            <hr>
                        @endif
                    </div>               
                </div>
                <br>

                <div class="container">
                    @if($plan->categoria->id == auth()->user()->categoria->id)
                        <form action="{{ route('plan.destroy', $plan->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: black" class="btn btn-danger btn-sm btn-block" 
                            onclick="return confirm('¿Está seguro de borrar este plan?')" >
                            <span class="fa fa-trash"></span>
                                Eliminar
                            </button>
                        </form>
                        <a style="float:right; color:white !important; border-color: black" class="btn btn-sm btn-block" href="/plan/{{$plan->id}}/edit">
                            <span class="fa fa-edit"></span>
                            Editar
                        </a>                  
                    @endif
                    <br><br><br>
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
                        <button type="submit" class="btn btn-sm btn-secondary">Actualizar plan</button>
                    </form>
                    <hr>    <br><br>
                    @if(!$plan->evidencias->isEmpty())
                        <h2>Evidencias para este plan:</h2>
                        <br><br>
                        @foreach ($evidencias as $evidencia)
                            <h4>{{$evidencia->nombre_archivo}}</h4>
                            <br>
                            <p><i>Archivo asociado:</i> {{$evidencia->archivo_bin}}</p>
                                <a href="/evidencias/{{$evidencia->id}}" class="btn" style="color: white !important; background-color: hsl(360, 100%, 73%, 0.5); border-color: black">Ver evidencia</a>
                            <br><br>  <br>                          
                        @endforeach                                                
                        
                    @else   
                        <br><br>                 
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