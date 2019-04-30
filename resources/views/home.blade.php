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
    <!-- Navigation --> 
    <nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
        <div class="container">
            <a class="navbar-brand" href="/">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{$categoria_academico->nombre}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-info my-2 my-sm-0">Logout</button>
                </form>
            </div>
        </div>
    </nav>
      
    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body">
                <div class="container">

                    <!-- Page Heading -->
                    <h1 class="my-4">Lista de categorias </small></h1>
                    <!-- Page Heading -->


                    <div class="row">
                        @foreach ($categorias as $categoria)
                            <div class="col-lg-5 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">{{$categoria->nombre}}</a>
                                    </h4>
                                    <p class="card-text">{{$categoria->descripcion}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                    <!-- /.row -->


                </div>
                <!-- /.container -->
            </div>
        </div>
    </div>
@endsection