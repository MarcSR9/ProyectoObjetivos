@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                <h1>Inicio</h1>
                <a href="{{ route('usuarios.index') }}">Gestión usuarios (solo admin)</a>
                <a href="{{ route('objetivos') }}">Mis objetivos</a>
                <hr>
                <h2>Estado de la aplicaión</h2>
                <p>Mostrar trimestre</p>
                <p>Comentarios</p>
            </div>
        </div>
    </div>
</div>
@endsection
