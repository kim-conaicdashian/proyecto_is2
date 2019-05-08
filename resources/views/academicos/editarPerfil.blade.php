@extends('layouts.app')
@section('content')
    <form method= "POST" action="{{ route('academico.updatePerfil', $academico->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
            <div class="col-md-6">
                <input id="nombre" type="text" class="form-control" name="nombre" value="{{$academico->nombre}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electronico') }}</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$academico->email}}">
                {!! $errors->first('email', '<span style="color:red;">:message</span>') !!}
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="knhdl +w-" placeholder="Contraseña">
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="knhdl +w-" placeholder="Contraseña">
            </div>
        </div>

        <div class="form-group row mb-4">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-success">{{ __('Editar') }}</button>
            </div>
        </div>
    </form>
@endsection