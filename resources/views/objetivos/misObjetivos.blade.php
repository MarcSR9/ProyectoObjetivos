<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="display-5 text-primary">Mis objetivos</h1>
            <a class="btn btn-primary btn-arrow-left" href="{{ URL::previous() }}">Volver</a>
        </div>
        <hr>
        <div class="col-md-12 py-3">
            <h3>Objetivos asignados</h3>
            <table class="table shadow-sm bg-transparent h5">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Usuario Creador</th>
                    <th>Usuario Destino</th>
                    <th>Acciones</th>
                </tr>
                @forelse ($objetivosDestino as $objetivo)
                <tr>
                    <td>{{ $objetivo->id }}</td>
                    <td>{{ $objetivo->nombre }}</td>
                    <td>{{ $objetivo->tipo }}</td>
                    <td>{{ $objetivo->name }} {{ $objetivo->surname }}</td>
                    <td>{{ auth()->user()->name }} {{ auth()->user()->surname }}</td>
                    <td><a class="btn btn-primary" href="{{route('mostrarObjetivo', $objetivo->id)}}" >Ver Objetivo</a></td>
                </tr>
                @empty
                    <p>Aún no tienes objetivos asignados</p>
                @endforelse
            </table>
            @if(count($objetivosDestino)>0 || auth()->user()->role == 'Director General')
                <a class="btn btn-primary col-md-2" href="{{ route('nuevoObjetivo')}}">Crear objetivo</a>
            @endif
        </div>
        <hr>
        <div class="col-md-12 py-3">
	        <h3>Objetivos creados por mí</h3>
	        <table class="table mb-3 shadow-sm bg-transparent h5">
	            <tr>
                    <th>ID</th>
	                <th>Nombre</th>
	                <th>Tipo</th>
	                <th>Usuario Creador</th>
	                <th>Usuario Destino</th>
	                <th>Acciones</th>
	            </tr>
	            @forelse ($objetivosOrigen as $objetivo)
	            <tr>
                    <td>{{ $objetivo->id }}</td>
	                <td>{{ $objetivo->nombre }}</td>
                    <td>{{ $objetivo->tipo }}</td>
                    <td>{{ auth()->user()->name }} {{ auth()->user()->surname }}</td>
                    <td>{{ $objetivo->name }} {{ $objetivo->surname }}</td>
                    <td><a class="btn btn-primary" href="{{route('mostrarObjetivo', $objetivo->id)}}" >Ver Objetivo</a></td>
	            </tr>
                @empty
                <p>Aún no has creado ningún objetivo</p>
	            @endforelse
	        </table>
    	</div>
    </div>
</div>