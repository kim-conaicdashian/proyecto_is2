<!DOCTYPE html>
@extends('layouts.app')
@section('content')  
    <!-- Page Content -->
    <title> Inicio </title>
    <div class="container">
        <div class="card border-0 shadow my-5" style="background-color:transparent;">
            <div class="card-body" >
                <div class="container">

                    <!-- Page Heading -->
                    <h1 class="my-4" style="text-align: center">Lista de categorías </small></h1>
                    <!-- Page Heading -->
                    

                    {{-- Hacemos un for loop para designar que sólo la primera carta sea del tamaño de dos columnas --}}
                    <div class="row">
                        @if ($academico->categoria)
                            <div class="col-lg-12 col-md-12" style="padding-bottom: 10px">
                                <div class="card h-100 text-center" style="background-color: hsl(360, 100%, 73%, 0.5);">
                                    <div class="card-body">
                                    <h4 class="card-title" style="text-align: center; opacity:1;">
                                        <h2 style="color:black">{{$academico->categoria->nombre}}</h2>
                                    </h4>
                                    <p class="card-text" style="text-align: center;">{{$academico->categoria->descripcion}}</p>
                                    <a href="categorias/{{$academico->categoria->id}}" class="btn" style="color: black; background-color: hsl(360, 100%, 73%, 0.5); border-color: black">Ver más</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @foreach ($categorias as $categoria)
                            
                            @if(!$academico->categoria || $academico->categoria->id != $categoria->id)
                                <div class="col-lg-6 col-md-6" style="padding-bottom: 10px">
                                    <div class="card h-100 text-center" style="background-color: hsl(360, 100%, 73%, 0.5);">
                                        <div class="card-body">
                                            <h4 class="card-title" style="text-align: center; opacity:1;">
                                                <h4 style="color:black">{{$categoria->nombre}}</h4>
                                            </h4>
                                            <p class="card-text" style="text-align: center;">{{$categoria->descripcion}}</p>                                        
                                            <a href="categorias/{{$categoria->id}}" class="btn" style="color: black; background-color: hsl(360, 100%, 73%, 0.5); border-color: black">Ver más</a>
                                        </div>
                                    </div>
                                </div> 
                            @endif
                        @endforeach
                        
                    </div>
                    <!-- /.row -->


                </div>
                <!-- /.container -->
            </div>
        </div>
    </div>
@endsection

