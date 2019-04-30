<!DOCTYPE html>
@extends('layouts.app')
@section('name')
    <h1>{{$evidencia->nombre_archivo}}</h1>
    {{-- <img style="width:100%" src="{{asset('public/storage/app/archivos/'.$evidencia->archivo_bin)}}"> --}}
    {{-- <img src="{{$evidencia->archivo_bin}}"> --}}
    <img src="{{$evidencia->archivo_bin}}">

    <h2>Planes de acción asignados</h2>
    @foreach($evidencia->planes as $plan )
        <h4>{{$plan->nombre}}</h4>
    @endforeach
@endsection
