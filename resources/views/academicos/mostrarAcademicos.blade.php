@extends('layouts.app')
@section('content')
<title>Lista de académicos</title>
<div  class="container">
    <h2 class="text-center">Lista académicos</h2>
    
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID#</th>
                <th >Nombre</th>
                <th >Email</th>
                <th  >Acciones</th>
                
            </tr>
        </thead>
        <tbody>
           @foreach ($academicos as $academico)
                <tr>
                    <th>{{$academico->id}}</th>
                    <td>{{$academico->nombre}}</td>
                    <td>{{$academico->email}}</td>
                    <td style="width:150px">
                        <div class="d-flex">
                            <div class="col-lg-6 col-md-6 flex-fill">
                                <form style="margin: 0px;" action="{{ route('academicos.destroy',$academico->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <center>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Quiere borrar al usuario {{ $academico->nombre }}?')" >
                                            <span class="fa fa-trash"></span>
                                        Eliminar
                                    </button>
                                    </center>
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-6 flex-fill">
                                <center>
                                <a type="button" style="color:white !important;" class="btn btn-info btn-sm" href="{{ route('academicos.edit', $academico->id) }}">
                                        <span class="fa fa-edit"></span>
                                    Editar
                                </a>
                                </center>
                            </div>                            
                        </div>
                    </td>
                </tr>
           @endforeach
        </tbody>
    </table>
    {{ $academicos->links() }}
    <div class="box-footer">
        <button type="button" class="btn btn-secondary" style="margin-bottom:1%;float:right;" data-toggle="modal" data-target="#agregarAcademicoModal">Agregar académico</button>
    </div>
    <br>
    <br>
    </div>

    {{--Modal para Registrar a un usuario--}}
    <div class="modal fade" id="agregarAcademicoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Agregar un usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method= "POST" action="{{ route('academicos.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                {!! $errors->first('email', '<span style="color:red;">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Categorías') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="categoria" id="card_type">
                                    @foreach ($categorias as $categoria)
                                        <option  value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        

                        <div class="form-group row mb-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-secondary">{{ __('Regístrate') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{--Fin Modal para Registrar a un usuario--}}
</div>
@endsection