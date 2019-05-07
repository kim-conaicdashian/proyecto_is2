<!DOCTYPE html>
@extends('layouts.app')
@section('content')

<div class="container">
  <title> Agregar plan de acción </title>
  <h2 style="margin-top:20px;"> Agregar plan de acción </h2>
  <form method="POST" action="{{route('plan.store')}}">
      @csrf
      <div class="form-group" {{ $errors->has('nombrePlan') ? 'has-error' : ''}}>
        <label for="exampleInputEmail1" style="font-size: 24px;">Nombre</label>
        <input type="text" class="form-control"  name='nombrePlan' placeholder="Escriba el nombre para el plan de accion">
        {!! $errors->first('nombrePlan','<span class="help-block" style="color:red;">:message</span>')!!}
      </div>
      <div class="form-group" {{ $errors->has('descripcionPlan') ? 'has-error' : ''}}>
        <hr>
        <label for="exampleInputPassword1" style="font-size: 24px;">Descripcion</label>
        <hr>
        <textarea rows="4" cols="50" name='descripcionPlan'></textarea>
        {!! $errors->first('descripcionPlan','<span class="help-block" style="color:red;">:message</span>')!!}
      </div>
      <input type='hidden' name='rec' value='{{$rec}}'/>
      <hr>
      <button type="submit" class="btn pretty-btn">Crear plan de accion</button>
    </form>
</div>
@endsection