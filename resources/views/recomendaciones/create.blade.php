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
    <title> Agregar recomendación </title>
    <h2 style="text-align:center;margin-top:20px;"> {{auth()->user()->categoria->nombre}} </h2>
    <hr>
    <form method="POST" action='{{route('recomendacion.store')}}'>
        @csrf
            <label for="exampleInputEmail1" style="font-size: 24px;">Nombre:</label>
            <input type="text" class="form-control"  name='nombre' placeholder="Escriba el nombre de la recomendación..." style="margin-bottom:20px;">
            <label for="exampleInputPassword1" style="font-size: 24px;">Descripción:</label>
            <hr>
            <textarea rows="4" cols="50" name='descripcion' style="margin-bottom:20px;"></textarea>
            <hr>    
            <button type="submit" class="btn btn-primary">Agregar recomendación</button>
    </form>
</div>