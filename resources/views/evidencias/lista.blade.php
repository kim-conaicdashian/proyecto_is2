<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<style>
    .center-cropped {
        padding-top: 20px;
        width: 200px;
        height: 200px;

        display: block;
        margin: auto;
        
    }
</style>
<div class="container" >
    <h1 class="my-4" style="text-align: center">Lista de evidencias</h1>
    
    @if($evidencias->count() > 0)
        <div class="row" >
        @foreach($evidencias as $evidencia)
            
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100" style="background-color: hsl(360, 100%, 73%, 0.5);">
                    
                    <img class="center-cropped" style="align: middle;" src="{{$evidencia->archivo_bin}}" alt="image">
                    <div class="card-body">
                        <h6 class="card-title">
                            <a href="evidencias/{{$evidencia->id}}"><p style="text-align: center; color:black;">{{$evidencia->nombre_archivo}}</p></a>
                        </h6>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <form action="{{ route('evidencias.destroy', $evidencia->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color: black" class="btn btn-danger btn-sm btn-block" onclick="return confirm('¿Está seguro de borrar la evidencia?')" >Eliminar</button>
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <a style="float:right; border-color: black" class="btn btn-sm btn-block" href="/evidencias/{{$evidencia->id}}/edit">Editar</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        </div>
        <a href="evidencias/create" class="btn" style="float:right; color:black; border-color: black; background-color: hsl(360, 100%, 73%, 0.5)">Crear nueva evidencia</a>
    @else
        <br>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <h4>No hay evidencias registradas.</h4>
            </div>
            <div class="col-lg-6 col-md-6">
                <a href="evidencias/create" class="btn" style="float:right; color:black; background-color: #C76A71; border-color: #C76A71">Crear nueva evidencia</a>
            </div>
        </div>
    
    @endif
    
    <div style="height: 100px"></div>
        <p class="lead mb-0"></p>
    </div>
</div>    
    
    @endsection
    
    


