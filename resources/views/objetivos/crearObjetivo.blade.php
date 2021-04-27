@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Crear objetivo</h4>
                    <a class="btn btn-outline-secondary btn-arrow-left" href="{{ route('home') }}">< Volver</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('crearObjetivo') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo de Objetivo</label>

                            <div class="col-md-6">
                                <select id="tipo" name="tipo" type="text" class="form-control" required>
                                    @if(auth()->user()->crea_objetivo_general == 'true')
                                        <option value="General">Objetivo General</option>
                                    @endif
                                    @if(auth()->user()->crea_objetivo_secundario == 'true')
                                        <option value="Secundario">Objetivo Secundario</option>
                                    @endif
                                    @if(auth()->user()->crea_objetivo_hito == 'true')
                                        <option value="Hito">Hito</option>
                                    @endif
                                </select>

                                @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre del objetivo</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripción del objetivo</label>

                            <div class="col-md-6">
                                <textarea id="descripcion" rows=8 class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion" ></textarea>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">Año del objetivo</label>

                            <div class="col-md-6">
                                <select id="year" name="year" type="text" class="form-control" required>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                </select>

                                @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_usuario_destino" class="col-md-4 col-form-label text-md-right">Usuario destino</label>

                            <div class="col-md-6">
                                <select id="id_usuario_destino" name="id_usuario_destino" type="text" class="form-control" required>
                                    @forelse ($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->email }}</option>
                                    @empty
                                        <p>No hay usuarios</p>
                                    @endforelse
                                </select>

                                @error('id_usuario_destino')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @if(auth()->user()->crea_objetivo_general == 'true'
                            && auth()->user()->crea_objetivo_secundario == 'false'
                            && auth()->user()->crea_objetivo_hito == 'false')
                        <div class="form-group row d-none">
                        @else
                        <div class="form-group row">
                        @endif
                            <label for="id_objetivo_dependiente" class="col-md-4 col-form-label text-md-right">Depende de otro objetivo?</label>

                            <div class="col-md-6">
                                <select id="id_objetivo_dependiente" name="id_objetivo_dependiente" type="text" class="form-control" required>

                                    <option value="null" selected="selected">No depende de ningún objetivo</option>

                                    @forelse ($objetivos as $objetivo)
                                        <option value="{{ $objetivo->id }}">{{ $objetivo->id }} / {{ $objetivo->nombre }} ({{ $objetivo->tipo }})</option>
                                    @empty
                                        <p>No hay objetivos</p>
                                    @endforelse
                                </select>

                                @error('id_objetivo_dependiente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Crear Objetivo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
