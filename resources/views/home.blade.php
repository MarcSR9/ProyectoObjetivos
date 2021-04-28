@extends('layouts.app')

@section('content')

<div class="container col-md-10">
    <div class="bg-white p-5 shadow rounded ow justify-content-center">
        <div class="col-md-12">
            <div class="">
                @if(auth()->user()->role == 'Admin')
                    <a class="btn btn-outline-primary font-weight-bold" href="{{ route('administracion') }}">Administración de la aplicación</a>
                @elseif(auth()->user()->role == 'Director General')
                    <a class="btn btn-outline-primary font-weight-bold" href="{{ route('panelDGeneral') }}">Administración de la aplicación</a>
                @endif
            </div>
            <hr>
            @include('objetivos.misObjetivos')
        </div>
    </div>
</div>
@endsection
