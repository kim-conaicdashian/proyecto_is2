




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
                        <th>Generar reporte del plan</th>
                    </tr>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->nombre}}</td>
                            @foreach ($recomendaciones as $recomendacion)
                                <td>{{$recomendacion->nombre}}</td>
                            @endforeach
                            
                            @foreach ($planes as $plan)
                                <td>{{$plan->nombre}}
                                <td>{{$plan->fecha_termino}}</td>
                            @endforeach
                            
                            <td>
                                <div class="col-lg-3">
                                    <a style="color:white !important;" class="btn btn-success btn-md" href="{{ route('categoria.reporte', $categoria->id) }}">
                                        <span class="fa fa-download"></span> 
                                        Generar reporte
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