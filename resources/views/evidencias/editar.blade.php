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
    <title>Editar evidencia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script scr="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script scr="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container">
    
    <!-- Page Content -->
    <div class="container">
            <div class="card border-0 shadow my-5">
              <div class="card-body p-5">
                    <h1 style="text-align:center">Editar evidencia</h1>
                    <br><br><br><br>
                    <form method="POST" action='{{route('evidencias.update', $evidencia->id)}}' enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <div class="form-group">
                          <h4>Nombre de la evidencia</h4>
                          <input type="text" class="form-control"  name='nombreEvidencia' value="{{ $evidencia->nombre_archivo }}" placeholder="Escriba el nombre de la evidencia">
                        </div>
                        <br><br>
                        <div class="form-group">                            
                            <h4>Cambiar archivo de la evidencia</h4>
                            <input class="btn" type="file" name="archivo">

                            <br><br>
                            <h6>Archivo actual:</h6>
                            <p>{{$evidencia->archivo_bin}}</p>

                        </div>
    
                        <br><br>
    
                        <h4>Asignado a los planes de acción:</h4>
                        @foreach ($evidencia->planes as $plan)
                            <ul>
                                <li>{{$plan->nombre}}</li>
                            </ul>
                        @endforeach
                        
                        <br><br>
                        <h4>Asignar a otro plan de acción</h4>
                        @if($planes->count() > 0)
                            <div class="panel panel-primary" id="result_panel">
                                <div class="panel-heading"></div>
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
                        <br>
                        <button style="float: right" submit" class="btn btn-primary">Crear evidencia</button>
                      </form>
              </div>
            </div>
          </div>
</body>
</html>