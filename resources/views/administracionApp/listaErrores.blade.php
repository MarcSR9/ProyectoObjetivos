@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mt-3">
                <h3 class="display-5 text-primary">Registro de errores</h3>
                <a class="btn btn-outline-secondary btn-arrow-left" href="{{ route('administracion') }}">< Volver</a>
            </div>
            <div class="list-group col-md-12 mt-3">
                <table class="table shadow-sm bg-transparent text-dark h5">
                    <tr class="text-primary">
                        <th>Error</th>
                        <th>Autor</th>
                        <th>Fecha</th>
                    </tr>
                    @forelse($errores as $error)
                    <tr>
                        <td class="font-weight-bold">{{ $error->error }}</td>
                        <td>{{ $error->email }}</td>
                        <td>{{ $error->created_at }}</td>
                    </tr>
                    @empty
                        <p>No hay errores registradas</p>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
