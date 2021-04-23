@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
    	<div class="d-flex justify-content-between align-items-center">
			<h3 class="display-5 text-primary">Estado de la aplicación</h3>
			<a class="btn btn-outline-secondary btn-arrow-left" href="{{ route('home') }}">< Volver</a>
		</div>
		<hr>
		<a class="btn btn-primary" href="{{ route('usuarios.lista') }}">Administración de usuarios</a>
		<hr>
		<div class="list-group col-md-12">
			<ul class="list-group">
				@foreach($estados as $estado)

			    <li class="list-group-item border-0 mb-3 shadow-sm bg-transparent d-flex justify-content-between">
					<span class="h5 font-weight-bold align-items-left">Trimestre 1</span>
					@if($estado->trimester_1 == 'enabled')
                    	<span class="h5 text-black-50 align-items-center">Estado: Activado</span>
                        <span><a class="btn font-weight-bold rounded" style="background-color: #b3b3b3" href="#" onclick="document.getElementById('desactivarT1').submit()">Desactivar</a></span>
						<form class="d-none" id="desactivarT1" method="POST" action="{{ route('desactivarTrimestre1') }}">
							@csrf
						</form>
                    @else
                    	<span class="h5 text-black-50 align-items-center">Estado: Desactivado</span>
                        <span><a class="btn btn-success font-weight-bold rounded" href="#" onclick="document.getElementById('activarT1').submit()">Activar</a></span>
						<form class="d-none" id="activarT1" method="POST" action="{{ route('activarTrimestre1') }}">
							@csrf
						</form>
                    @endif
				</li>

				<li class="list-group-item border-0 mb-3 shadow-sm bg-transparent d-flex justify-content-between">
					<span class="h5 font-weight-bold align-items-left">Trimestre 2</span>
					@if($estado->trimester_2 == 'enabled')
                    	<span class="h5 text-black-50 align-items-center">Estado: Activado</span>
                        <span><a class="btn font-weight-bold rounded" style="background-color: #b3b3b3" href="#" onclick="document.getElementById('desactivarT2').submit()">Desactivar</a></span>
						<form class="d-none" id="desactivarT2" method="POST" action="{{ route('desactivarTrimestre2') }}">
							@csrf
						</form>
                    @else
                    	<span class="h5 text-black-50 align-items-center">Estado: Desactivado</span>
                        <span><a class="btn btn-success font-weight-bold rounded" href="#" onclick="document.getElementById('activarT2').submit()">Activar</a></span>
						<form class="d-none" id="activarT2" method="POST" action="{{ route('activarTrimestre2') }}">
							@csrf
						</form>
                    @endif
				</li>

				<li class="list-group-item border-0 mb-3 shadow-sm bg-transparent d-flex justify-content-between">
					<span class="h5 font-weight-bold align-items-left">Trimestre 3</span>
					@if($estado->trimester_3 == 'enabled')
                    	<span class="h5 text-black-50 align-items-center">Estado: Activado</span>
                        <span><a class="btn font-weight-bold rounded" style="background-color: #b3b3b3" href="#" onclick="document.getElementById('desactivarT3').submit()">Desactivar</a></span>
						<form class="d-none" id="desactivarT3" method="POST" action="{{ route('desactivarTrimestre3') }}">
							@csrf
						</form>
                    @else
                    	<span class="h5 text-black-50 align-items-center">Estado: Desactivado</span>
                        <span><a class="btn btn-success font-weight-bold rounded" href="#" onclick="document.getElementById('activarT3').submit()">Activar</a></span>
						<form class="d-none" id="activarT3" method="POST" action="{{ route('activarTrimestre3') }}">
							@csrf
						</form>
                    @endif
				</li>

				<li class="list-group-item border-0 mb-3 shadow-sm bg-transparent d-flex justify-content-between">
					<span class="h5 font-weight-bold align-items-left">Trimestre 4</span>
					@if($estado->trimester_4 == 'enabled')
                    	<span class="h5 text-black-50 align-items-center">Estado: Activado</span>
                        <span><a class="btn font-weight-bold rounded" style="background-color: #b3b3b3" href="#" onclick="document.getElementById('desactivarT4').submit()">Desactivar</a></span>
						<form class="d-none" id="desactivarT4" method="POST" action="{{ route('desactivarTrimestre4') }}">
							@csrf
						</form>
                    @else
                    	<span class="h5 text-black-50 align-items-center">Estado: Desactivado</span>
                        <span><a class="btn btn-success font-weight-bold rounded" href="#" onclick="document.getElementById('activarT4').submit()">Activar</a></span>
						<form class="d-none" id="activarT4" method="POST" action="{{ route('activarTrimestre4') }}">
							@csrf
						</form>
                    @endif
				</li>

				<li class="list-group-item border-0 mb-3 shadow-sm bg-transparent d-flex justify-content-between">
					<span class="h5 font-weight-bold align-items-left">Conclusiones</span>
					@if($estado->conclusions == 'enabled')
                    	<span class="h5 text-black-50 align-items-center">Estado: Activado</span>
                        <span><a class="btn font-weight-bold rounded" style="background-color: #b3b3b3" href="#" onclick="document.getElementById('desactivarConclusiones').submit()">Desactivar</a></span>
						<form class="d-none" id="desactivarConclusiones" method="POST" action="{{ route('desactivarConclusiones') }}">
							@csrf
						</form>
                    @else
                    	<span class="h5 text-black-50 align-items-center">Estado: Desactivado</span>
                        <span><a class="btn btn-success font-weight-bold rounded" href="#" onclick="document.getElementById('activarConclusiones').submit()">Activar</a></span>
						<form class="d-none" id="activarConclusiones" method="POST" action="{{ route('activarConclusiones') }}">
							@csrf
						</form>
                    @endif
				</li>
				@endforeach
			</ul>
		</div>
		<hr>
		<div class="list-group col-md-12 my-4">
			<h4>Errores recientes</h4>
			<table class="table shadow-sm bg-transparent text-dark h5">
				@if(count($errores)>0)
				<tr class="text-primary">
                    <th>Error</th>
                    <th>Autor</th>
                    <th>Fecha</th>
                </tr>
                @endif
				@forelse($errores as $error)
				<tr>
					<td class="font-weight-bold">{{ $error->error }}</td>
					<td>{{ $error->email }}</td>
					<td>{{ $error->created_at }}</td>
				</tr>
				@empty
					<p>No hay errores registrados</p>
				@endforelse
			</table>
			@if(count($errores)>0)
				<a class="btn btn-primary rounded col-md-2" href="{{ route('listaErrores')}}">Mostrar todos los errores</a>
			@endif
		</div>

		<hr>
		<div class="list-group col-md-12 my-4">
			<h4>Acciones recientes</h4>
			<table class="table shadow-sm bg-transparent text-dark h5">
				@if(count($acciones)>0)
				<tr class="text-primary">
                    <th>Acción</th>
                    <th>Autor</th>
                    <th>Fecha</th>
                </tr>
                @endif
				@forelse($acciones as $accion)
					@if($accion->action == 'Intento de acceso a recurso no autorizado')
	                	<tr class="table-danger text-danger">
	                @endif
						<td class="font-weight-bold">{{ $accion->action }}</td>
						<td>{{ $accion->email }}</td>
						<td>{{ $accion->created_at }}</td>
					</tr>
				@empty
					<p>No hay acciones registradas</p>
				@endforelse
			</table>
			@if(count($acciones)>0)
				<a class="btn btn-primary rounded col-md-2" href="{{ route('listaAcciones')}}">Mostrar todas las acciones</a>
			@endif
		</div>
	</div>
</div>

@endsection