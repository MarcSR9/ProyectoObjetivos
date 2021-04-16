@extends('layouts.app')

@section('content')
<div class="container col-md-9">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                @if(auth()->user()->role == 'Admin')
                    <a class="btn btn-primary" href="{{ route('administracion') }}">Administración de la aplicación</a>
                @elseif(auth()->user()->role == 'Director General')
                    <a class="btn btn-primary" href="{{ route('panelDGeneral') }}">Administración de la aplicación</a>
                @endif
            </div>
            <hr>
            @include('objetivos.misObjetivos')
        </div>
    </div>
</div>
@endsection
