@extends('layouts.app')

@section('content')
<div class="container col-md-9">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                @if(auth()->user()->role != 'Default')
                    <a class="btn btn-primary" href="{{ route('usuarios.lista') }}">Gestión usuarios</a>
                    <a class="btn btn-primary" href="{{ route('administracion') }}">Administración de la aplicación</a>
                @endif
            </div>
            <hr>
            @include('objetivos.misObjetivos')
        </div>
    </div>
</div>
@endsection
