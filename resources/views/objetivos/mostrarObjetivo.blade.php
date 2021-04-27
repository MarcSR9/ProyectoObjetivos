@extends('layouts.app')

@section('content')
<div class="container">
	<div class="bg-white p-5 shadow rounded">
		<div class="d-flex justify-content-between align-items-center">
            <h3 class="text-primary mb-4">{{ $objetivo->nombre }}</h3>
            <a class="btn btn-outline-secondary btn-arrow-left" href="{{ route('home') }}">< Volver</a>
        </div>

		<p class="font-weight-bold h5 my-3">Tipo: {{ $objetivo->tipo }}</p>

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

		<form method="POST" action="{{ route('actualizarObjetivo', $objetivo) }}">
			@csrf
			<label for="descripcion" class="h5 my-3 text-primary">Descripción del objetivo</p>
			@if(auth()->user()->id != $objetivo->id_usuario_origen)
				<textarea name="descripcion" id="descripcion" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->descripcion }}</textarea>
			@else
				<textarea name="descripcion" id="descripcion" rows="5" cols="100">{{ $objetivo->descripcion }}</textarea>
			@endif

			<div class="mt-5">
				<h4 class="text-primary">Comentarios del objetivo</h4>
				@forelse ($estados as $estado)
					@if($estado->trimester_1 == 'enabled')
						<label for="comentario_origen_T1" class="mt-3 text-dark">Comentarios del creador del objetivo en el trimestre 1</label>
						@if(auth()->user()->id != $objetivo->id_usuario_origen)
							<textarea id="comentario_origen_T1" name="comentario_origen_T1" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_origen_T1 }}</textarea>
						@else
							<textarea id="comentario_origen_T1" name="comentario_origen_T1" rows="5" cols="100">{{ $objetivo->comentario_origen_T1 }}</textarea>
						@endif

						@if($objetivo->tipo != 'Hito')
							<label for="comentario_destino_T1" class="mt-3 text-dark">Comentarios del destinatario del objetivo en el trimestre 1</label>
							@if(auth()->user()->id != $objetivo->id_usuario_destino)
								<textarea id="comentario_destino_T1" name="comentario_destino_T1"  rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_destino_T1 }}</textarea>
							@else
								<textarea id="comentario_destino_T1" name="comentario_destino_T1"  rows="5" cols="100">{{ $objetivo->comentario_destino_T1 }}</textarea>
							@endif
						@else
							<textarea class="d-none" id="comentario_destino_T1" name="comentario_destino_T1"  rows="5" cols="100">{{ $objetivo->comentario_destino_T1 }}</textarea>
						@endif
					@else
						<div>
							<label for="comentario_origen_T1" class="mt-3 text-dark">Comentarios del creador del objetivo en el trimestre 1</label>
							<textarea id="comentario_origen_T1" name="comentario_origen_T1" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_origen_T1 }}</textarea>
							<label for="comentario_destino_T1" class="mt-3 text-dark">Comentarios del destinatario del objetivo en el trimestre 1</label>
							<textarea id="comentario_destino_T1" name="comentario_destino_T1" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_destino_T1 }}</textarea>
						</div>
					@endif

					@if($estado->trimester_2 == 'enabled')
						<label for="comentario_origen_T2" class="mt-3 text-dark">Comentarios del creador del objetivo en el trimestre 2</label>
						@if(auth()->user()->id != $objetivo->id_usuario_origen)
							<textarea id="comentario_origen_T2" name="comentario_origen_T2" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_origen_T2 }}</textarea>
						@else
							<textarea id="comentario_origen_T2" name="comentario_origen_T2" rows="5" cols="100">{{ $objetivo->comentario_origen_T2 }}</textarea>
						@endif

						@if($objetivo->tipo != 'Hito')
							<label for="comentario_destino_T2" class="mt-3 text-dark">Comentarios del destinatario del objetivo en el trimestre 2</label>
							@if(auth()->user()->id != $objetivo->id_usuario_destino)
								<textarea id="comentario_destino_T2" name="comentario_destino_T2" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_destino_T2 }}</textarea>
							@else
								<textarea id="comentario_destino_T2" name="comentario_destino_T2" rows="5" cols="100">{{ $objetivo->comentario_destino_T2 }}</textarea>
							@endif
						@else
							<textarea class="d-none" id="comentario_destino_T2" name="comentario_destino_T2"  rows="5" cols="100">{{ $objetivo->comentario_destino_T2 }}</textarea>
						@endif
					@else
						<div>
							<label for="comentario_origen_T2" class="mt-3 text-dark">Comentarios del creador del objetivo en el trimestre 2</label>
							<textarea id="comentario_origen_T2" name="comentario_origen_T2" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_origen_T2 }}</textarea>
							<label for="comentario_origen_T2" class="mt-3 text-dark">Comentarios del destinatario del objetivo en el trimestre 2</label>
							<textarea id="comentario_destino_T2" name="comentario_destino_T2" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_destino_T2 }}</textarea>
						</div>
					@endif

					@if($estado->trimester_3 == 'enabled')
						<label for="comentario_origen_T3" class="mt-3 text-dark">Comentarios del creador del objetivo en el trimestre 3</label>
						@if(auth()->user()->id != $objetivo->id_usuario_origen)
							<textarea id="comentario_origen_T3" name="comentario_origen_T3" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_origen_T3 }}</textarea>
						@else
							<textarea id="comentario_origen_T3" name="comentario_origen_T3" rows="5" cols="100">{{ $objetivo->comentario_origen_T3 }}</textarea>
						@endif

						@if($objetivo->tipo != 'Hito')
							<label for="comentario_destino_T3" class="mt-3 text-dark">Comentarios del destinatario del objetivo en el trimestre 3</label>
							@if(auth()->user()->id != $objetivo->id_usuario_destino)
								<textarea id="comentario_destino_T3" name="comentario_destino_T3" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_destino_T3 }}</textarea>
							@else
								<textarea id="comentario_destino_T3" name="comentario_destino_T3" rows="5" cols="100">{{ $objetivo->comentario_destino_T3 }}</textarea>
							@endif
						@else
							<textarea class="d-none" id="comentario_destino_T3" name="comentario_destino_T3"  rows="5" cols="100">{{ $objetivo->comentario_destino_T3 }}</textarea>
						@endif
					@else
						<div>
							<label for="comentario_origen_T3" class="mt-3 text-dark">Comentarios del creador del objetivo en el trimestre 3</label>
							<textarea id="comentario_origen_T3" name="comentario_origen_T3" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_origen_T3 }}</textarea>
							<label for="comentario_destino_T3" class="mt-3 text-dark">Comentarios del destinatario del objetivo en el trimestre 3</label>
							<textarea id="comentario_destino_T3" name="comentario_destino_T3" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_destino_T3 }}</textarea>
						</div>
					@endif

					@if($estado->trimester_4 == 'enabled')
						<label for="comentario_origen_T4" class="mt-3 text-dark">Comentarios del creador del objetivo en el trimestre 4</label>
						@if(auth()->user()->id != $objetivo->id_usuario_origen)
							<textarea id="comentario_origen_T4" name="comentario_origen_T4" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_origen_T4 }}</textarea>
						@else
							<textarea id="comentario_origen_T4" name="comentario_origen_T4" rows="5" cols="100">{{ $objetivo->comentario_origen_T4 }}</textarea>
						@endif

						@if($objetivo->tipo != 'Hito')
							<label for="comentario_destino_T4" class="mt-3 text-dark">Comentarios del destinatario del objetivo en el trimestre 4</label>
							@if(auth()->user()->id != $objetivo->id_usuario_destino)
								<textarea id="comentario_destino_T4" name="comentario_destino_T4" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_destino_T4 }}</textarea>
							@else
								<textarea id="comentario_destino_T4" name="comentario_destino_T4" rows="5" cols="100">{{ $objetivo->comentario_destino_T4 }}</textarea>
							@endif
						@else
							<textarea class="d-none" id="comentario_destino_T4" name="comentario_destino_T4"  rows="5" cols="100">{{ $objetivo->comentario_destino_T4 }}</textarea>
						@endif
					@else
						<div>
							<label for="comentario_origen_T4" class="mt-3 text-dark">Comentarios del creador del objetivo en el trimestre 4</label>
							<textarea id="comentario_origen_T4" name="comentario_origen_T4" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_origen_T4 }}</textarea>
							<label for="comentario_destino_T4" class="mt-3 text-dark">Comentarios del destinatario del objetivo en el trimestre 4</label>
							<textarea id="comentario_destino_T4" name="comentario_destino_T4" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_destino_T4 }}</textarea>
						</div>
					@endif

					@if($estado->conclusions == 'enabled')
						<label for="comentario_origen_conclusiones" class="mt-3 text-dark">Comentarios del creador del objetivo en las conclusiones</label>
						@if(auth()->user()->id != $objetivo->id_usuario_origen)
							<textarea id="comentario_origen_conclusiones" name="comentario_origen_conclusiones" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_origen_conclusiones }}</textarea>
						@else
							<textarea id="comentario_origen_conclusiones" name="comentario_origen_conclusiones" rows="5" cols="100">{{ $objetivo->comentario_origen_conclusiones }}</textarea>
						@endif

						@if($objetivo->tipo != 'Hito')
							<label for="comentario_destino_conclusiones" class="mt-3 text-dark">Comentarios del destinatario del objetivo en las conclusiones</label>
							@if(auth()->user()->id != $objetivo->id_usuario_destino)
								<textarea id="comentario_destino_conclusiones" name="comentario_destino_conclusiones" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_destino_conclusiones }}</textarea>
							@else
								<textarea id="comentario_destino_conclusiones" name="comentario_destino_conclusiones" rows="5" cols="100">{{ $objetivo->comentario_destino_conclusiones }}</textarea>
							@endif
						@else
							<textarea class="d-none" id="comentario_destino_conclusiones" name="comentario_destino_conclusiones"  rows="5" cols="100">{{ $objetivo->comentario_destino_conclusiones }}</textarea>
						@endif
					@else
						<div>
							<label for="comentario_origen_conclusiones" class="mt-3 text-dark">Comentarios del creador del objetivo en las conclusiones</label>
							<textarea id="comentario_origen_conclusiones" name="comentario_origen_conclusiones" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_origen_conclusiones }}</textarea>
							<label for="comentario_origen_conclusiones" class="mt-3 text-dark">Comentarios del destinatario del objetivo en las conclusiones</label>
							<textarea id="comentario_destino_conclusiones" name="comentario_destino_conclusiones" rows="5" cols="100" readonly="readonly" class="table-secondary text-dark border border-secondary">{{ $objetivo->comentario_destino_conclusiones }}</textarea>
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
			<a class="btn btn-primary ml-auto" href="{{ URL::previous() }}">< Volver</a>
		</div>
	</div>
</div>
@endsection