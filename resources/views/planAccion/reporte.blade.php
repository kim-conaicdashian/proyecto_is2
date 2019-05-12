<!DOCTYPE html>
@extends('layouts.reporte')
@section('content')
<div class="container">
    <h1 style="text-align: center"> {{$plan->nombre}} </h1>
    <h3 style="text-align: center"> {{$plan->descripcion}} </h3>
<h3> El plan de acción <i>{{$plan->nombre}} </i> es parte de la recomendación 
    <i>{{$plan->recomendacion->nombre}}</i>, y esta última pertenece a la categoría 
    <i>{{$plan->categoria->nombre}}</i>.</h3>
    <h1 style="text-align:center"> <i>Imágenes </i></h1>
    @foreach($plan->evidencias as $evidencia)
        @if($evidencia->tipo_archivo == "pdf")
        @else
            <h3> Nombre de la evidencia: {{$evidencia->nombre_archivo}}</h3> 
            <img src="{{ltrim($evidencia->archivo_bin, $evidencia->archivo_bin[0])}}" width="60%" height="90%" style="padding-bottom: 20px;">
        @endif
    @endforeach
    <h1 style="text-align:center"> <i> Documentos: </i></h1>
</div>
@endsection