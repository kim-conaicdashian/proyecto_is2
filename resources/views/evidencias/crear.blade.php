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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script scr="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script scr="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</head>

<style>
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

<body class="container">
      
      <!-- Page Content -->
      <div class="container">
        <div class="card border-0 shadow my-5">
          <div class="card-body p-5">
                <h1 style="text-align:center">Subir una nueva evidencia</h1>
                <br><br><br><br>
                <form method="POST" action='{{route('evidencias.store')}}' enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <h4>Nombre de la evidencia</h4>
                      <input type="text" class="form-control"  name='nombreEvidencia' placeholder="Escriba el nombre de la evidencia">
                      {!! $errors->first('nombreEvidencia','<span class="help-block" style="color:red;">:message</span>')!!}
                    </div>
                    <br><br>
                    <div class="form-group">
                        <h4>Archivo de la evidencia</h4>
                        <input class="btn" type="file" name="archivo">
                        {!! $errors->first('archivo','<span class="help-block" style="color:red;">:message</span>')!!}
                    </div>

                    <br><br>

                    <h4>Asignar a un plan de acción</h4>
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