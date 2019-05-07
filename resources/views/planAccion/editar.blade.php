<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<div class="container">
    <title> Editar plan de acción </title>
    <h2 style="text-align:center;margin-top:20px;"> {{$plan->nombre}} </h2>
    <hr>
    <form method="POST" action='{{route('plan.update',$plan->id)}}'>
        @csrf
        @method("put")
        <div class="form-group" {{ $errors->has('nombrePlan') ? 'has-error' : ''}}>
        <label for="exampleInputEmail1" style="font-size: 24px;">Nombre</label>
            <input type="text" class="form-control"  name='nombrePlan' value="{{$plan->nombre}}" placeholder="Escriba el nombre para el plan de acción">
            {!! $errors->first('nombrePlan','<span class="help-block" style="color:red;">:message</span>')!!}
        </div>
        <div class="form-group" {{ $errors->has('descripcionPlan') ? 'has-error' : ''}}>
            <label for="exampleInputPassword1" style="font-size: 24px;">Descripción</label>
            <br>
            <textarea rows="4" cols="50" name='descripcionPlan'>{{$plan->descripcion}}</textarea>
            {!! $errors->first('descripcionPlan','<span class="help-block" style="color:red;">:message</span>')!!}
        </div>
        <div class="form-group" {{ $errors->has('fecha_termino') ? 'has-error' : ''}}>
            <label  style="font-size: 24px;">Fecha de término:</label>
            <input style="width: 15%;" type="date" class="form-control"  name='fecha_termino' >
            {!! $errors->first('fecha_termino','<span class="help-block" style="color:red;">:message</span>')!!}
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" style="font-size: 24px;">Plan completado</label>
            <select name="completado">
                <option value="0">No</option>
                <option value="1">Sí</option>
            </select>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Editar plan de acción</button>
    </form>
</div>
@endsection