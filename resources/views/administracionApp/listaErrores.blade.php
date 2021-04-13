@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="list-group col-md-12 mt-5">
                <h3>Registro de errores</h3>
                <a class="btn btn-primary btn-arrow-left" href="{{ URL::previous() }}">Volver</a>
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
        </div>
    </div>
</div>
@endsection
