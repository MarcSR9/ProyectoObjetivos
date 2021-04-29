<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aei.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/aei-logo.ico') }}">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container justify-content-between d-flex">
                <a class="navbar-brand mr-5" href="{{ route('home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <img class="logo" src={{ asset('images/aei-logo.png') }}>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <div class="ml-5 d-flex align-items-center">
                        @foreach($estados as $estado)
                            @if($estado->trimester_1 == 'enabled')
                                <button class="mx-1 font-weight-bold btn btn-success">T1</button>
                            @else
                                <button class="mx-1 font-weight-bold btn" style="background-color: #b3b3b3">T1</button>
                            @endif
                            @if($estado->trimester_2 == 'enabled')
                                <button class="mx-1 font-weight-bold btn btn-success">T2</button>
                            @else
                                <button class="mx-1 font-weight-bold btn" style="background-color: #b3b3b3">T2</button>
                            @endif
                            @if($estado->trimester_3 == 'enabled')
                                <button class="mx-1 font-weight-bold btn btn-success">T3</button>
                            @else
                                <button class="mx-1 font-weight-bold btn" style="background-color: #b3b3b3">T3</button>
                            @endif
                            @if($estado->trimester_4 == 'enabled')
                                <button class="mx-1 font-weight-bold btn btn-success">T4</button>
                            @else
                                <button class="mx-1 font-weight-bold btn" style="background-color: #b3b3b3">T4</button>
                            @endif
                            @if($estado->conclusions == 'enabled')
                                <button class="mx-1 font-weight-bold btn btn-success">Conclusiones</button>
                            @else
                                <button class="mx-1 font-weight-bold btn" style="background-color: #b3b3b3">Conclusiones</button>
                            @endif
                        @endforeach
                    </div>
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>

{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('usuarios.editarContraseña', auth()->user()->id) }}">Actualizar contraseña</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @include('layouts.session-status')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

{{--Author: Marc Santolaria Rodriguez, Copyright 2021--}}
