<!DOCTYPE html>
@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container background-style" >
    <title>Crear evidencia</title>
    <div class="container" >
        <div class="card border-0 shadow my-5" style="background-color:transparent;">
          <div class="card-body p-5">
                <h1 style="text-align:center">Subir una nueva evidencia</h1>
                <br><br><br><br>
                <form method="POST" action='{{route('evidencias.store')}}' enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <h4>Nombre de la evidencia</h4>
                      <input type="text" class="form-control"  name='nombreEvidencia' placeholder="Escriba el nombre de la evidencia">
                      {!! $errors->first('nombreEvidencia','<span class="help-block" style="color:red;">:message</span>')!!}
                    </div>
                    <br><br>
                    <div class="form-group">
                        <h4>Archivo de la evidencia</h4>
                        <input class="btn" type="file" name="archivo">
                        {!! $errors->first('archivo','<span class="help-block" style="color:red;">:message</span>')!!}
                    </div>

                    <br><br>

                    <h4>Asignar a un plan de acción</h4>
                    @if(count($planes) > 0)
                        <div class="panel panel-primary" id="result_panel">
                            <div class="panel-heading"></div>
                            
                            <div class="panel-body">
                                <select class="form-control"  name="plan" id="card_type">
                                    @foreach ($planes as $plan)
                                        <option id="card_id" value="{{$plan->id}}">{{$plan->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @else 
                        <p>No hay planes registrados.</p>
                    @endif
                    {!! $errors->first('plan','<span class="help-block" style="color:red;">:message</span>')!!}
                    <br>
                    <button style="float: right; background-color: grey; border-color: black; color:white !important;" type="submit" class="btn pretty-btn">Crear evidencia</button>
                </form>
          </div>
          
        </div>
    </div>
@endsection