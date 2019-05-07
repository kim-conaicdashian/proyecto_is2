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

    <h1>Lista de categorías</h1>
    <form action="/categorias/create">
        <input type="submit" value="Crear categoria" />
    </form>
    @if($categorias->count() > 0)
        <table style="width:50%">
            <tr>
                <th>Nombre</th>
                <th>Descripción</th> 
                <th>Acciones</th>
            </tr>
            
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{$categoria->nombre}}</td>
                    <td>{{$categoria->descripcion}}</td>
                    <td>
                        <div style="float: right">
                            <a class="btn btn-info btn-sm" href="/categorias/{{$categoria->id}}/edit">Editar</a> --}}
                            {{-- <a class="btn btn-info btn-sm" href="/categorias/create/{{$categoria->id}}">Agregar publicación.</a> --}}
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
        <p>No hay categorías registradas.</p>
    @endif
    
</body>
</html> --}}
<!DOCTYPE html>
@extends('layouts.app')
@section('content')
     <!-- Page Content -->
     <title> Categorías </title>
     <div class="container">
        <div class="card border-0 shadow my-5">
          <div class="card-body p-5">
            <h1>Listado de categorías.</h1>
            <br>
                <form action="/categorias/create">
                    <input class="btn btn-success" type="submit" value="Crear categoría" />
                </form><br>
                @if($categorias->count() > 0)
                    <table style="width:100%">
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
                {{ $categorias->links() }}
            <div style="height: 20px"></div>
            <p class="lead mb-0"></p>
          </div>
        </div>
@endsection