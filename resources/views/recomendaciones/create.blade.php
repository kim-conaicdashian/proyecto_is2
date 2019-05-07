<!DOCTYPE html>
@extends('layouts.app')
@section('content')

<div class="container">
    <title> Agregar recomendación </title>
    <br>
    <p style="font-size:12px; text-align:center"><i>Plan de acción:</i></p>
    <h1 style="text-align:center;margin-top:20px;"> {{auth()->user()->categoria->nombre}} </h1>
    <hr>
    <form method="POST" action='{{route('recomendacion.store')}}'>
        @csrf
            <label for="exampleInputEmail1" style="font-size: 24px;">Nombre:</label>
            <input type="text" class="form-control"  name='nombre' placeholder="Escriba el nombre de la recomendación..." style="margin-bottom:20px;">
            <label for="exampleInputPassword1" style="font-size: 24px;">Descripción:</label>
            <hr>
            <textarea rows="4" cols="50" name='descripcion' style="margin-bottom:20px;"></textarea>
            <hr>    
            <button type="submit" style="float:right" class="btn pretty-btn">Agregar recomendación</button>
    </form>
</div>
@endsection