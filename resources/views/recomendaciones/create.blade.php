<!DOCTYPE html>
@extends('layouts.app')
@section('content')

<div class="container background-style">
    <title> Agregar recomendación </title>
    <br>
    <p style="font-size:12px; text-align:center"><i>Recomendación para:</i></p>
    <h1 style="text-align:center;margin-top:20px;"> {{$categoria->nombre}} </h1>
    <hr>
    <form method="POST" action='{{route('recomendacion.store2',$categoria->id)}}'>
        @csrf
            <label for="exampleInputEmail1" style="font-size: 24px;">Nombre:</label>
            <input type="text" class="form-control"  name='nombre' placeholder="Escriba el nombre de la recomendación..." style="margin-bottom:20px;">
            {!! $errors->first('nombre','<span class="help-block" style="color:red;">:message</span>')!!}
            <br>
            <label for="exampleInputPassword1" style="font-size: 24px;">Descripción:</label>
            <hr>
            <textarea rows="4" cols="50" name='descripcion' style="margin-bottom:20px;"></textarea>
            <br>
            {!! $errors->first('descripcion','<span class="help-block" style="color:red;">:message</span>')!!}
            <hr>    
            <button type="submit" style="background-color: grey; border-color: black; color:white; float:right" class="btn pretty-btn">Agregar recomendación</button>
    </form>
</div>
@endsection