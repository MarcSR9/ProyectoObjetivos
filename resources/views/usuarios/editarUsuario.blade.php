@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Editar usuario</h4>
                    <a class="btn btn-outline-secondary btn-arrow-left" href="{{ route('usuarios.lista') }}">< Volver</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('usuarios.actualizar', $usuario) }}">
                        @csrf

                        <div class="form-group row" style="display: none;">
                            <label for="id" class="col-md-4 col-form-label text-md-right">ID</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control" name="id" value="{{ old('id', $usuario->id) }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $usuario->name) }}" required autocomplete="name" autofocus>

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
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname', $usuario->surname) }}" required autocomplete="surname" autofocus>

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
                                    <option value="Admin" {{ $usuario->role == 'Admin' ? 'selected' : ''}}>Admin</option>
                                    <option value="Director General" {{ $usuario->role == 'Director General' ? 'selected' : '' }}>Director General</option>
                                    <option value="Default" {{ $usuario->role == 'Default' ? 'selected' : '' }}>Default</option>
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
                                    <input class="form-check-input" {{ $usuario->crea_objetivo_general == 'true' ? 'checked' : '' }} type="radio" name="obj_general" id="obj_general" value="true">
                                    <label class="form-check-label" for="obj_general">Sí</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" {{ $usuario->crea_objetivo_general == 'false' ? 'checked' : '' }} type="radio" name="obj_general" id="obj_general" value="false">
                                    <label class="form-check-label" for="obj_general">No</label>
                                </div>
                            </div>

                            <div class="form-check row">
                                <label class="col-md-4 col-form-label text-md-right">Permiso para crear objetivos secundarios:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" {{ $usuario->crea_objetivo_secundario == 'true' ? 'checked' : '' }} type="radio" name="obj_secundario" id="obj_secundario" value="true">
                                    <label class="form-check-label" for="obj_secundario">Sí</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" {{ $usuario->crea_objetivo_secundario == 'false' ? 'checked' : '' }} type="radio" name="obj_secundario" id="obj_secundario" value="false">
                                    <label class="form-check-label" for="obj_secundario">No</label>
                                </div>
                            </div><div class="form-check row">
                                <label class="col-md-4 col-form-label text-md-right">Permiso para crear hitos:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" {{ $usuario->crea_objetivo_hito == 'true' ? 'checked' : '' }} type="radio" name="obj_hito" id="obj_hito" value="true">
                                    <label class="form-check-label" for="obj_hito">Sí</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" {{ $usuario->crea_objetivo_hito == 'false' ? 'checked' : '' }} type="radio" name="obj_hito" id="obj_hito" value="false">
                                    <label class="form-check-label" for="obj_hito">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $usuario->email) }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
