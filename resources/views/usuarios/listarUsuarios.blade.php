@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<div class="d-flex justify-content-between align-items-center">
				<h1 class="display-4 text-primary">Lista de usuarios</h1>
			</div>
			<hr>
			<h2>Usuarios registrados</h2>
 			<a class="btn btn-primary" href="{{ route('usuarios.nuevoUsuario')}}">Crear usuario</a>

 			<ul class="list-group">
				@forelse ($usuarios as $usuario)
				    <li class="list-group-item border-0 mb-3 shadow-sm bg-transparent">
						<a class="text-dark h5 d-flex justify-content-between align-items-center" href="{{route('usuarios.mostrarUsuario', $usuario->id)}}">
							<span class="font-weight-bold">{{ $usuario->name }} {{ $usuario->surname }}</span>
							<span class="text-black-50">{{ $usuario->email }}</span>
							<span class="text-black-50">{{ $usuario->role }}</span>
							<span class="text-black-50">{{ $usuario->id }}</span>
						</a>
					</li>
				@empty
					<p>No hay usuarios</p>
				@endforelse
			</ul>
		</div>
    </div>
</div>
@endsection