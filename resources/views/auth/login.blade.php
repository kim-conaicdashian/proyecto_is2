@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><h3 class="text-center">Acceder</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">Correo Electronico</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" placeholder="Ingrezar email" value="{{ old('email') }}" required>
                                    {!! $errors->first('email', '<span style="color:red;">Debe ser una dirección de correo electrónico válida.</span>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" placeholder="Ingrezar contraseña" required>
                                    {!! $errors->first('password', '<span style="color:red;">El campo contraseña es requerido.</span>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="remember" > {{ __('Recordar') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                                    <a class="btn btn-link" href="register">{{ __('No tienes una cuanta?. Resgistrate') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection