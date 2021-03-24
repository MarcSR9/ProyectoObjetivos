@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
    	<div class="d-flex justify-content-between align-items-center">
			<h3 class="display-5 text-primary">Estado de la aplicación</h3>
		</div>
		<hr>
		<div class="list-group col-md-12">
			<h5>Estado de los trimestres</h5>
			<ul class="list-group">
			    <li class="list-group-item border-0 mb-3 shadow-sm bg-transparent d-flex justify-content-between">
					<span class="h5 font-weight-bold align-items-left">Trimestre 1</span>
					<div class="btn-group align-items-right mr-100">
						<a class="btn btn-primary rounded mr-2">Activar trimestre 1</a>
						<a class="btn btn-danger rounded" href="#" {{--onclick="document.getElementById('delete-project').submit()"--}}>Desactivar trimestre 1</a>

						{{--<form class="d-none" id="delete-project" method="POST" action="{{ route('projects.destroy', $project )}}">
							@csrf @method('DELETE')
						</form>
						<form class="d-none" id="delete-project" method="POST" action="{{ route('projects.destroy', $project )}}">
							@csrf @method('DELETE')
						</form>--}}
					</div>
				</li>
				<li class="list-group-item border-0 mb-3 shadow-sm bg-transparent d-flex justify-content-between">
					<span class="h5 font-weight-bold align-items-left">Trimestre 2</span>
					<div class="btn-group align-items-right mr-100">
						<a class="btn btn-primary rounded mr-2">Activar trimestre 2</a>
						<a class="btn btn-danger rounded" href="#" {{--onclick="document.getElementById('delete-project').submit()"--}}>Desactivar trimestre 2</a>

						{{--<form class="d-none" id="delete-project" method="POST" action="{{ route('projects.destroy', $project )}}">
							@csrf @method('DELETE')
						</form>
						<form class="d-none" id="delete-project" method="POST" action="{{ route('projects.destroy', $project )}}">
							@csrf @method('DELETE')
						</form>--}}
					</div>
				</li>
				<li class="list-group-item border-0 mb-3 shadow-sm bg-transparent d-flex justify-content-between">
					<span class="h5 font-weight-bold align-items-left">Trimestre 3</span>
					<div class="btn-group align-items-right mr-100">
						<a class="btn btn-primary rounded mr-2">Activar trimestre 3</a>
						<a class="btn btn-danger rounded" href="#" {{--onclick="document.getElementById('delete-project').submit()"--}}>Desactivar trimestre 3</a>

						{{--<form class="d-none" id="delete-project" method="POST" action="{{ route('projects.destroy', $project )}}">
							@csrf @method('DELETE')
						</form>
						<form class="d-none" id="delete-project" method="POST" action="{{ route('projects.destroy', $project )}}">
							@csrf @method('DELETE')
						</form>--}}
					</div>
				</li>
				<li class="list-group-item border-0 mb-3 shadow-sm bg-transparent d-flex justify-content-between">
					<span class="h5 font-weight-bold align-items-left">Trimestre 4</span>
					<div class="btn-group align-items-right mr-100">
						<a class="btn btn-primary rounded mr-2">Activar trimestre 4</a>
						<a class="btn btn-danger rounded" href="#" {{--onclick="document.getElementById('delete-project').submit()"--}}>Desactivar trimestre 4</a>

						{{--<form class="d-none" id="delete-project" method="POST" action="{{ route('projects.destroy', $project )}}">
							@csrf @method('DELETE')
						</form>
						<form class="d-none" id="delete-project" method="POST" action="{{ route('projects.destroy', $project )}}">
							@csrf @method('DELETE')
						</form>--}}
					</div>
				</li>
				<hr>
				<li class="list-group-item border-0 mb-3 shadow-sm bg-transparent d-flex justify-content-between">
					<span class="h5 font-weight-bold align-items-left">Conclusiones</span>
					<div class="btn-group align-items-right mr-100">
						<a class="btn btn-primary rounded mr-2">Activar Conclusiones</a>
						<a class="btn btn-danger rounded" href="#" {{--onclick="document.getElementById('delete-project').submit()"--}}>Desactivar Conclusiones</a>

						{{--<form class="d-none" id="delete-project" method="POST" action="{{ route('projects.destroy', $project )}}">
							@csrf @method('DELETE')
						</form>
						<form class="d-none" id="delete-project" method="POST" action="{{ route('projects.destroy', $project )}}">
							@csrf @method('DELETE')
						</form>--}}
					</div>
				</li>
			</ul>
		</div>
		<hr>
		<div class="list-group col-md-12 mt-5">
			<h5>Registro de errores</h5>
			<ul class="list-group">
				@forelse($errores as $error)
				<li class="list-group-item border-0 mb-3 shadow-sm bg-transparent text-dark h5 d-flex justify-content-between align-items-center">
					<span class="font-weight-bold">{{ $error->error }}</span>
					<span>{{ $error->email }}</span>
					<span>{{ $error->created_at }}</span>
				</li>
				@empty
					<p>No hay errores registrados</p>
				@endforelse
			</ul>
		</div>
		@if(count($errores)>0)
			<a class="btn btn-primary rounded" href="{{ route('listaErrores')}}">Mostrar todos los errores</a>
		@endif
	</div>
</div>
@endsection