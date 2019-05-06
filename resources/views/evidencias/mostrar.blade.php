<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<div class="card h-100 text-center" style="background-color:transparent;">
    <h1>{{$evidencia->nombre_archivo}}</h1>
    {{-- <img style="width:100%" src="{{asset('public/storage/app/archivos/'.$evidencia->archivo_bin)}}"> --}}
    {{-- <img src="{{$evidencia->archivo_bin}}"> --}}
    <img src="{{$evidencia->archivo_bin}}">

    <div class="card h-100 text-center" style="background-color: hsl(360, 100%, 73%, 0.5);">
        <p>Para el plan de acción: <i>{{$evidencia->planes[0]->nombre}}</i></p>
        
    </div>

    <div style="height: 100px"></div>
        <p class="lead mb-0"></p>
    </div>
    
</div>
@endsection
