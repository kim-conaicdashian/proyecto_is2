<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar evidencia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script scr="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script scr="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <title>Evidencias</title>
</head>
<style>
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }

        body {
            background: url('https://source.unsplash.com/twukN12EN7c/1920x1080') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }

        @media (pointer: coarse) and (hover: none) {
            header {
            background: url('https://source.unsplash.com/XT5OInaElMw/1600x900') black no-repeat center center scroll;
            }
            header video {
            display: none;
            }
        }
</style>

{{-- <body class="container"> --}}
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
</body>

</html>