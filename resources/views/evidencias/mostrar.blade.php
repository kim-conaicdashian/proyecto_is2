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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body class="container">
    
        <h1>{{$evidencia->nombre_archivo}}</h1>
        {{-- <img style="width:100%" src="{{asset('public/storage/app/archivos/'.$evidencia->archivo_bin)}}"> --}}
        {{-- <img src="{{$evidencia->archivo_bin}}"> --}}
        <img src="{{$evidencia->archivo_bin}}">
    
        <h2>Planes de acción asignados</h2>
        @foreach($evidencia->planes as $plan )
            <h4>{{$plan->nombre}}</h4>
        @endforeach
    </form>      
</body>
</html>