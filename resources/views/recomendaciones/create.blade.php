<!DOCTYPE html>
@extends('layouts.app')
@section('content')

<div class="container">
    <title> Agregar recomendación </title>
    <h2 style="text-align:center;margin-top:20px;"> {{$categoria->nombre}} </h2>
    <hr>
    <form method="POST" action='{{route('recomendacion.store2',$categoria->id)}}'>
        @csrf
            <label for="exampleInputEmail1" style="font-size: 24px;">Nombre:</label>
            <input type="text" class="form-control"  name='nombre' placeholder="Escriba el nombre de la recomendación..." style="margin-bottom:20px;">
            <label for="exampleInputPassword1" style="font-size: 24px;">Descripción:</label>
            <hr>
            <textarea rows="4" cols="50" name='descripcion' style="margin-bottom:20px;"></textarea>
            <hr>    
            <button type="submit" class="btn btn-primary">Agregar recomendación</button>
    </form>
</div>
@endsection