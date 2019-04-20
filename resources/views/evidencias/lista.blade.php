<!DOCTYPE html>
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
<body class="container">

    <h1>Lista de evidencias</h1>
    <form action="/evidencias/create">
        <input type="submit" value="Crear evidencia" />
    </form>
    @if($evidencias->count() > 0)
        <table style="width:50%">
            <tr>
                <th>Nombre</th>
                             
            </tr>
            
            @foreach ($evidencias as $evidencia)
                <tr>
                    <div class="container">
                        <td>
                            {{$evidencia->nombre_archivo}}                                            
                            <div style="float: right">
                                <a class="btn btn-info btn-sm" href="/evidencias/{{$evidencia->id}}/edit">Editar</a>
                                <form style="float:left" action="{{ route('evidencias.destroy', $evidencia->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Quiere borrar la evidencia {{ $evidencia->nombre }}?')" >Eliminar</button>
                                </form>
                    
                            </div>
                        </td>
                    </div>
                </tr>
            @endforeach
            </table>
       
    @else
        <br>
        <p>No hay evidencias registradas.</p>
    @endif
    
</body>
</html>
</html>