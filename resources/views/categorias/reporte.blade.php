<!DOCTYPE html>
@extends('layouts.reporte')
@section('content')
<div class="container">
    <h1 style="text-align: center"> {{$categoria->nombre}} </h1>
    <h2 style="text-align: center"> {{$categoria->descripcion}} </h2>
    <h3> La categoría <i>{{$categoria->nombre}} </i> forma parte de las diez categorías en las que la Licenciatura en 
        Ciencias de la Computación se compromete a atender recomendaciones de CONAIC.</h3>
    <h3> Estas son las recomendaciones que se están atendiendo actualmente: </h3>
    <hr>
    @foreach($categoria->recomendaciones as $recomendacion)
        <h2> {{$recomendacion->nombre}} </h2>
        <h2> {{$recomendacion->descripcion}} </h2>
        <hr>
    @endforeach
    <h2 style="text-align:center"> Detalles por recomendación. </h2>
</div>
@endsection