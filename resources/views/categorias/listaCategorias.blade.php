{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Categorias</title>
</head>
<style>
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
        </style>
<body>

    <h1>Lista de categorias</h1>
    <form action="/categorias/create">
        <input type="submit" value="Crear categoria" />
    </form>
    @if($categorias->count() > 0)
        <table style="width:50%">
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th> 
                <th>Acciones</th>
            </tr>
            
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{$categoria->nombre}}</td>
                    <td>{{$categoria->descripcion}}</td>
                    <td>
                        <div style="float: right">
                            <a class="btn btn-info btn-sm" href="/categorias/{{$categoria->id}}/edit">Editar</a> --}}
                            {{-- <a class="btn btn-info btn-sm" href="/categorias/create/{{$categoria->id}}">Agregar publicacion.</a> --}}
                            {{-- <a class="btn btn-info btn-sm" href="{{route('categorias.show',$categoria->id)}}">Produccion academica</a> --}}
                            {{-- <form style="float:left" action="{{ route('categorias.destroy',$categoria->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Quiere borrar la categoria: {{ $categoria->nombre }}?')" >Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </table>
       
    @else 
        <p>No hay categorias registradas.</p>
    @endif
    
</body>
</html> --}}
<!DOCTYPE html>
@extends('layouts.app')
@section('content')
     <!-- Page Content -->
<div class="container">
    <div class="container">
        <h1>Listado de categorías</h1>
        <br>               
        @if($categorias->count() > 0)
            <table class="table table-hover" style="background-color: white" >
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
                
            @foreach ($categorias as $categoria)
                <tr>
                    <td><a href="{{route('categorias.show',$categoria->id)}}">{{$categoria->nombre}}</a></td>
                    <td style="height:10px;">{{$categoria->descripcion}}</td>
                    <td>
                        <div style="float: right">
                            <a class="btn btn-info btn-sm" href="/categorias/{{$categoria->id}}/edit">Editar</a> 
                            <form style="float:left" action="{{ route('categorias.destroy',$categoria->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Quiere borrar la categoria: {{ $categoria->nombre }}?')" >
                                            Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </table>
                
        @else 
            <p>No hay categorías registradas.</p>
        @endif      
        
        <br>
        <form action="/categorias/create">
            <input style="float: right" class="btn pretty-btn" type="submit" value="Crear categoría" />
        </form><br>
                        
        <div style="height: 20px"></div>
            <p class="lead mb-0"></p>
        </div>
    </div> 
</div>
@endsection