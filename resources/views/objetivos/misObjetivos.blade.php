<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="display-5 text-primary">Mis objetivos</h1>
        </div>
        <hr>
        <div class="col-md-12 py-3">
            <h3>Objetivos asignados</h3>
            @if(count($objetivosDestino) > 0)
                <table class="table shadow-sm bg-transparent h5">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Año</th>
                        <th>Usuario Creador</th>
                        <th>Usuario Destino</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach ($objetivosDestino->sortBy('id')->sortBy('year') as $objetivo)
                    @if($objetivo->completado == 'completado')
                    <tr class="table-secondary">
                    @elseif($objetivo->tipo == 'Secundario')
                    <tr class="table-info">
                    @elseif($objetivo->tipo == 'Hito')
                    <tr class="table-warning">
                    @elseif($objetivo->tipo == 'General')
                    <tr class="table-primary">
                    @endif
                        <td>{{ $objetivo->id }}</td>
                        <td>{{ $objetivo->nombre }}</td>
                        <td>{{ $objetivo->tipo }}</td>
                        <td>{{ $objetivo->year }}</td>
                        <td>{{ $objetivo->name }} {{ $objetivo->surname }}</td>
                        <td>{{ auth()->user()->name }} {{ auth()->user()->surname }}</td>
                        <td><a class="btn btn-primary" href="{{route('mostrarObjetivo', $objetivo->id)}}" >Ver Objetivo</a></td>
                    </tr>
                    @endforeach
                </table>
            @else
                <p class="h5">Aún no te han asignado ningún objetivo</p>
            @endif
            @if(auth()->user()->crea_objetivo_general == 'true' || auth()->user()->crea_objetivo_secundario == 'true' || auth()->user()->crea_objetivo_hito == 'true')
                <a class="btn btn-primary col-md-2" href="{{ route('nuevoObjetivo')}}">Crear objetivo</a>
            @endif
        </div>
        <hr>
        <div class="col-md-12 py-3">
	        <h3>Objetivos creados por mí</h3>
            @if(count($objetivosOrigen) > 0)
    	        <table class="table mb-3 shadow-sm bg-transparent h5">
    	            <tr>
                        <th>ID</th>
    	                <th>Nombre</th>
    	                <th>Tipo</th>
                        <th>Año</th>
    	                <th>Usuario Creador</th>
    	                <th>Usuario Destino</th>
    	                <th>Acciones</th>
    	            </tr>
    	            @foreach ($objetivosOrigen->sortBy('id')->sortBy('year') as $objetivo)
                    @if($objetivo->completado == 'completado')
                    <tr class="table-secondary">
                    @elseif($objetivo->tipo == 'Secundario')
                    <tr class="table-info">
                    @elseif($objetivo->tipo == 'Hito')
                    <tr class="table-warning">
                    @elseif($objetivo->tipo == 'General')
                    <tr class="table-primary">
                    @endif
                        <td>{{ $objetivo->id }}</td>
    	                <td>{{ $objetivo->nombre }}</td>
                        <td>{{ $objetivo->tipo }}</td>
                        <td>{{ $objetivo->year }}</td>
                        <td>{{ auth()->user()->name }} {{ auth()->user()->surname }}</td>
                        <td>{{ $objetivo->name }} {{ $objetivo->surname }}</td>
                        <td>
                            <span class="btn-group">
                                <a class="btn btn-primary rounded" href="{{route('mostrarObjetivo', $objetivo->id)}}" >Ver Objetivo</a>
                                @if($objetivo->completado == null)
                                <form method="POST" action="{{ route('completarObjetivo', $objetivo) }}">
                                    @csrf
                                    <button class="btn btn-success rounded mx-1 font-weight-bold" onclick="return confirm('Estás seguro de que quieres marcar el objetivo como completado?')" href="">Completar</button>
                                </form>
                                @endif
                                <form method="POST" action="{{ route('eliminarObjetivo', $objetivo) }}">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger font-weight-bold" onclick="return confirm('Estás seguro de que quieres eliminar el objetivo?')" href="">Eliminar</button>
                                </form>
                            </span>
                        </td>
    	            </tr>
    	            @endforeach
    	        </table>
            @else
                <p class="h5">Aún no has creado ningún objetivo</p>
            @endif
    	</div>
    </div>
</div>