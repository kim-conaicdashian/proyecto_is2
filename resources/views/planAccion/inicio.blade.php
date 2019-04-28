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
    <h2>Recomendaciones</h3>
    @if($recomendaciones->count() == 0)
        <h3> No hay recomendaciones para la categoría {{auth()->user()->categoria->nombre}}</h3>
    @else
        @foreach ($recomendaciones as $recomendacion)
            <h3> Título de la recomendación: {{$recomendacion->nombre}} </h4>
            <p> Descripción: {{$recomendacion->descripcion}} </p>
            <div style="float: right">
                <a class="btn btn-info btn-sm" href="/recomendacion/{{$recomendacion->id}}/edit">Editar</a>
                {{-- <a class="btn btn-info btn-sm" href="/categorias/create/{{$categoria->id}}">Agregar publicacion.</a> --}}
                {{-- <a class="btn btn-info btn-sm" href="{{route('categorias.show',$categoria->id)}}">Produccion academica</a> --}}
                <form style="float:left" action="{{ route('recomendacion.destroy',$recomendacion->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Quiere borrar la recomendación: {{ $recomendacion->nombre }}?')" >Eliminar</button>
                </form>
            </div>
            @if ($recomendacion->plan_accion != NULL)
                @foreach ($planes as $plan)
                    @if ($plan->recomendacion_id == $recomendacion->id)
                        <h3> Plan de acción propuesto </h3>
                        <table style="width:50%">
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Completado</th>
                                <th>Acciones</th>
                            </tr>
                            <tr>
                                <td>{{$plan->nombre}}</td>
                                <td>{{$plan->descripcion}}</td>
                                <td><input type="checkbox" name="completado" value='ACTUALIZAR_ITERACION_2' > <br></td>
                                <td>
                                    <div style="float: right">
                                        <a class="btn btn-info btn-sm" href="/plan/{{$plan->id}}/edit">Editar</a>
                                        {{-- <a class="btn btn-info btn-sm" href="/categorias/create/{{$categoria->id}}">Agregar publicacion.</a> --}}
                                        {{-- <a class="btn btn-info btn-sm" href="{{route('categorias.show',$categoria->id)}}">Produccion academica</a> --}}
                                        <form style="float:left" action="{{ route('plan.destroy',$plan->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Quiere borrar el plan de acción:  {{ $plan->nombre }}?')" >Eliminar</button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        </table>
                    @endif
                @endforeach
            @else
                <p> No hay un plan de acción actualmente para esta recomendación. </p>
                <form action="{{ route('plan.create')}}">
                    <input type='hidden' value='{{$recomendacion->id}}' name='rec_id'/>
                    <input type='submit' value='Crear plan de accion' />
                </form>
            @endif
        @endforeach
    @endif
    <p> Fin de las recomendaciones. </p>
    <form action="/recomendacion/create">
        <input type="submit" value="Agregar recomendación" />
    </form>
</body>
</html>
