<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<div class="container">

        
        <h1 class="my-4" style="text-align: center">Lista de evidencias
        </h1>
      
        @if($evidencias->count() > 0)
            <div class="row">
            @foreach($evidencias as $evidencia)
                
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{$evidencia->archivo_bin}}" alt="image">
                        <div class="card-body">
                            <h4 class="card-title">
                            <a href="evidencias/{{$evidencia->id}}"><p style="text-align: center">{{$evidencia->nombre_archivo}}</p></a>
                            </h4>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <form action="{{ route('evidencias.destroy', $evidencia->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-block" onclick="return confirm('Quiere borrar la evidencia {{ $evidencia->nombre }}?')" >Eliminar</button>
                                    </form>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <a style="float:right" class="btn btn-info btn-sm btn-block" href="/evidencias/{{$evidencia->id}}/edit">Editar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        @else
            <br>
            <p>No hay evidencias registradas.</p>
        @endif

        
        </div>
        <a href="evidencias/create"><button class="btn" style="float:right">Crear nueva evidencia</button></a>

@endsection
