<!DOCTYPE html>
@extends('layouts.app')
@section('content')  
    <!-- Page Content -->
    <title> Inicio </title>
    <div class="container">
        <div class="card border-0 shadow my-5 background-style">
            <div class="card-body" >
                <div class="container">

                    <!-- Page Heading -->
                    <h1 class="my-4" style="text-align: center">Lista de categorías </small></h1>
                    <!-- Page Heading -->
                    <hr style="border-top: 3px solid rgba(0, 0, 0, 0.3);">

                    {{-- Hacemos un for loop para designar que sólo la primera carta sea del tamaño de dos columnas --}}
                    <div class="row">
                        @for($i = 0 ; $i < count($categorias) ;  $i++)
                            @if($i == 0)
                            <div class="col-lg-12 col-md-12" style="padding-bottom: 10px">
                                <div class="container text-center" style="background-color: transparent">
                                    <div class="card-body">
                                    <h4 class="card-title" style="text-align: center; opacity:1;">
                                        <h2 style="color:black">{{$categorias[$i]->nombre}}</h2>
                                    </h4>
                                    <p class="card-text" style="text-align: center;">{{$categorias[$i]->descripcion}}</p>
                                    <a href="categorias/{{$categorias[$i]->id}}" class="btn" style="color: black; background: linear-gradient(to bottom right, #339933 1%, #33cc33 101%);">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            
                            @else
                            <div class="col-lg-6 col-md-6" style="padding-bottom: 10px">
                                <div class="card h-100 text-center" style="background-color: hsl(360, 100%, 73%, 0.5);">
                                    <div class="card-body">
                                        <h4 class="card-title" style="text-align: center; opacity:1;">
                                            <h4 style="color:black">{{$categorias[$i]->nombre}}</h4>
                                        </h4>
                                        <p class="card-text" style="text-align: center;">{{$categorias[$i]->descripcion}}</p>                                        
                                        <a href="categorias/{{$categorias[$i]->id}}" class="btn" style="color: black; background: linear-gradient(to bottom right, #339933 1%, #33cc33 101%);">Ver más</a>
                                    </div>
                                </div>
                            </div>                                          
                            @endif
                        @endfor
                        
                    </div>
                    <!-- /.row -->


                </div>
                <!-- /.container -->
            </div>
        </div>
        <div style="height: 100px"></div>
            <p class="lead mb-0"></p>
        </div>
    </div>
@endsection

