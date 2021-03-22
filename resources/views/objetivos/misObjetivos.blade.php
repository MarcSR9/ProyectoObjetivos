<div class="row justify-content-center">
    <div class="col-md-12">
    	<div class="d-flex justify-content-between align-items-center">
			<h3 class="display-5 text-primary">Mis objetivos</h3>
		</div>
		<hr>
		<a class="btn btn-primary" href="{{ route('nuevoObjetivo')}}">Crear objetivo</a>

		<div class="d-flex justify-content-between align-items-center">
			<div class="list-group col-md-4">
				<h5>Objetivos Generales</h5>
				@foreach ($objetivos as $objetivo)
					@if($objetivo->Tipo == 'General')
					<ul class="list-group">
					    <li class="list-group-item border-0 mb-3 shadow-sm bg-transparent">
							<a class="text-dark h5 d-flex justify-content-between align-items-center">
								<span class="font-weight-bold">{{ $objetivo->Nombre }}</span>
							</a>
						</li>
					</ul>
					@endif
				@endforeach
			</div>

			<div class="list-group col-md-4">
				<h5>Objetivos Secundarios</h5>
				@foreach ($objetivos as $objetivo)
					@if($objetivo->Tipo == 'Secundario')
					<ul class="list-group">
					    <li class="list-group-item border-0 mb-3 shadow-sm bg-transparent">
							<a class="text-dark h5 d-flex justify-content-between align-items-center">
								<span class="font-weight-bold">{{ $objetivo->Nombre }}</span>
							</a>
						</li>
					</ul>
					@endif
				@endforeach
			</div>

			<div class="list-group col-md-4">
				<h5>Hitos</h5>
				@foreach ($objetivos as $objetivo)
					@if($objetivo->Tipo == 'Hito')
					<ul class="list-group">
					    <li class="list-group-item border-0 mb-3 shadow-sm bg-transparent">
							<a class="text-dark h5 d-flex justify-content-between align-items-center">
								<span class="font-weight-bold">{{ $objetivo->Nombre }}</span>
							</a>
						</li>
					</ul>
					@endif
				@endforeach
			</div>
		</div>
	</div>
</div>