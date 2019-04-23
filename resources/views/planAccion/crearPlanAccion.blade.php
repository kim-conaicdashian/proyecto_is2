<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Plan de accion  </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <form method="POST" action='{{route('plan.store')}}'>
        @csrf
        <div class="form-group" {{ $errors->has('nombrePlan') ? 'has-error' : ''}}>
          <label for="exampleInputEmail1">Nombre</label>
          <input type="text" class="form-control"  name='nombrePlan' placeholder="Escriba el nombre para el plan de accion">
          {!! $errors->first('nombrePlan','<span class="help-block" style="color:red;">:message</span>')!!}
        </div>
        <div class="form-group" {{ $errors->has('descripcionPlan') ? 'has-error' : ''}}>
          <label for="exampleInputPassword1">Descripcion</label>
          <textarea rows="4" cols="50" name='descripcionPlan'></textarea>
          {!! $errors->first('descripcionPlan','<span class="help-block" style="color:red;">:message</span>')!!}
        </div>
        
        <button type="submit" class="btn btn-primary">Crear plan de accion</button>
      </form>
      
      
</body>
</html>