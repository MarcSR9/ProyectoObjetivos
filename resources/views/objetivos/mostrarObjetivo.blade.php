@extends('layouts.app')

@section('content')
<div class="container col-md-10">
	<div class="bg-white p-5 shadow rounded">
		<div class="d-flex justify-content-between align-items-center">
            <h3 class="text-primary mb-4">{{ $objetivo->nombre }}</h3>
            <a class="btn btn-outline-secondary btn-arrow-left font-weight-bold" href="{{ route('home') }}">< Volver</a>
        </div>

		<form method="POST" class="col-md-11" action="{{ route('actualizarObjetivo', $objetivo) }}">
			@csrf

			@if(auth()->user()->id != $objetivo->id_usuario_origen)
				<p class="h5 my-3">Tipo de objetivo: {{ $objetivo->tipo }}</p>
				<p class="h5 my-3">Creado por: {{ $creador->name }} {{ $creador->surname }}</p>
				<p class="h5 my-3">Destinatario: {{ $destinatario->name }} {{ $destinatario->surname }}</p>

				{{--@if($objetivo->id_objetivo_dependiente != null)
					<p class="h5 my-3">Nombre del objetivo dependiente: {{ $dependencia->first()->nombre }} </p>
					<p class="h5 my-3">Descripción del objetivo dependiente: {{ $dependencia->first()->descripcion }} </p>
				@endif--}}

				@if($objetivo->completado != null)
					<p class="h5 my-3">Estado: Completado</p>
				@else
					<p class="h5 my-3">Estado: En curso</p>
				@endif

				<p class="h5 my-3">Año: {{ $objetivo->year }}</p>

                @if($objetivo->id_objetivo_dependiente != null)
                <p for="id_objetivo_dependiente" class="h5">Objetivo dependiente: {{ $dependencia->id }} - {{ $dependencia->nombre }} ({{ $dependencia->tipo }})</p>
                @endif

				<label for="descripcion" class="h4 my-3 text-primary">Descripción del objetivo</p>
					<p name="descripcion" id="descripcion" class="h5 text-dark" >{{ $objetivo->descripcion }}</p>

			@else
				<div class="form-group row h5">
                    <label for="tipo" class="h5 col-md-3 col-form-label">Tipo de objetivo</label>
                    <div class="col-md-4">
                        <label class="h5 col-form-label">{{ $objetivo->tipo}}</label>

                        {{--<select id="tipo" name="tipo" type="text" class="form-control" required>
                        	<option disabled selected value> Selecciona el tipo de objetivo</option>
                            @if(auth()->user()->crea_objetivo_general == 'true')
                                <option value="General">Objetivo General</option>
                            @endif
                            @if(auth()->user()->crea_objetivo_secundario == 'true')
                                <option value="Secundario">Objetivo Secundario</option>
                            @endif
                            @if(auth()->user()->crea_objetivo_hito == 'true')
                                <option value="Hito">Hito</option>
                            @endif
                        </select>--}}

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
                            	@if($objetivo->id_usuario_destino == $usuario->id)
                                <option selected value="{{ $usuario->id }}">{{ $usuario->email }}</option>
                                @else
                                <option value="{{ $usuario->id }}">{{ $usuario->email }}</option>
                                @endif
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
                @if($objetivo->id_objetivo_dependiente != null)
                <label for="id_objetivo_dependiente" class="col-md-9 col-form-label">{{ $dependencia->id }} - {{ $dependencia->nombre }} ({{ $dependencia->tipo }})</label>
                @else
                <label for="id_objetivo_dependiente" class="col-md-3 col-form-label">No depende de ningún objetivo</label>
                @endif
                    {{--
                    <div class="col-md-4">
                         <select id="id_objetivo_dependiente" name="id_objetivo_dependiente" type="text" class="form-control" required>
                            <option value="null" selected="selected">No depende de ningún objetivo</option>
                            @forelse ($objetivos as $objetivoDependiente)
                                <option value="{{ $objetivoDependiente->id }}">{{ $objetivoDependiente->id }} / {{ $objetivoDependiente->nombre }} ({{ $objetivoDependiente->tipo }})</option>
                            @empty
                                <p>No hay objetivos</p>
                            @endforelse
                        </select>

                        @error('id_objetivo_dependiente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>--}}
                </div>

                <label for="descripcion" class="h4 my-3 text-primary">Descripción del objetivo</p>
				<p name="descripcion" id="descripcion" rows="5" class="col-md-9 text-dark h5">{{ $objetivo->descripcion }}</p>
			@endif

			<div class="mt-5">
				<h4 class="text-primary">Comentarios del objetivo</h4>
				@if($objetivo->tipo == 'Hito')
					@foreach ($estados as $estado)
						<div class="row my-4">
							<div class="col-md-12">
								<label for="comentario_origen_T1" class="font-weight-bolder col-md-12 text-mt-3 text-dark">Comentarios del creador del objetivo {{$objetivo->tipo}} en el trimestre 1</label>
								@if($estado->trimester_1 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_T1" name="comentario_origen_T1" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_T1 }}</textarea>
								@else
									<p class="text-justify text-dark h5" id="comentario_origen_T1" name="comentario_origen_T1">{{ $objetivo->comentario_origen_T1 }}</p>
								@endif
							</div>
						</div>

						<div class="row my-4">
							<div class="col-md-12">
								<label for="comentario_origen_T2" class="font-weight-bolder col-md-12 mt-3 text-dark">Comentarios del creador del objetivo {{$objetivo->tipo}} en el trimestre 2</label>
								@if($estado->trimester_2 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_T2" name="comentario_origen_T2" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_T2 }}</textarea>
								@else
									<p class="text-justify text-dark h5" id="comentario_origen_T2" name="comentario_origen_T2">{{ $objetivo->comentario_origen_T2 }}</p>
								@endif
							</div>
						</div>

						<div class="row my-4">
							<div class="col-md-12">
								<label for="comentario_origen_T3" class="font-weight-bolder col-md-12 mt-3 text-dark">Comentarios del creador del objetivo {{$objetivo->tipo}} en el trimestre 3</label>
								@if($estado->trimester_3 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_T3" name="comentario_origen_T3" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_T3 }}</textarea>
								@else
									<p class="text-justify text-dark h5" id="comentario_origen_T3" name="comentario_origen_T3">{{ $objetivo->comentario_origen_T3 }}</p>
								@endif
							</div>
						</div>

						<div class="row my-4">
							<div class="col-md-12">
								<label for="comentario_origen_T4" class="font-weight-bolder col-md-12 mt-3 text-dark">Comentarios del creador del objetivo {{$objetivo->tipo}} en el trimestre 4</label>
								@if($estado->trimester_4 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_T4" name="comentario_origen_T4" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_T4 }}</textarea>
								@else
									<p class="text-justify text-dark h5" id="comentario_origen_T4" name="comentario_origen_T4">{{ $objetivo->comentario_origen_T4 }}</p>
								@endif
							</div>
						</div>

						<div class="row my-4">
							<div class="col-md-12">
								<label for="comentario_origen_conclusiones" class="font-weight-bolder col-md-12 mt-3 text-dark">Comentarios del creador del objetivo {{$objetivo->tipo}} en las conclusiones</label>
								@if($estado->conclusions == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_conclusiones" name="comentario_origen_conclusiones" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_conclusiones }}</textarea>
								@else
									<p class="text-justify text-dark h5" id="comentario_origen_conclusiones" name="comentario_origen_conclusiones">{{ $objetivo->comentario_origen_conclusiones }}</p>
								@endif
							</div>
						</div>
					@endforeach
				@else
					@foreach ($estados as $estado)
						<div class="row my-4">
							<div class="col-md-6">
								<label for="comentario_origen_T1" class="font-weight-bolder col-md-12 mt-3 text-dark">Creador del objetivo {{$objetivo->tipo}} en el trimestre 1</label>
								@if($estado->trimester_1 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_T1" name="comentario_origen_T1" rows="5" class="ml-3 col-md-11 h5">{{ $objetivo->comentario_origen_T1 }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_origen_T1" name="comentario_origen_T1">{{ $objetivo->comentario_origen_T1 }}</p>
								@endif
							</div>

							<div class="col-md-6">
								<label for="comentario_destino_T1" class="font-weight-bolder col-md-12 mt-3 text-dark">Destinatario del objetivo {{$objetivo->tipo}} en el trimestre 1</label>
								@if($estado->trimester_1 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_destino)
									<textarea id="comentario_destino_T1" name="comentario_destino_T1" rows="5" class="ml-3 col-md-12">{{ $objetivo->comentario_destino_T1 }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_destino_T1" name="comentario_destino_T1">{{ $objetivo->comentario_destino_T1 }}</p>
								@endif
							</div>
						</div>

						<div class="row my-4">
							<div class="col-md-6">
								<label for="comentario_origen_T2" class="font-weight-bolder col-md-12 mt-3 text-dark">Creador del objetivo {{$objetivo->tipo}} en el trimestre 2</label>
								@if($estado->trimester_2 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_T2" name="comentario_origen_T2" rows="5" class="ml-3 col-md-11 h5">{{ $objetivo->comentario_origen_T2 }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_origen_T2" name="comentario_origen_T2">{{ $objetivo->comentario_origen_T2 }}</p>
								@endif
							</div>

							<div class="col-md-6">
								<label for="comentario_destino_T2" class="font-weight-bolder col-md-12 mt-3 text-dark">Destinatario del objetivo {{$objetivo->tipo}} en el trimestre 2</label>
								@if($estado->trimester_2 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_destino)
									<textarea id="comentario_destino_T2" name="comentario_destino_T2" rows="5" class="ml-3 col-md-12">{{ $objetivo->comentario_destino_T2 }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_destino_T2" name="comentario_destino_T2">{{ $objetivo->comentario_destino_T2 }}</p>
								@endif
							</div>
						</div>

						<div class="row my-4">
							<div class="col-md-6">
								<label for="comentario_origen_T3" class="font-weight-bolder col-md-12 mt-3 text-dark">Creador del objetivo {{$objetivo->tipo}} en el trimestre 3</label>
								@if($estado->trimester_3 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_T3" name="comentario_origen_T3" rows="5" class="ml-3 col-md-11 h5">{{ $objetivo->comentario_origen_T3 }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_origen_T3" name="comentario_origen_T3">{{ $objetivo->comentario_origen_T3 }}</p>
								@endif
							</div>

							<div class="col-md-6">
								<label for="comentario_destino_T3" class="font-weight-bolder col-md-12 mt-3 text-dark">Destinatario del objetivo {{$objetivo->tipo}} en el trimestre 3</label>
								@if($estado->trimester_3 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_destino)
									<textarea id="comentario_destino_T3" name="comentario_destino_T3" rows="5" class="ml-3 col-md-12">{{ $objetivo->comentario_destino_T3 }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_destino_T3" name="comentario_destino_T3">{{ $objetivo->comentario_destino_T3 }}</p>
								@endif
							</div>
						</div>

						<div class="row my-4">
							<div class="col-md-6">
								<label for="comentario_origen_T4" class="font-weight-bolder col-md-12 mt-3 text-dark">Creador del objetivo {{$objetivo->tipo}} en el trimestre 4</label>
								@if($estado->trimester_4 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_T4" name="comentario_origen_T4" rows="5" class="ml-3 col-md-11 h5">{{ $objetivo->comentario_origen_T4 }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_origen_T4" name="comentario_origen_T4">{{ $objetivo->comentario_origen_T4 }}</p>
								@endif
							</div>

							<div class="col-md-6">
								<label for="comentario_destino_T4" class="font-weight-bolder col-md-12 mt-3 text-dark">Destinatario del objetivo {{$objetivo->tipo}} en el trimestre 4</label>
								@if($estado->trimester_4 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_destino)
									<textarea id="comentario_destino_T4" name="comentario_destino_T4" rows="5" class="ml-3 col-md-12">{{ $objetivo->comentario_destino_T4 }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_destino_T4" name="comentario_destino_T4">{{ $objetivo->comentario_destino_T4 }}</p>
								@endif
							</div>
						</div>

						<div class="row my-4">
							<div class="col-md-6">
								<label for="comentario_origen_conclusiones" class="font-weight-bolder col-md-12 mt-3 text-dark">Creador del objetivo {{$objetivo->tipo}} en las conclusiones</label>
								@if($estado->conclusions == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_conclusiones" name="comentario_origen_conclusiones" rows="5" class="ml-3 col-md-11 h5">{{ $objetivo->comentario_origen_conclusiones }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_origen_conclusiones" name="comentario_origen_conclusiones">{{ $objetivo->comentario_origen_conclusiones }}</p>
								@endif
							</div>

							<div class="col-md-6">
								<label for="comentario_destino_conclusiones" class="font-weight-bolder col-md-12 mt-3 text-dark">Destinatario del objetivo {{$objetivo->tipo}} en las conclusiones</label>
								@if($estado->conclusions == 'enabled' && auth()->user()->id == $objetivo->id_usuario_destino)
									<textarea id="comentario_destino_conclusiones" name="comentario_destino_conclusiones" rows="5" class="ml-3 col-md-12">{{ $objetivo->comentario_destino_conclusiones }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_destino_conclusiones" name="comentario_destino_conclusiones">{{ $objetivo->comentario_destino_conclusiones }}</p>
								@endif
							</div>
						</div>
					@endforeach
				@endif

			</div>

			<div class="form-group row mb-0 mt-3">
				@if($objetivo->completado == null)
					@if(auth()->user()->id == $objetivo->id_usuario_origen || auth()->user()->id == $objetivo->id_usuario_destino)
	                <div class="col-md-6">
	                    <button type="submit" class="font-weight-bold btn btn-primary">Guardar cambios</button>
	                </div>
	                @endif
                @endif
            </div>
		</form>
	</div>
</div>
@endsection
