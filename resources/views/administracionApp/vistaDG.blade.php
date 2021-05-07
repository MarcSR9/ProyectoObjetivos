@extends('layouts.app')

@section('content')
<div class="container col-md-10">
    <div class="bg-white p-5 shadow rounded">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="display-5 text-primary">Vista Director General</h1>
            <a class="btn btn-outline-secondary btn-arrow-left font-weight-bold" href="{{ route('home') }}">< Volver</a>
        </div>
        <hr>
        <div class="list-group col-md-12">
            <ul class="list-group">
                @foreach($estados as $estado)
                <li class="list-group-item border-0 mb-3 shadow-sm bg-transparent d-flex justify-content-between">
                    <span class="h5 font-weight-bold align-items-left">Trimestre 1</span>
                    @if($estado->trimester_1 == 'enabled')
                        <span class="h5 text-black-50 align-items-center">Estado: Activado</span>
                        <span><a class="btn font-weight-bold rounded" style="background-color: #b3b3b3" href="#" onclick="document.getElementById('desactivarT1').submit()">Desactivar</a></span>
                        <form class="d-none" id="desactivarT1" method="POST" action="{{ route('desactivarTrimestre1') }}">
                            @csrf
                        </form>
                    @else
                        <span class="h5 text-black-50 align-items-center">Estado: Desactivado</span>
                        <span><a class="btn btn-success font-weight-bold rounded" href="#" onclick="document.getElementById('activarT1').submit()">Activar</a></span>
                        <form class="d-none" id="activarT1" method="POST" action="{{ route('activarTrimestre1') }}">
                            @csrf
                        </form>
                    @endif
                </li>

                <li class="list-group-item border-0 mb-3 shadow-sm bg-transparent d-flex justify-content-between">
                    <span class="h5 font-weight-bold align-items-left">Trimestre 2</span>
                    @if($estado->trimester_2 == 'enabled')
                        <span class="h5 text-black-50 align-items-center">Estado: Activado</span>
                        <span><a class="btn font-weight-bold rounded" style="background-color: #b3b3b3" href="#" onclick="document.getElementById('desactivarT2').submit()">Desactivar</a></span>
                        <form class="d-none" id="desactivarT2" method="POST" action="{{ route('desactivarTrimestre2') }}">
                            @csrf
                        </form>
                    @else
                        <span class="h5 text-black-50 align-items-center">Estado: Desactivado</span>
                        <span><a class="btn btn-success font-weight-bold rounded" href="#" onclick="document.getElementById('activarT2').submit()">Activar</a></span>
                        <form class="d-none" id="activarT2" method="POST" action="{{ route('activarTrimestre2') }}">
                            @csrf
                        </form>
                    @endif
                </li>

                <li class="list-group-item border-0 mb-3 shadow-sm bg-transparent d-flex justify-content-between">
                    <span class="h5 font-weight-bold align-items-left">Trimestre 3</span>
                    @if($estado->trimester_3 == 'enabled')
                        <span class="h5 text-black-50 align-items-center">Estado: Activado</span>
                        <span><a class="btn font-weight-bold rounded" style="background-color: #b3b3b3" href="#" onclick="document.getElementById('desactivarT3').submit()">Desactivar</a></span>
                        <form class="d-none" id="desactivarT3" method="POST" action="{{ route('desactivarTrimestre3') }}">
                            @csrf
                        </form>
                    @else
                        <span class="h5 text-black-50 align-items-center">Estado: Desactivado</span>
                        <span><a class="btn btn-success font-weight-bold rounded" href="#" onclick="document.getElementById('activarT3').submit()">Activar</a></span>
                        <form class="d-none" id="activarT3" method="POST" action="{{ route('activarTrimestre3') }}">
                            @csrf
                        </form>
                    @endif
                </li>

                <li class="list-group-item border-0 mb-3 shadow-sm bg-transparent d-flex justify-content-between">
                    <span class="h5 font-weight-bold align-items-left">Trimestre 4</span>
                    @if($estado->trimester_4 == 'enabled')
                        <span class="h5 text-black-50 align-items-center">Estado: Activado</span>
                        <span><a class="btn font-weight-bold rounded" style="background-color: #b3b3b3" href="#" onclick="document.getElementById('desactivarT4').submit()">Desactivar</a></span>
                        <form class="d-none" id="desactivarT4" method="POST" action="{{ route('desactivarTrimestre4') }}">
                            @csrf
                        </form>
                    @else
                        <span class="h5 text-black-50 align-items-center">Estado: Desactivado</span>
                        <span><a class="btn btn-success font-weight-bold rounded" href="#" onclick="document.getElementById('activarT4').submit()">Activar</a></span>
                        <form class="d-none" id="activarT4" method="POST" action="{{ route('activarTrimestre4') }}">
                            @csrf
                        </form>
                    @endif
                </li>

                <li class="list-group-item border-0 mb-3 shadow-sm bg-transparent d-flex justify-content-between">
                    <span class="h5 font-weight-bold align-items-left">Conclusiones</span>
                    @if($estado->conclusions == 'enabled')
                        <span class="h5 text-black-50 align-items-center">Estado: Activado</span>
                        <span><a class="btn font-weight-bold rounded" style="background-color: #b3b3b3" href="#" onclick="document.getElementById('desactivarConclusiones').submit()">Desactivar</a></span>
                        <form class="d-none" id="desactivarConclusiones" method="POST" action="{{ route('desactivarConclusiones') }}">
                            @csrf
                        </form>
                    @else
                        <span class="h5 text-black-50 align-items-center">Estado: Desactivado</span>
                        <span><a class="btn btn-success font-weight-bold rounded" href="#" onclick="document.getElementById('activarConclusiones').submit()">Activar</a></span>
                        <form class="d-none" id="activarConclusiones" method="POST" action="{{ route('activarConclusiones') }}">
                            @csrf
                        </form>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
        <hr>

        <div class="col-md-12 py-3">
            <h1>Objetivos de la empresa</h1>
            <br>
            <form method="POST" action="{{ route('filtrarObjetivos') }}" class="form-group row filterbar" id="filterbar">
                @csrf
                <label for="year" class="col-md-2 col-form-label text-md-right">Año del objetivo</label>
                <div class="col-md-2">
                    <select id="year" name="year" type="text" class="form-control" required>
                        <option @if($year == "all" || $year == null) selected @endif value="all">Todos</option>
                        <option @if($year == "2021") selected @endif value="2021">2021</option>
                        <option @if($year == "2022") selected @endif value="2022">2022</option>
                        <option @if($year == "2023") selected @endif value="2023">2023</option>
                        <option @if($year == "2024") selected @endif value="2024">2024</option>
                        <option @if($year == "2025") selected @endif value="2025">2025</option>
                        <option @if($year == "2026") selected @endif value="2026">2026</option>
                        <option @if($year == "2027") selected @endif value="2027">2027</option>
                        <option @if($year == "2028") selected @endif value="2028">2028</option>
                        <option @if($year == "2029") selected @endif value="2029">2029</option>
                    </select>
                </div>
                <label for="tipo" class="col-md-2 col-form-label text-md-right">Tipo de Objetivo</label>
                <div class="col-md-2">
                    <select id="tipo" name="tipo" type="text" class="form-control" required>
                        <option @if($tipo == "all" or $tipo == null) selected @endif value="all">Todos</option>
                        <option @if($tipo == "General") selected @endif value="General">Objetivo General</option>
                        <option @if($tipo == "Secundario") selected @endif value="Secundario">Objetivo Secundario</option>
                        <option @if($tipo == "Hito") selected @endif value="Hito">Hito</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-outline-dark font-weight-bold">Filtrar</button>

            </form>
        </div>
        <br>
            @if(count($objetivos) > 0)
                <table class="table shadow-sm bg-transparent h5">
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Año</th>
                        <th class="text-center">Usuario Creador</th>
                        <th class="text-center">Usuario Destino</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach ($objetivos as $objetivo)
                    @if($objetivo->completado == 'completado')
                    <tr class="table-success">
                    @elseif($objetivo->completado == 'no completado')
                    <tr class="table-danger">
                    @else
                    <tr>
                    @endif
                        <td>{{ $objetivo->nombre }}</td>
                        <td>{{ $objetivo->tipo }}</td>
                        <td>{{ $objetivo->year }}</td>
                        <td class="text-center">{{ $objetivo->nombre_origen }} {{ $objetivo->apellido_origen }}</td>
                        <td class="text-center">{{ $objetivo->destino_nombre }} {{ $objetivo->destino_apellido }}</td>
                        <td><a class="btn btn-outline-primary font-weight-bold" href="{{route('mostrarObjetivo', $objetivo->id)}}" >Ver Objetivo</a></td>
                    </tr>
                    @endforeach
                </table>
                @if(count($objetivos)>0 || auth()->user()->role == 'Director General')
                    <a class="btn btn-outline-primary col-md-2 font-weight-bold" href="{{ route('nuevoObjetivo')}}">Crear objetivo</a>
                @endif
            @else
                <p class="h5">Aún no existe ningún objetivo</p>
            @endif
        </div>
    </div>
</div>
@endsection
