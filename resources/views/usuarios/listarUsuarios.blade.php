@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<div class="d-flex justify-content-between align-items-center">
				<h2 class="text-primary">Lista de usuarios</h2>
 				<a class="btn btn-primary btn-arrow-left" href="{{ URL::previous() }}">< Volver</a>
			</div>
			<hr>
			<div class="d-flex justify-content-between align-items-center my-4">
				<h4>Usuarios registrados</h4>
 				<a class="btn btn-primary" href="{{ route('usuarios.nuevoUsuario')}}">Crear usuario</a>
			</div>
 			<table class="table mb-3 shadow-sm bg-transparent h5">
 				<tr>
 					<th>Nombre</th>
 					<th>Correo electrónico</th>
 					<th>Rol</th>
 					<th>Acciones</th>
 				</tr>
				@forelse ($usuarios as $usuario)
				    <tr class="border-0 m-5 shadow-sm bg-transparent h5">
				    	<td class="font-weight-bold">{{ $usuario->name }} {{ $usuario->surname }}</td>
						<td class="text-black-50">{{ $usuario->email }}</td>
						<td class="text-black-50">{{ $usuario->role }}</td>
						<td><a class="text-dark" href="{{route('usuarios.mostrarUsuario', $usuario->id)}}">Ver usuario</a></td>
					</tr>
				@empty
					<p>No hay usuarios</p>
				@endforelse
			</table>
		</div>
    </div>
</div>
@endsection