<!DOCTYPE html>
@extends('layouts.app')
@section('content')  
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
                            <div class="col-lg-6 mb-4">
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