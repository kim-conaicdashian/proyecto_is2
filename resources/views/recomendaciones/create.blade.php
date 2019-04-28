<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar recomendación  </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <form method="POST" action='{{route('recomendacion.store')}}'>
        @csrf
          <label for="exampleInputEmail1">Nombre:</label>
          <input type="text" class="form-control"  name='nombre' placeholder="Escriba el nombre de la recomendación...">
          <label for="exampleInputPassword1">Descripción:</label>
          <textarea rows="4" cols="50" name='descripcion'></textarea>
          <br>
          <button type="submit" class="btn btn-primary">Agregar recomendación</button>
      </form>
      
      
</body>
</html>