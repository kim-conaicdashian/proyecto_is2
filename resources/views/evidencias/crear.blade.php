<!DOCTYPE html>
<html lang="en">
    <style>
    .list-group{
    max-height: 300px;
    margin-bottom: 10px;
    overflow:scroll;
    
    -webkit-overflow-scrolling: touch;
    }
    .panel-primary{
        width: 50%;
    }
    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear evidencia</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body class="container">
    <h1>Subir una nueva evidencia</h1>
    <form method="POST" action='{{route('evidencias.store')}}' enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="nombreEvidencia">Nombre</label>
          <input type="text" class="form-control"  name='nombreEvidencia' placeholder="Escriba el nombre de la evidencia">
        </div>

        <div class="container form-group">
            <input type="file" name="archivo">
        </div>
    
        <h2>Asignar a un plan de acción</h2>
        @if($planes->count() > 0)
            <div class="panel panel-primary" id="result_panel">
                <div class="panel-heading"><h3 class="panel-title">Lista de planes</h3>
                </div>
                <div class="panel-body">
                    <select class="form-control"  name="plan" id="card_type">
                        @foreach ($planes as $plan)
                            <option id="card_id" value="{{$plan->id}}">{{$plan->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        @else 
            <p>No hay planes registrados.</p>
        @endif
        <button type="submit" class="btn btn-primary">Crear evidencia</button>
      </form>
      
      
</body>
</html>