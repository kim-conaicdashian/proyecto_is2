<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<style>
    body {
        background: url('https://source.unsplash.com/twukN12EN7c/1920x1080') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
        }
</style>
<html lang="en">
    <div class="container">
        <title>Editar la recomendación {{$recomendacion->nombre}}  </title>
        <h1 style="text-align:center;margin-top:20px;"> Editar la recomendación: {{$recomendacion->nombre}} </h1>
        <hr>
        <form method="POST" action='{{route('recomendacion.update',$recomendacion->id)}}'>
            @csrf
            @method("put")
            <div class="form-group" {{ $errors->has('nombreRec') ? 'has-error' : ''}}>
            <label for="exampleInputEmail1" style="font-size: 24px;">Nombre</label>
                <input type="text" class="form-control"  name='nombreRec' value="{{$recomendacion->nombre}}" placeholder="Escriba el nuevo nombre para la recomendación">
                {!! $errors->first('nombreRec','<span class="help-block" style="color:red;">:message</span>')!!}
            </div>
            <div class="form-group" {{ $errors->has('descripcionRec') ? 'has-error' : ''}}>
            <label for="exampleInputPassword1" style="font-size: 24px;">Descripción</label>
            </div>
            <textarea rows="4" cols="50" name='descripcionRec'>{{$recomendacion->descripcion}}</textarea>
            {!! $errors->first('descripcionRec','<span class="help-block" style="color:red;">:message</span>')!!}
            <hr>
            <button type="submit" class="btn btn-primary">Editar recomendación</button>
        </form>
    </div>
</html>
