@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<div class="d-flex justify-content-between align-items-center">
				<h2 class="text-primary">Lista de usuarios</h2>
 				<a class="btn btn-outline-secondary btn-arrow-left" href="{{ route('administracion') }}">< Volver</a>
			</div>
			<hr>
			<div class="d-flex justify-content-between align-items-center my-4">
				<h4>Usuarios registrados</h4>
 				<a class="btn btn-primary" href="{{ route('usuarios.nuevoUsuario')}}">Crear usuario</a>
			</div>
 			<table class="table mb-3 shadow-sm bg-transparent h5">
 				<tr>
 					<th>ID</th>
 					<th>Nombre</th>
 					<th>Correo electrónico</th>
 					<th>Rol</th>
 					<th>Acciones</th>
 				</tr>
				@forelse ($usuarios->sortBy('id') as $usuario)
				    <tr class="border-0 m-5 shadow-sm bg-transparent h5">
				    	<td class="font-weight-bold">{{ $usuario->id }}</td>
				    	<td class="font-weight-bold">{{ $usuario->name }} {{ $usuario->surname }}</td>
						<td class="text-black-80">{{ $usuario->email }}</td>
						<td class="text-black-80">{{ $usuario->role }}</td>
						<td><a class="btn btn-outline-primary font-weight-bold" href="{{route('usuarios.mostrarUsuario', $usuario->id)}}">Ver usuario</a></td>
					</tr>
				@empty
					<p>No hay usuarios registrados</p>
				@endforelse
			</table>
		</div>
    </div>
</div>
@endsection