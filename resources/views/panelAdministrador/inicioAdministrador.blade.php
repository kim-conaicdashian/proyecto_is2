




    <!-- Navigation -->
    
@extends('panelAdministrador.layouts.app')
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Control de planes de acción</h1>
                </div>
            </div>
            @if($planes->count() > 0)
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Categoría</th>
                        <th>Recomendación</th>
                        <th>Plan de acción</th>
                        <th>Fecha de término</th>
                        <th>Completado</th>
                        <th>Generar reporte del plan</th>
                    </tr>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->nombre}}</td>
                            @foreach ($recomendaciones as $recomendacion)
                                <td>{{$recomendacion->nombre}}</td>
                            @endforeach
                            
                            @foreach ($planes as $plan)
                                <td><a href="{{route('plan.show',$plan->id)}}">{{$plan->nombre}}</a></td>
                                <td>{{$plan->fecha_termino}}</td>
                            @endforeach
                            @if ($plan->completdo== 1)
                                <td>
                                    <p style="text-align:center">Sí</p>
                                </td>
                            @else
                            <td>
                                    <p style="text-align:center">No</p>
                                </td>
                            @endif
                            
                            <td>
                                <div class="col-lg-3 center-block" style="position: relative;text-align:center;left: 30%;">
                                    <a style="color:white !important;" class="btn btn-success btn-sm" href="{{ route('categoria.reporte', $categoria->id) }}">
                                        <span class="fa fa-download"></span> 
                                        
                                    </a>
                                </div>
                            </td>
                            
                        </tr>
                    @endforeach
                    
                </table>
            @else
                <h3>No hay planes de acción</h3>
            @endif

            
            

        </div>
    </div>

@endsection