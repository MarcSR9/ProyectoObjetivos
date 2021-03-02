@extends('layouts.app')

@section('content')
<div class="container">
	<div class="bg-white p-5 shadow rounded">
		<h1 class="display-5">{{ $usuario->name }} {{ $usuario->surname }}</h1>
		<p class="text-secondary">{{ $usuario->role }}</p>
		<p class="text-secondary">{{ $usuario->email }}</p>
		<p class="text-black-50">{{ $usuario->created_at->diffForHumans() }}</p>
	</div>
	{{--<a href="{{ route('', $usuario) }}">Editar usuario</a>--}}
	<form method="POST"{{-- action={{ route('', $usuario) }}--}}>
		@csrf @method('DELETE')
		<button>Eliminar usuario</button>
	</form>
</div>
@endsection