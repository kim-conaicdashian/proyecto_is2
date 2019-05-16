@extends('layouts.app')
@section('content')
<div class="container">
    {{-- <title>{{$categoria->nombre}}</title>    
    <div class="card border-0 shadow my-5 text-center background-style">
        <br>
        <p style="font-size:12px"><i>Categoría seleccionada:</i></p>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h1 style="font-family: helvetica">{{$categoria->nombre}}</h1>
            </div>
            @if(auth()->user()->privilegio == 1)
                <div class="col-lg-3">
                    <a style="color:white !important;" class="btn btn-success btn-md" href="{{ route('categoria.reporte', $categoria->id) }}">
                        <span class="fa fa-download"></span> 
                        Generar reporte
                    </a>
                </div>
            @endif
        </div>
        <div class="container">
            @if(isset($categoria->academico))
                <h3>Académico encargado de esta categoría: {{$categoria->academico->nombre}}</h3>                
            @else
                <h6><i>No hay ningún académico asignado a esta categoría.</i></h6>
            @endif
        </div>
        <br>
        <hr>
        <h2>Descripción</h2>
        <p>{{$categoria->descripcion}}</p>
        <hr>

        <div class="container">
            
            @if(!$categoria->recomendaciones->isEmpty())
                <h2 class="panel-title">Recomendaciones para esta categoría:</h2>
                <hr>
                @foreach ($recomendaciones as $recomendacion)  
                    <h4>{{$recomendacion->nombre}}</h4>

                    <div class="row">
                    <div class="col-lg-4 col-md-3">
                        <br>
                    @if (auth()->user()->privilegio==1)                                            
                            <a  class="btn btn-info btn-md" href="/recomendacion/{{$recomendacion->id}}/edit" style="color:white !important;">
                                <span class="fa fa-edit"></span> 
                                Editar
                            </a>
                            <br><br>                
                    @endif
                    </div>
                        <div class="col-lg-4 col-md-3">
                                <br>
                            <a  href="/recomendacion/{{$recomendacion->id}}" class="btn" style="background-color: grey; border-color: black; color:white !important;">Ver recomendación</a>
                            <br>
                        </div>

                    @if (auth()->user()->privilegio==1)    
                        <div class="col-lg-4 col-md-3">
                            <form action="{{ route('recomendacion.destroy',$recomendacion->id) }}" method="POST" style="">
                                @csrf
                                @method('DELETE')
                                <br>
                                <button type="submit" class="btn btn-danger btn-md" 
                                    onclick="return confirm('¿Quiere borrar la recomendación: {{ $recomendacion->nombre }}?')"
                                    >
                                    <span class="fa fa-trash"></span>
                                    Eliminar
                                </button>
                                <br>
                            </form>
                        </div>                    
                    @endif
                    </div>

                    <hr>
                @endforeach
                
            @else
                <div class="panel-heading"><h3 class="panel-title">No hay recomendaciones asignadas para esta categoría. </h3>
                </div>
            @endif
            @if (auth()->user()->privilegio == 1) 
                <div class="row">
                    <div class="col-lg-4 col-md-3">        
                    </div>
                    <div style="text-align:center" class="col-lg-4 col-md-3">
                        <form action="/recomendacion/create/{{$categoria->id}}" style="position:relative; top:50%;">
                            <input style="color: white; background-color: grey; border-color: black" type="submit" class="btn btn-primary btn-lg" value="Agregar recomendación" />
                        </form>
                    </div>
                </div>
            @endif
        </div>
        <div style="height: 100px"></div>
            <p class="lead mb-0"></p>
        </div>
    </div> --}}
    <div class="row text-center">
        <div class="col-lg-12 col-md-12">
            <h1>Categoría: {{$categoria->nombre}}</h1>
        </div>
    </div>
    <hr>
    <div class="row text-center">
        <div class="col-lg-12 col-md-12">
            <h3>Descripción</h3>
            <p class="descripcion-texto">{{$categoria->descripcion}}</p>
        </div>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="recomendaciones-tab" data-toggle="tab" href="#recomendaciones" role="tab" aria-controls="recomendaciones" aria-selected="true">Recomendaciones</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="planes-tab" data-toggle="tab" href="#planes" role="tab" aria-controls="planes" aria-selected="false">Planes de acción</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="recomendaciones" role="tabpanel" aria-labelledby="recomendaciones-tab">
            @if(count($categoria->recomendaciones) > 0)
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>Recomendación</th>
                        <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categoria->recomendaciones as $recomendacion)
                            <tr>
                                <td>{{$recomendacion->nombre}}</td>
                                <td><p class="descripcion-texto">{{$recomendacion->descripcion}}</p></td>
                            <tr>        
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No hay recomendaciones para esta categoría.</p>
            @endif
        </div>
        <div class="tab-pane fade" id="planes" role="tabpanel" aria-labelledby="planes-tab">
            @if(count($planes) > 0)
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>Plan de acción</th>
                        <th>Pertenece a la recomendación</th>                        
                        <th>Completado</th>
                        <th>Fecha de término</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($planes as $plan)                                                        
                            <tr>
                                
                                <td>{{$plan->nombre}}</td>
                                <td>{{$plan->recomendacion->nombre}}</td>
                                @if($plan->completado == 0)                            
                                    <td>En proceso</td>
                                @else
                                    <td>Completado</td>
                                @endif
                                <td>{{$plan->fecha_termino}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No hay planes para esta categoría.</p>
            @endif
    
        </div>
    </div>
    
    <hr>

    @if (auth()->user()->privilegio == 1) 
        <div class="row">
            <div class="col-lg-4 col-md-3">        
            </div>
            <div style="text-align:center" class="col-lg-4 col-md-3">
                <form action="/recomendacion/create/{{$categoria->id}}" style="position:relative; top:50%;">
                    <input type="submit" class="btn btn-primary" value="Agregar recomendación" />
                </form>
            </div>
        </div>
    @endif

</div>
@endsection