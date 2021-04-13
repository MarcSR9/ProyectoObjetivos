@extends('layouts.app')

@section('content')
<div class="container">
	<div class="bg-white p-5 shadow rounded">
		<h3 class="text-primary my-3">{{ $objetivo->nombre }}</h3>
		<p class="font-weight-bold h5 my-3">Tipo: {{ $objetivo->tipo }}</p>
		<p class="h5 my-3">Descripción: {{ $objetivo->descripcion }}</p>
		<p class="h5 my-3">Creado por: {{ $creador }}</p>
		<p class="h5 my-3">Destinatario: {{ $objetivo->id_usuario_destino }}</p>

		@if($objetivo->id_objetivo_dependiente != null)
			<p class="h5 my-3">{{ $objetivo->id_objetivo_dependiente }}</p>
		@endif

		@if($objetivo->completado != null)
			<p class="h5 my-3">Estado: Completado</p>
		@else
			<p class="h5 my-3">Estado: En curso</p>
		@endif

		<p class="h5 my-3">Año: {{ $objetivo->year }}</p>

		<div class="d-flex justify-content-between align-items-center">
			{{--<a class="btn btn-success mr-3" href="{{ route('objetivos.editar', $objetivo) }}">Editar objetivo</a>
			<form method="POST" action={{ route('objetivos.eliminarobjetivo', $objetivo) }}>
				@csrf @method('DELETE')
				<button class="btn btn-danger">Eliminar objetivo</button>
			</form>--}}

			<a class="btn btn-primary ml-auto" href="{{ URL::previous() }}">< Volver</a>
		</div>
	</div>

</div>
@endsection