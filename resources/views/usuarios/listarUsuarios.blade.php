@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<div class="d-flex justify-content-between align-items-center">
				<h1 class="display-4 text-primary">Lista de usuarios</h1>
			</div>
			<hr>
			<ul class="list-group">

				@foreach ($usuarios as $usuario)
				    <p>This is user {{ $usuario->name }}</p>
				    <li class="list-group-item border-0 mb-3 shadow-sm bg-transparent">
						<a class="text-dark h5 d-flex justify-content-between align-items-center">
							<span class="font-weight-bold">{{ $usuario->name }}</span>
							<span class="text-black-50">{{ $usuario->email }}</span>
						</a>
					</li>
				@endforeach
			</ul>
		</div>
    </div>
</div>
@endsection