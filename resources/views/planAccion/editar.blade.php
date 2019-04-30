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
<div class="container">
    <title> Editar plan de acción </title>
    <h2 style="text-align:center;margin-top:20px;"> {{$plan->nombre}} </h2>
    <hr>
    <form method="POST" action='{{route('plan.update',$plan->id)}}'>
        @csrf
        @method("put")
        <div class="form-group" {{ $errors->has('nombrePlan') ? 'has-error' : ''}}>
        <label for="exampleInputEmail1" style="font-size: 24px;">Nombre</label>
            <input type="text" class="form-control"  name='nombrePlan' value="{{$plan->nombre}}" placeholder="Escriba el nombre para el plan de accion">
            {!! $errors->first('nombrePlan','<span class="help-block" style="color:red;">:message</span>')!!}
        </div>
        <div class="form-group" {{ $errors->has('descripcionPlan') ? 'has-error' : ''}}>
            <label for="exampleInputPassword1" style="font-size: 24px;">Descripción</label>
        </div>
        <textarea rows="4" cols="50" name='descripcionPlan'>{{$plan->descripcion}}</textarea>
        {!! $errors->first('descripcionPlan','<span class="help-block" style="color:red;">:message</span>')!!}
        <hr>
        <button type="submit" class="btn btn-primary">Editar plan de acción</button>
    </form>
</div>