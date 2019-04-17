<!DOCTYPE html>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1>{{auth()->user()->categoria->nombre}}</h1>
    <h2>Descripcion de la categoria</h2>
    <p>{{auth()->user()->categoria->descripcion}}</p>
<br>
    <h3>Planes de accion</h3>
    <form action="/plan/create">
        <input type="submit" value="Crear plan de accion" />
    </form>
   
        <table style="width:50%">
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th> 
                <th>Completado</th> 
                <th>Acciones</th>
            </tr>
           
            @foreach ($planes as $plan)
                <tr>
                    <td>{{$plan->nombre}}</td>
                    <td>{{$plan->descripcion}}</td>
                    <td><input type="checkbox" name="completado" value='pitochuy' > <br></td>
                    <td>
                        <div style="float: right">
                            <a class="btn btn-info btn-sm" href="/plan/{{$plan->id}}/edit">Editar</a>
                            {{-- <a class="btn btn-info btn-sm" href="/categorias/create/{{$categoria->id}}">Agregar publicacion.</a> --}}
                            {{-- <a class="btn btn-info btn-sm" href="{{route('categorias.show',$categoria->id)}}">Produccion academica</a> --}}
                            <form style="float:left" action="{{ route('plan.destroy',$plan->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Quiere borrar el plan de accion:  {{ $plan->nombre }}?')" >Eliminar</button>
                            </form>
                
                        </div>
                    </td>
                </tr>
            @endforeach
            </table>
</body>
</html>