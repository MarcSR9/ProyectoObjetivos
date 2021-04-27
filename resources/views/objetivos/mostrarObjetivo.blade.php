@extends('layouts.app')

@section('content')
<div class="container">
	<div class="bg-white p-5 shadow rounded">
		<div class="d-flex justify-content-between align-items-center">
            <h3 class="text-primary mb-4">{{ $objetivo->nombre }}</h3>
            <a class="btn btn-outline-secondary btn-arrow-left font-weight-bold" href="{{ route('home') }}">< Volver</a>
        </div>

		<form method="POST" action="{{ route('actualizarObjetivo', $objetivo) }}">
			@csrf

			@if(auth()->user()->id != $objetivo->id_usuario_origen)
				<p class="h5 my-3">Tipo de objetivo: {{ $objetivo->tipo }}</p>
				<p class="h5 my-3">Creado por: {{ $creador->name }} {{ $creador->surname }}</p>
				<p class="h5 my-3">Destinatario: {{ $destinatario->name }} {{ $destinatario->surname }}</p>

				@if($objetivo->id_objetivo_dependiente != null)
					<p class="h5 my-3">Nombre del objetivo dependiente: {{ $dependencia->first()->nombre }} </p>
					<p class="h5 my-3">Descripción del objetivo dependiente: {{ $dependencia->first()->descripcion }} </p>
				@endif

				@if($objetivo->completado != null)
					<p class="h5 my-3">Estado: Completado</p>
				@else
					<p class="h5 my-3">Estado: En curso</p>
				@endif

				<p class="h5 my-3">Año: {{ $objetivo->year }}</p>

				<label for="descripcion" class="h4 my-3 text-primary">Descripción del objetivo</p>
					<p name="descripcion" id="descripcion" class="h5 text-dark" >{{ $objetivo->descripcion }}</p>
			@else
				<div class="form-group row h5">
                    <label for="tipo" class="h5 col-md-3 col-form-label">Tipo de objetivo</label>
                    <div class="col-md-4">
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

                <div class="form-group row h5">
                    <label for="nombre" class="col-md-3 col-form-label">Nombre del objetivo</label>
                    <div class="col-md-4">
                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $objetivo->nombre }}" required autocomplete="nombre" autofocus>

                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row h5">
                    <label for="year" class="col-md-3 col-form-label">Año del objetivo</label>
                    <div class="col-md-4">
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

                <div class="form-group row h5">
                    <label for="id_usuario_destino" class="col-md-3 col-form-label">Usuario destino</label>
                    <div class="col-md-4">
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
                <div class="form-group row h5">
                @endif
                    <label for="id_objetivo_dependiente" class="col-md-3 col-form-label">Depende de otro objetivo?</label>

                    <div class="col-md-4">
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

                <label for="descripcion" class="h4 my-3 text-primary">Descripción del objetivo</p>
				<textarea name="descripcion" id="descripcion" rows="5" class="col-md-9 h5">{{ $objetivo->descripcion }}</textarea>
			@endif

			<div class="mt-5">
				<h4 class="text-primary">Comentarios del objetivo</h4>
				@forelse ($estados as $estado)
					@if($estado->trimester_1 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_destino)
						<label for="comentario_origen_T1" class="mt-3 text-dark">Comentarios del creador del objetivo en el trimestre 1</label>
							<textarea id="comentario_origen_T1" name="comentario_origen_T1" rows="5" class="col-md-12">{{ $objetivo->comentario_origen_T1 }}</textarea>

						@if($objetivo->tipo != 'Hito')
							<label for="comentario_destino_T1" class="mt-3 text-dark">Comentarios del destinatario del objetivo en el trimestre 1</label>
							@if(auth()->user()->id == $objetivo->id_usuario_destino)
								<textarea id="comentario_destino_T1" name="comentario_destino_T1"  rows="5" cols="100">{{ $objetivo->comentario_destino_T1 }}</textarea>
							@else
								<p id="comentario_destino_T1" name="comentario_destino_T1" >{{ $objetivo->comentario_destino_T1 }}</p>
							@endif
						@else
							<textarea class="d-none" id="comentario_destino_T1" name="comentario_destino_T1"  rows="5" cols="100">{{ $objetivo->comentario_destino_T1 }}</textarea>
						@endif
					@else
						<div>
							<label for="comentario_origen_T1" class="mt-3 text-dark h5 font-weight-bold">Comentarios del creador del objetivo en el trimestre 1</label>
							<p id="comentario_origen_T1" name="comentario_origen_T1" class="text-dark h5">{{ $objetivo->comentario_origen_T1 }}</p>
							<label for="comentario_destino_T1" class="mt-3 text-dark h5 font-weight-bold">Comentarios del destinatario del objetivo en el trimestre 1</label>
							<p id="comentario_destino_T1" name="comentario_destino_T1" class="text-dark h5">{{ $objetivo->comentario_destino_T1 }}</p>
						</div>
					@endif

					@if($estado->trimester_2 == 'enabled')
						<label for="comentario_origen_T2" class="mt-3 text-dark">Comentarios del creador del objetivo en el trimestre 2</label>
						@if(auth()->user()->id != $objetivo->id_usuario_origen)
							<p id="comentario_origen_T2" name="comentario_origen_T2">{{ $objetivo->comentario_origen_T2 }}</p>
						@else
							<textarea id="comentario_origen_T2" name="comentario_origen_T2" rows="5" cols="100">{{ $objetivo->comentario_origen_T2 }}</textarea>
						@endif

						@if($objetivo->tipo != 'Hito')
							<label for="comentario_destino_T2" class="mt-3 text-dark">Comentarios del destinatario del objetivo en el trimestre 2</label>
							@if(auth()->user()->id != $objetivo->id_usuario_destino)
								<p id="comentario_destino_T2" name="comentario_destino_T2">{{ $objetivo->comentario_destino_T2 }}</p>
							@else
								<textarea id="comentario_destino_T2" name="comentario_destino_T2" rows="5" cols="100">{{ $objetivo->comentario_destino_T2 }}</textarea>
							@endif
						@else
							<textarea class="d-none" id="comentario_destino_T2" name="comentario_destino_T2"  rows="5" cols="100">{{ $objetivo->comentario_destino_T2 }}</textarea>
						@endif
					@else
						<div>
							<label for="comentario_origen_T2" class="mt-3 text-dark">Comentarios del creador del objetivo en el trimestre 2</label>
							<p id="comentario_origen_T2" name="comentario_origen_T2">{{ $objetivo->comentario_origen_T2 }}</p>
							<label for="comentario_origen_T2" class="mt-3 text-dark">Comentarios del destinatario del objetivo en el trimestre 2</label>
							<p id="comentario_destino_T2" name="comentario_destino_T2">{{ $objetivo->comentario_destino_T2 }}</p>
						</div>
					@endif

					@if($estado->trimester_3 == 'enabled')
						<label for="comentario_origen_T3" class="mt-3 text-dark">Comentarios del creador del objetivo en el trimestre 3</label>
						@if(auth()->user()->id != $objetivo->id_usuario_origen)
							<p id="comentario_origen_T3" name="comentario_origen_T3">{{ $objetivo->comentario_origen_T3 }}</p>
						@else
							<textarea id="comentario_origen_T3" name="comentario_origen_T3" rows="5" cols="100">{{ $objetivo->comentario_origen_T3 }}</textarea>
						@endif

						@if($objetivo->tipo != 'Hito')
							<label for="comentario_destino_T3" class="mt-3 text-dark">Comentarios del destinatario del objetivo en el trimestre 3</label>
							@if(auth()->user()->id != $objetivo->id_usuario_destino)
								<p id="comentario_destino_T3" name="comentario_destino_T3">{{ $objetivo->comentario_destino_T3 }}</p>
							@else
								<textarea id="comentario_destino_T3" name="comentario_destino_T3" rows="5" cols="100">{{ $objetivo->comentario_destino_T3 }}</textarea>
							@endif
						@else
							<textarea class="d-none" id="comentario_destino_T3" name="comentario_destino_T3"  rows="5" cols="100">{{ $objetivo->comentario_destino_T3 }}</textarea>
						@endif
					@else
						<div>
							<label for="comentario_origen_T3" class="mt-3 text-dark">Comentarios del creador del objetivo en el trimestre 3</label>
							<p id="comentario_origen_T3" name="comentario_origen_T3">{{ $objetivo->comentario_origen_T3 }}</p>
							<label for="comentario_destino_T3" class="mt-3 text-dark">Comentarios del destinatario del objetivo en el trimestre 3</label>
							<p id="comentario_destino_T3" name="comentario_destino_T3">{{ $objetivo->comentario_destino_T3 }}</p>
						</div>
					@endif

					@if($estado->trimester_4 == 'enabled')
						<label for="comentario_origen_T4" class="mt-3 text-dark">Comentarios del creador del objetivo en el trimestre 4</label>
						@if(auth()->user()->id != $objetivo->id_usuario_origen)
							<p id="comentario_origen_T4" name="comentario_origen_T4">{{ $objetivo->comentario_origen_T4 }}</p>
						@else
							<textarea id="comentario_origen_T4" name="comentario_origen_T4" rows="5" cols="100">{{ $objetivo->comentario_origen_T4 }}</textarea>
						@endif

						@if($objetivo->tipo != 'Hito')
							<label for="comentario_destino_T4" class="mt-3 text-dark">Comentarios del destinatario del objetivo en el trimestre 4</label>
							@if(auth()->user()->id != $objetivo->id_usuario_destino)
								<p id="comentario_destino_T4" name="comentario_destino_T4">{{ $objetivo->comentario_destino_T4 }}</p>
							@else
								<textarea id="comentario_destino_T4" name="comentario_destino_T4" rows="5" cols="100">{{ $objetivo->comentario_destino_T4 }}</textarea>
							@endif
						@else
							<textarea class="d-none" id="comentario_destino_T4" name="comentario_destino_T4"  rows="5" cols="100">{{ $objetivo->comentario_destino_T4 }}</textarea>
						@endif
					@else
						<div>
							<label for="comentario_origen_T4" class="mt-3 text-dark">Comentarios del creador del objetivo en el trimestre 4</label>
							<p id="comentario_origen_T4" name="comentario_origen_T4">{{ $objetivo->comentario_origen_T4 }}</p>
							<label for="comentario_destino_T4" class="mt-3 text-dark">Comentarios del destinatario del objetivo en el trimestre 4</label>
							<p id="comentario_destino_T4" name="comentario_destino_T4">{{ $objetivo->comentario_destino_T4 }}</p>
						</div>
					@endif

					@if($estado->conclusions == 'enabled')
						<label for="comentario_origen_conclusiones" class="mt-3 text-dark">Comentarios del creador del objetivo en las conclusiones</label>
						@if(auth()->user()->id != $objetivo->id_usuario_origen)
							<p id="comentario_origen_conclusiones" name="comentario_origen_conclusiones">{{ $objetivo->comentario_origen_conclusiones }}</p>
						@else
							<textarea id="comentario_origen_conclusiones" name="comentario_origen_conclusiones" rows="5" cols="100">{{ $objetivo->comentario_origen_conclusiones }}</textarea>
						@endif

						@if($objetivo->tipo != 'Hito')
							<label for="comentario_destino_conclusiones" class="mt-3 text-dark">Comentarios del destinatario del objetivo en las conclusiones</label>
							@if(auth()->user()->id != $objetivo->id_usuario_destino)
								<p id="comentario_destino_conclusiones" name="comentario_destino_conclusiones">{{ $objetivo->comentario_destino_conclusiones }}</p>
							@else
								<textarea id="comentario_destino_conclusiones" name="comentario_destino_conclusiones" rows="5" cols="100">{{ $objetivo->comentario_destino_conclusiones }}</textarea>
							@endif
						@else
							<textarea class="d-none" id="comentario_destino_conclusiones" name="comentario_destino_conclusiones"  rows="5" cols="100">{{ $objetivo->comentario_destino_conclusiones }}</textarea>
						@endif
					@else
						<div>
							<label for="comentario_origen_conclusiones" class="mt-3 text-dark">Comentarios del creador del objetivo en las conclusiones</label>
							<p id="comentario_origen_conclusiones" name="comentario_origen_conclusiones">{{ $objetivo->comentario_origen_conclusiones }}</p>
							<label for="comentario_origen_conclusiones" class="mt-3 text-dark">Comentarios del destinatario del objetivo en las conclusiones</label>
							<p id="comentario_destino_conclusiones" name="comentario_destino_conclusiones">{{ $objetivo->comentario_destino_conclusiones }}</p>
						</div>
					@endif

				@empty
					<p>No hay ningún trimestre activado</p>
				@endforelse
			</div>

			<div class="form-group row mb-0 mt-3">
				@if($objetivo->completado == null)
					@if(auth()->user()->id == $objetivo->id_usuario_origen || auth()->user()->id == $objetivo->id_usuario_destino)
	                <div class="col-md-6">
	                    <button type="submit" class="font-weight-bold btn btn-primary">Guardar cambios</button>
	                </div>
	                @endif
                @endif
               {{-- @if(auth()->user()->id == $objetivo->id_usuario_origen)
                <div class="ml-auto btn-group">
                	<form method="POST" action="{{ route('completarObjetivo', $objetivo) }}">
						@csrf
						<button class="btn btn-success rounded mr-3 font-weight-bold" onclick="return confirm('Estás seguro de que quieres marcar el objetivo como completado?')" href="">Marcar objetivo como compleado</button>
					</form>

					<form method="POST" action="{{ route('eliminarObjetivo', $objetivo) }}">
						@csrf @method('DELETE')
						<button class="btn btn-danger font-weight-bold" onclick="return confirm('Estás seguro de que quieres eliminar el objetivo?')" href="">Eliminar objetivo</button>
					</form>
                </div>
                @endif--}}
            </div>
		</form>
		<div class="d-flex justify-content-between align-items-center mt-5">
            <a class="btn btn-outline-secondary btn-arrow-left font-weight-bold ml-auto" href="{{ route('home') }}">< Volver</a>
		</div>
	</div>
</div>
@endsection
