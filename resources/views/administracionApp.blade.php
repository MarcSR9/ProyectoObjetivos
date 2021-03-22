<div class="row justify-content-center">
    <div class="col-md-12">
    	<div class="d-flex justify-content-between align-items-center">
			<h3 class="display-5 text-primary">Estado de la aplicación</h3>
		</div>
		<hr>

		<div class="d-flex justify-content-between align-items-center">
			<div class="list-group col-md-4">
				<h5>Estado de los trimestres</h5>
				@foreach ($trimestres as $trimestre)
					<ul class="list-group">
					    <li class="list-group-item border-0 mb-3 shadow-sm bg-transparent">
					    	@if($trimestre->trimestre == 'Conclusiones')
					    		<a class="text-dark h5 d-flex justify-content-between align-items-center">
								<span class="font-weight-bold">{{ $trimestre->trimestre }}</span>
								<span class="font-weight-bold">Estado: {{ $trimestre->estado }}</span>
								<form method="POST" {{-- action={{ route('usuarios.eliminarUsuario', $trimesre) }} --}}>
									<button>Activar/Desactivar</button>
								</form>
							</a>
					    	@endif
							<a class="text-dark h5 d-flex justify-content-between align-items-center">
								<span class="font-weight-bold">Trimestre {{ $trimestre->trimestre }}</span>
								<span class="font-weight-bold">Estado: {{ $trimestre->estado }}</span>
								<form method="POST" {{-- action={{ route('usuarios.eliminarUsuario', $trimesre) }} --}}>
									<button>Activar/Desactivar</button>
								</form>
							</a>
						</li>
					</ul>
				@endforeach
			</div>
		</div>
	</div>
</div>