@extends('layouts.app')

@section('content')
<div class="container">
	<div class="bg-white p-5 shadow rounded">
		<h1 class="display-5">{{ $usuario->name }} {{ $usuario->surname }}</h1>
		<p class="h5 my-4 text-secondary">{{ $usuario->role }}</p>
		<p class="h5 my-4 text-secondary">{{ $usuario->email }}</p>

		<div class="d-flex justify-content-between align-items-center">
			<a class="btn btn-success mr-3" href="{{ route('usuarios.editar', $usuario) }}">Editar usuario</a>
			<form method="POST" action={{ route('usuarios.eliminarUsuario', $usuario) }}>
				@csrf @method('DELETE')
				<button class="btn btn-danger">Eliminar usuario</button>
			</form>

			<a class="btn btn-outline-secondary ml-auto" href="{{ route('usuarios.lista') }}">< Volver</a>
		</div>
	</div>
</div>
@endsection