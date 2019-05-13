<!DOCTYPE html>
@extends('layouts.reporte')
@section('content')
<div class="container">
    <h1 style="text-align: center"> {{$recomendacion->nombre}} </h1>
    <h2 style="text-align: center"> {{$recomendacion->descripcion}} </h3>
    <h3> La recomendación <i>{{$recomendacion->nombre}} </i> es parte de la categoría <i>{{$recomendacion->categoria->nombre}}</i>.</h3>
    <h3> Estos son los planes de acción que se siguieron para la recomendación: </h3>
    <h3 style="text-align:center"> Planes completados: </h3>
    <hr>
    @if($planesCompletados->count() == 0)
        <h3> No hay planes de acción en progreso actualmente. </h3>
        <hr>
    @else
        @foreach($planesCompletados as $plan)
            <h3> {{$plan->nombre}} </h3>
            <h3> {{$plan->descripcion}}</h3>
            <hr>
        @endforeach
    @endif
    <h3 style="text-align:center"> Planes en progreso: </h3>
    @if($planesProgreso->count() == 0)
        <h3> No hay planes de acción en progreso actualmente. </h3>
        <hr>
    @else 
        @foreach($recomendacion->planes as $plan)
            @if($plan->completado == 0)
                <h3> {{$plan->nombre}} </h3>
                <h3> {{$plan->descripcion}}</h3>
            @endif
            <hr>
        @endforeach
    @endif
    <h2 style="text-align:center"> Detalles de los planes de acción. </h2>
</div>
@endsection