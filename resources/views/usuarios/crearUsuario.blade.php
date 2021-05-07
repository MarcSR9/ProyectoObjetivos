@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Crear nuevo usuario</h4>
                    <a class="btn btn-outline-secondary btn-arrow-left" href="{{ route('usuarios.lista') }}">< Volver</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('usuarios.crear') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                            <div class="col-md-6">
                                <select id="role" name="role" type="text" class="form-control" required>
                                    <option value="Admin">Admin</option>
                                    <option value="Director General">Director General</option>
                                    <option value="Default" selected>Default</option>
                                </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check row">
                                <label class="col-md-4 col-form-label text-md-right">Permiso para crear objetivos generales:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="obj_general" id="obj_general" value="true">
                                    <label class="form-check-label" for="obj_general">Sí</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="obj_general" id="obj_general" value="false">
                                    <label class="form-check-label" for="obj_general">No</label>
                                </div>
                            </div>

                            <div class="form-check row">
                                <label class="col-md-4 col-form-label text-md-right">Permiso para crear objetivos secundarios:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="obj_secundario" id="obj_secundario" value="true">
                                    <label class="form-check-label" for="obj_secundario">Sí</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="obj_secundario" id="obj_secundario" value="false">
                                    <label class="form-check-label" for="obj_secundario">No</label>
                                </div>
                            </div><div class="form-check row">
                                <label class="col-md-4 col-form-label text-md-right">Permiso para crear hitos:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="obj_hito" id="obj_hito" value="true">
                                    <label class="form-check-label" for="obj_hito">Sí</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="obj_hito" id="obj_hito" value="false">
                                    <label class="form-check-label" for="obj_hito">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Crear Usuario</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
