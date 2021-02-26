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
				@foreach ($users as $user)
				    <p>This is user {{ $user->name }}</p>
				@endforeach
			</ul>
		</div>
    </div>
</div>
@endsection