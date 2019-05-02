@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1>Categoría: {{$categoria->nombre}}</h1>
                <br>
                <div class="form-group " >
                        <div class="panel-heading"><h3 class="panel-title">Descripción</h3>
                    <p>{{$categoria->descripcion}}</p>
                    
                </div>
                
                {{-- @php
                    dd($categoria->academico);
                @endphp --}}
                    <div class="panel panel-primary" id="result_panel">
                        @if(isset($categoria->academico))
                        <div class="panel-heading"><h3 class="panel-title">Académicos encargado de esta categoría: {{$categoria->academico->nombre}} </h3>
                        </div>
                        @else
                            <div class="panel-heading"><h3 class="panel-title">No hay ningún académico asignado a esta categoria. </h3>
                            </div>
                        @endif
                        
                    </div>

            <div style="height: 100px"></div>
                <p class="lead mb-0"></p>
            </div>
        </div>
    </div>
@endsection