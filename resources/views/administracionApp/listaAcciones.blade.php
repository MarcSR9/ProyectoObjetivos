@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mt-3">
                <h3 class="display-5 text-primary">Registro de acciones</h3>
                <a class="btn btn-outline-secondary btn-arrow-left" href="{{ route('administracion') }}">< Volver</a>
            </div>
            <div class="list-group col-md-12 mt-3">
                <table class="table shadow-sm bg-transparent text-dark h5">
                    <tr class="text-primary">
                        <th>Acción</th>
                        <th>Autor</th>
                        <th>Fecha</th>
                    </tr>
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
            </div>
        </div>
    </div>
</div>
@endsection
