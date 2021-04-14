@extends('layouts.app')

@section('content')
<div class="container">

		<div class="bg-white p-5 shadow rounded">
			<h3 class="text-primary my-3">{{ $objetivo->nombre }}</h3>
			<p class="font-weight-bold h5 my-3">Tipo: {{ $objetivo->tipo }}</p>

			<p class="h5 my-3">Creado por: {{ $creador->name }} {{ $creador->surname }}</p>
			<p class="h5 my-3">Destinatario: {{ $destinatario->name }} {{ $destinatario->surname }}</p>

			@if($objetivo->id_objetivo_dependiente != null)
				<p class="h5 my-3">{{ $objetivo->id_objetivo_dependiente }}</p>
			@endif

			@if($objetivo->completado != null)
				<p class="h5 my-3">Estado: Completado</p>
			@else
				<p class="h5 my-3">Estado: En curso</p>
			@endif

			<p class="h5 my-3">Año: {{ $objetivo->year }}</p>

			<form method="POST" action="{{ route('actualizarObjetivo', $objetivo) }}">
				<label for="descripcion" class="h5 my-3">Descripción del objetivo</p>
				@if(auth()->user()->id != $objetivo->id_usuario_origen)
					<textarea id="descripcion" rows="5" cols="100" readonly="readonly">{{ $objetivo->descripcion }}</textarea>
				@else
					<textarea id="descripcion" rows="5" cols="100">{{ $objetivo->descripcion }}</textarea>
				@endif

				<div class="mt-5">
					<h4 class="text-primary">Comentarios del objetivo</h4>
					@forelse ($estados as $estado)
						@if($estado->trimester_1 == 'enabled')
							<label for="comentario_origen_T1" class="mt-3">Comentarios del creador del objetivo en el trimestre 1</label>
							@if(auth()->user()->id != $objetivo->id_usuario_origen)
								<textarea id="comentario_origen_T1" rows="5" cols="100" readonly="readonly">{{ $objetivo->comentario_origen_T1 }}</textarea>
							@else
								<textarea id="comentario_origen_T1" rows="5" cols="100">{{ $objetivo->comentario_origen_T1 }}</textarea>
							@endif

							@if($objetivo->tipo != 'Hito')
								<label for="comentario_destino_T1" class="mt-3">Comentarios del destinatario del objetivo en el trimestre 1</label>
								@if(auth()->user()->id != $objetivo->id_usuario_destino)
									<textarea id="comentario_destino_T1" rows="5" cols="100" readonly="readonly">{{ $objetivo->comentario_destino_T1 }}</textarea>
								@else
									<textarea id="comentario_destino_T1" rows="5" cols="100">{{ $objetivo->comentario_destino_T1 }}</textarea>
								@endif
							@endif
						@endif

						@if($estado->trimester_2 == 'enabled')
							<label for="comentario_origen_T2" class="mt-3">Comentarios del creador del objetivo en el trimestre 2</label>
							@if(auth()->user()->id != $objetivo->id_usuario_origen)
								<textarea id="comentario_origen_T2" rows="5" cols="100" readonly="readonly">{{ $objetivo->comentario_origen_T2 }}</textarea>
							@else
								<textarea id="comentario_origen_T2" rows="5" cols="100">{{ $objetivo->comentario_origen_T2 }}</textarea>
							@endif

							@if($objetivo->tipo != 'Hito')
								<label for="comentario_destino_T2" class="mt-3">Comentarios del destinatario del objetivo en el trimestre 2</label>
								@if(auth()->user()->id != $objetivo->id_usuario_destino)
									<textarea id="comentario_destino_T2" rows="5" cols="100" readonly="readonly">{{ $objetivo->comentario_destino_T2 }}</textarea>
								@else
									<textarea id="comentario_destino_T2" rows="5" cols="100">{{ $objetivo->comentario_destino_T2 }}</textarea>
								@endif
							@endif
						@endif

						@if($estado->trimester_3 == 'enabled')
							<label for="comentario_origen_T3" class="mt-3">Comentarios del creador del objetivo en el trimestre 3</label>
							@if(auth()->user()->id != $objetivo->id_usuario_origen)
								<textarea id="comentario_origen_T3" rows="5" cols="100" readonly="readonly">{{ $objetivo->comentario_origen_T3 }}</textarea>
							@else
								<textarea id="comentario_origen_T3" rows="5" cols="100">{{ $objetivo->comentario_origen_T3 }}</textarea>
							@endif

							@if($objetivo->tipo != 'Hito')
								<label for="comentario_destino_T3" class="mt-3">Comentarios del destinatario del objetivo en el trimestre 3</label>
								@if(auth()->user()->id != $objetivo->id_usuario_destino)
									<textarea id="comentario_destino_T3" rows="5" cols="100" readonly="readonly">{{ $objetivo->comentario_destino_T3 }}</textarea>
								@else
									<textarea id="comentario_destino_T3" rows="5" cols="100">{{ $objetivo->comentario_destino_T3 }}</textarea>
								@endif
							@endif
						@endif

						@if($estado->trimester_4 == 'enabled')
							<label for="comentario_origen_T4" class="mt-3">Comentarios del creador del objetivo en el trimestre 4</label>
							@if(auth()->user()->id != $objetivo->id_usuario_origen)
								<textarea id="comentario_origen_T4" rows="5" cols="100" readonly="readonly">{{ $objetivo->comentario_origen_T4 }}</textarea>
							@else
								<textarea id="comentario_origen_T4" rows="5" cols="100">{{ $objetivo->comentario_origen_T4 }}</textarea>
							@endif

							@if($objetivo->tipo != 'Hito')
								<label for="comentario_destino_T4" class="mt-3">Comentarios del destinatario del objetivo en el trimestre 4</label>
								@if(auth()->user()->id != $objetivo->id_usuario_destino)
									<textarea id="comentario_destino_T4" rows="5" cols="100" readonly="readonly">{{ $objetivo->comentario_destino_T4 }}</textarea>
								@else
									<textarea id="comentario_destino_T4" rows="5" cols="100">{{ $objetivo->comentario_destino_T4 }}</textarea>
								@endif
							@endif
						@endif

						@if($estado->conclusions == 'enabled')
							<label for="comentario_origen_conclusiones" class="mt-3">Comentarios del creador del objetivo en las conclusiones</label>
							@if(auth()->user()->id != $objetivo->id_usuario_origen)
								<textarea id="comentario_origen_conclusiones" rows="5" cols="100" readonly="readonly">{{ $objetivo->comentario_origen_conclusiones }}</textarea>
							@else
								<textarea id="comentario_origen_conclusiones" rows="5" cols="100">{{ $objetivo->comentario_origen_conclusiones }}</textarea>
							@endif

							@if($objetivo->tipo != 'Hito')
								<label for="comentario_destino_conclusiones" class="mt-3">Comentarios del destinatario del objetivo en las conclusiones</label>
								@if(auth()->user()->id != $objetivo->id_usuario_destino)
									<textarea id="comentario_destino_conclusiones" rows="5" cols="100" readonly="readonly">{{ $objetivo->comentario_destino_conclusiones }}</textarea>
								@else
									<textarea id="comentario_destino_conclusiones" rows="5" cols="100">{{ $objetivo->comentario_destino_conclusiones }}</textarea>
								@endif
							@endif
						@endif

					@empty
						<p>No hay ningún trimestre activado</p>
					@endforelse
				</div>

				<div class="form-group row mb-0 mt-3">
                    <div class="col-md-6">
                        <button type="submit" class="font-weight-bold btn btn-success">Guardar cambios</button>
                    </div>
                </div>
			</form>
			<div class="d-flex justify-content-between align-items-center mt-5">
				{{--<a class="btn btn-success mr-3" href="{{ route('completarObjetivo', $objetivo) }}">Editar objetivo</a>
				<form method="POST" action={{ route('objetivos.eliminarobjetivo', $objetivo) }}>
					@csrf @method('DELETE')
					<button class="btn btn-danger">Eliminar objetivo</button>
				</form>--}}

				<a class="btn btn-primary ml-auto" href="{{ URL::previous() }}">< Volver</a>
			</div>
		</div>
</div>
@endsection