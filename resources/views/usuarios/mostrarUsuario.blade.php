@extends('layouts.app')

@section('content')
<div class="container">
	<div class="bg-white p-5 shadow rounded">
		<h1 class="display-5">{{ $usuario->name }} {{ $usuario->surname }}</h1>
		<p class="text-secondary">{{ $usuario->role }}</p>
		<p class="text-secondary">{{ $usuario->email }}</p>
		<p class="text-secondary">{{ $usuario->id }}</p>
		<p class="text-black-50">{{ $usuario->created_at->diffForHumans() }}</p>
	</div>
	<button><a href="{{ route('usuarios.editar', $usuario) }}">Editar usuario</a></button>
	<form method="POST" action={{ route('usuarios.eliminarUsuario', $usuario) }}>
		@csrf @method('DELETE')
		<button>Eliminar usuario</button>
	</form>
</div>
@endsection