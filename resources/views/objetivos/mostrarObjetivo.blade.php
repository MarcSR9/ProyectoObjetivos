@extends('layouts.app')

@section('content')

    <script>
        $( document ).ready(function() {

            $("#show_all_button").click(function(){
                $(".card").show();
                $("#show_all_button").hide();
                $("#hide_all_button").show();
            });

            $("#hide_all_button").click(function(){
                var estados = <?php echo json_encode($estados); ?>;
                var t1 = estados[0]['trimester_1'];
                var t2 = estados[0]['trimester_2'];
                var t3 = estados[0]['trimester_3'];
                var t4 = estados[0]['trimester_4'];
                var conclusions = estados[0]['conclusions'];
                /*alert(t1);
                alert(t2);
                alert(t3);
                alert(t4);
                alert(conclusions);*/

                if(t1 == "enabled"){
                    $(".card-t1").show();
                }
                else{
                    $(".card-t1").hide();
                }

                if(t2 == "enabled"){
                    $(".card-t2").show();
                }
                else{
                    $(".card-t2").hide();
                }

                if(t3 == "enabled"){
                    $(".card-t3").show();
                }
                else{
                    $(".card-t3").hide();
                }

                if(t4 == "enabled"){
                    $(".card-t4").show();
                }
                else{
                    $(".card-t4").hide();
                }

                if(conclusions == "enabled"){
                    $(".card-conclusions").show();
                }
                else{
                    $(".card-conclusions").hide();
                }

                $("#show_all_button").show();
                $("#hide_all_button").hide();

            });

            $(".card").hide();
            $("#hide_all_button").click();
        });



    </script>

    <div class="container col-md-10">
	<div class="bg-white p-5 shadow rounded">
		<div class="d-flex justify-content-between align-items-center">
            <h3 class="text-primary mb-4">{{ $objetivo->nombre }}</h3>
            <a class="btn btn-outline-secondary btn-arrow-left font-weight-bold" href="{{ route('home') }}">< Volver</a>
        </div>

		<form method="POST" class="col-md-11" action="{{ route('actualizarObjetivo', $objetivo) }}">
            @if($objetivo->completado != null)
                <div class="h5 my-3 font-weight-bold">Estado: &nbsp;&nbsp;&nbsp; <div class="font-weight-bold btn btn-success">Completado</div></div>
            @else
                <div class="h5 my-3 font-weight-bold">Estado: &nbsp;&nbsp;&nbsp;  <div class="font-weight-bold btn btn-warning">En curso</div></div>
            @endif
			@csrf

			@if(auth()->user()->id != $objetivo->id_usuario_origen)
                    <p class="h5 my-3"><span class="font-weight-bold"> Tipo de objetivo: </span> {{ $objetivo->tipo }}</p>
                    <p class="h5 my-3"><span class="font-weight-bold"> Creado por: </span> {{ $creador->name }} {{ $creador->surname }}</p>
                    <p class="h5 my-3"><span class="font-weight-bold"> Destinatario: </span> {{ $destinatario->name }} {{ $destinatario->surname }}</p>

				{{--@if($objetivo->id_objetivo_dependiente != null)
					<p class="h5 my-3">Nombre del objetivo dependiente: {{ $dependencia->first()->nombre }} </p>
					<p class="h5 my-3">Descripción del objetivo dependiente: {{ $dependencia->first()->descripcion }} </p>
				@endif--}}



                    <p class="h5 my-3"> <span class="font-weight-bold">Año:</span> {{ $objetivo->year }}</p>

                @if($objetivo->id_objetivo_dependiente != null)
                        <p for="id_objetivo_dependiente" class="h5"> <span class="font-weight-bold">Objetivo dependiente: </span>{{ $dependencia->id }} - {{ $dependencia->nombre }} ({{ $dependencia->tipo }})</p>
                @endif

                @if($objetivo->tipo == "Hito")
                    <label for="descripcion" class="h4 my-4 text-primary"> Descripción del {{ $objetivo->tipo }} </label>
                @else($objtivo->tipo == "hito")
                    <label for="descripcion" class="h4 my-4 text-primary"> Descripción del Objetivo {{ $objetivo->tipo }} </label>
                @endif
                <p name="descripcion" id="descripcion" class="h5 text-dark" >{{ $objetivo->descripcion }}</p>

			@else
				<div class="form-group row h5">
                    <label for="tipo" class="h5 col-md-3 col-form-label font-weight-bold">Tipo de objetivo</label>
                    <div class="col-md-4">
                        <label class="h5 col-form-label">{{ $objetivo->tipo}}</label>
                        <input type="hidden" value="{{$objetivo->tipo}}">

                        {{--<select id="tipo" name="tipo" type="text" class="form-control" required>
                        	<option disabled selected value> Selecciona el tipo de objetivo</option>
                            @if(auth()->user()->crea_objetivo_general == 'true')
                                <option value="General">Objetivo General</option>
                            @endif
                            @if(auth()->user()->crea_objetivo_secundario == 'true')
                                <option value="Secundario">Objetivo Secundario</option>
                            @endif
                            @if(auth()->user()->crea_objetivo_hito == 'true')
                                <option value="Hito">Hito</option>
                            @endif
                        </select>--}}

                        @error('tipo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row h5">
                    <label for="nombre" class="col-md-3 col-form-label font-weight-bold">Nombre del objetivo</label>
                    <div class="col-md-4">
                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $objetivo->nombre }}" required autocomplete="nombre" autofocus>

                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row h5">
                    <label for="year" class="col-md-3 col-form-label font-weight-bold">Año del objetivo</label>
                    <div class="col-md-4">
                        <select id="year" name="year" type="text" class="form-control" required>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                        </select>

                        @error('year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row h5">
                    <label for="id_usuario_destino" class="col-md-3 col-form-label font-weight-bold">Usuario destino</label>
                    <div class="col-md-4">
                        <select id="id_usuario_destino" name="id_usuario_destino" type="text" class="form-control" required>
                            @forelse ($usuarios as $usuario)
                            	@if($objetivo->id_usuario_destino == $usuario->id)
                                <option selected value="{{ $usuario->id }}">{{ $usuario->email }}</option>
                                @else
                                <option value="{{ $usuario->id }}">{{ $usuario->email }}</option>
                                @endif
                            @empty
                                <p>No hay usuarios</p>
                            @endforelse
                        </select>

                        @error('id_usuario_destino')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                @if(auth()->user()->crea_objetivo_general == 'true'
                    && auth()->user()->crea_objetivo_secundario == 'false'
                    && auth()->user()->crea_objetivo_hito == 'false')
                <div class="form-group row d-none">
                @else
                <div class="form-group row h5">
                @endif

                    <label for="id_objetivo_dependiente" class="col-md-3 col-form-label"><span class="font-weight-bold">Depende de otro objetivo?</span></label>
                @if($objetivo->id_objetivo_dependiente != null)
                <label for="id_objetivo_dependiente" class="col-md-9 col-form-label">{{ $dependencia->id }} - {{ $dependencia->nombre }} ({{ $dependencia->tipo }})</label>
                @else
                <label for="id_objetivo_dependiente" class="col-md-3 col-form-label">No depende de ningún objetivo</label>
                @endif
                    {{--
                    <div class="col-md-4">
                         <select id="id_objetivo_dependiente" name="id_objetivo_dependiente" type="text" class="form-control" required>
                            <option value="null" selected="selected">No depende de ningún objetivo</option>
                            @forelse ($objetivos as $objetivoDependiente)
                                <option value="{{ $objetivoDependiente->id }}">{{ $objetivoDependiente->id }} / {{ $objetivoDependiente->nombre }} ({{ $objetivoDependiente->tipo }})</option>
                            @empty
                                <p>No hay objetivos</p>
                            @endforelse
                        </select>

                        @error('id_objetivo_dependiente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>--}}
                </div>

                <label for="descripcion" class="h4 my-5 text-primary">Descripción del {{ $objetivo->tipo }}</label>
				<p name="descripcion" id="descripcion" rows="5" class="col-md-9 text-dark h5">{{ $objetivo->descripcion }}</p>
			@endif


			<div class="mt-5">
                @if($objetivo->tipo == "Hito")
				    <h4 class="text-primary">Comentarios del  {{ $objetivo->tipo }}</h4>
                @else($objtivo->tipo == "hito")
                    <h4 class="text-primary">Comentarios del Objetivo {{ $objetivo->tipo }}</h4>
                @endif

                <!-- Botones de ocultar y mostrar objetivos -->
                <div id="show_all_button" class="font-weight-bold btn btn-primary">Ver todos los comentarios</div>
                <div id="hide_all_button" class="font-weight-bold btn btn-primary">Ocultar comentarios</div>

				@if($objetivo->tipo == 'Hito')
					@foreach ($estados as $estado)
						<div class="row my-4">
							<div class="col-md-12">
                                <div class="card card-t1">
                                    <h5 class="card-header text-center">Comentarios {{ $creador->name }} {{ $creador->surname }} T1</h5>
                                    <div class="card-body">
                                        @if($estado->trimester_1 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen && $objetivo->completado == null)
                                            <textarea id="comentario_origen_T1" name="comentario_origen_T1" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_T1 }}</textarea>
                                        @else
                                            <p class="text-justify text-dark h5" id="comentario_origen_T1" name="comentario_origen_T1">{{ $objetivo->comentario_origen_T1 }}</p>
                                        @endif
                                    </div>
                                </div>

                               <!--<label for="comentario_origen_T1" class="font-weight-bolder col-md-12 text-mt-3 text-dark"> Comentarios {{ $creador->name }} {{ $creador->surname }} T1</label>
								@if($estado->trimester_1 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_T1" name="comentario_origen_T1" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_T1 }}</textarea>
								@else
									<p class="text-justify text-dark h5" id="comentario_origen_T1" name="comentario_origen_T1">{{ $objetivo->comentario_origen_T1 }}</p>
								@endif-->
							</div>
						</div>

						<div class="row my-4">
							<div class="col-md-12">
                                <div class="card card-t2">
                                    <h5 class="card-header text-center">Comentarios {{ $creador->name }} {{ $creador->surname }} T2</h5>
                                    <div class="card-body">
                                        @if($estado->trimester_2 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen && $objetivo->completado == null)
                                            <textarea id="comentario_origen_T2" name="comentario_origen_T2" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_T2 }}</textarea>
                                        @else
                                            <p class="text-justify text-dark h5" id="comentario_origen_T2" name="comentario_origen_T2">{{ $objetivo->comentario_origen_T2 }}</p>
                                        @endif
                                    </div>
                                </div>

								<!--<label for="comentario_origen_T2" class="font-weight-bolder col-md-12 mt-3 text-dark">Comentarios del creador del objetivo {{$objetivo->tipo}} en el trimestre 2</label>
								@if($estado->trimester_2 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_T2" name="comentario_origen_T2" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_T2 }}</textarea>
								@else
									<p class="text-justify text-dark h5" id="comentario_origen_T2" name="comentario_origen_T2">{{ $objetivo->comentario_origen_T2 }}</p>
								@endif-->
							</div>
						</div>

						<div class="row my-4">
							<div class="col-md-12">
                                <div class="card card-t3">
                                    <h5 class="card-header text-center">Comentarios {{ $creador->name }} {{ $creador->surname }} T3</h5>
                                    <div class="card-body">
                                        @if($estado->trimester_3 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen && $objetivo->completado == null)
                                            <textarea id="comentario_origen_T3" name="comentario_origen_T3" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_T3 }}</textarea>
                                        @else
                                            <p class="text-justify text-dark h5" id="comentario_origen_T3" name="comentario_origen_T3">{{ $objetivo->comentario_origen_T3 }}</p>
                                        @endif
                                    </div>
                                </div>

								<!--<label for="comentario_origen_T3" class="font-weight-bolder col-md-12 mt-3 text-dark">Comentarios del creador del objetivo {{$objetivo->tipo}} en el trimestre 3</label>
								@if($estado->trimester_3 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_T3" name="comentario_origen_T3" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_T3 }}</textarea>
								@else
									<p class="text-justify text-dark h5" id="comentario_origen_T3" name="comentario_origen_T3">{{ $objetivo->comentario_origen_T3 }}</p>
								@endif-->
							</div>
						</div>

						<div class="row my-4">
							<div class="col-md-12">
                                <div class="card card-t4">
                                    <h5 class="card-header text-center">Comentarios {{ $creador->name }} {{ $creador->surname }} T4</h5>
                                    <div class="card-body">
                                        @if($estado->trimester_4 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen && $objetivo->completado == null)
                                            <textarea id="comentario_origen_T4" name="comentario_origen_T4" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_T4 }}</textarea>
                                        @else
                                            <p class="text-justify text-dark h5" id="comentario_origen_T4" name="comentario_origen_T4">{{ $objetivo->comentario_origen_T4 }}</p>
                                        @endif
                                    </div>
                                </div>

								<!-- <label for="comentario_origen_T4" class="font-weight-bolder col-md-12 mt-3 text-dark">Comentarios del creador del objetivo {{$objetivo->tipo}} en el trimestre 4</label>
								@if($estado->trimester_4 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_T4" name="comentario_origen_T4" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_T4 }}</textarea>
								@else
									<p class="text-justify text-dark h5" id="comentario_origen_T4" name="comentario_origen_T4">{{ $objetivo->comentario_origen_T4 }}</p>
								@endif-->
							</div>
						</div>

						<div class="row my-4">
							<div class="col-md-12">
                                <div class="card card-conclusions">
                                    <h5 class="card-header text-center">Comentarios {{ $creador->name }} {{ $creador->surname }} Conclusiones</h5>
                                    <div class="card-body">
                                        @if($estado->conclusions == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen && $objetivo->completado == null)
                                            <textarea id="comentario_origen_conclusiones" name="comentario_origen_conclusiones" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_conclusiones }}</textarea>
                                        @else
                                            <p class="text-justify text-dark h5" id="comentario_origen_conclusiones" name="comentario_origen_conclusiones">{{ $objetivo->comentario_origen_conclusiones }}</p>
                                        @endif
                                    </div>
                                </div>

								<!--<label for="comentario_origen_conclusiones" class="font-weight-bolder col-md-12 mt-3 text-dark">Comentarios del creador del objetivo {{$objetivo->tipo}} en las conclusiones</label>
								@if($estado->conclusions == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_conclusiones" name="comentario_origen_conclusiones" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_conclusiones }}</textarea>
								@else
									<p class="text-justify text-dark h5" id="comentario_origen_conclusiones" name="comentario_origen_conclusiones">{{ $objetivo->comentario_origen_conclusiones }}</p>
								@endif-->
							</div>
						</div>
					@endforeach
				@else
					@foreach ($estados as $estado)
						<div class="row my-4">
							<div class="col-md-6">

                                <div class="card card-t1">
                                    <h5 class="card-header text-center text-center">Comentarios {{ $creador->name }} {{ $creador->surname }} T1</h5>
                                    <div class="card-body">
                                        @if($estado->trimester_1 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen && $objetivo->completado == null)
                                            <textarea id="comentario_origen_T1" name="comentario_origen_T1" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_T1 }}</textarea>
                                        @else
                                            <p class="text-justify text-dark h5" id="comentario_origen_T1" name="comentario_origen_T1">{{ $objetivo->comentario_origen_T1 }}</p>
                                        @endif
                                    </div>
                                </div>

								<!--<label for="comentario_origen_T1" class="font-weight-bolder col-md-12 mt-3 text-dark">Creador del objetivo {{$objetivo->tipo}} en el trimestre 1</label>
								@if($estado->trimester_1 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_T1" name="comentario_origen_T1" rows="5" class="ml-3 col-md-11 h5">{{ $objetivo->comentario_origen_T1 }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_origen_T1" name="comentario_origen_T1">{{ $objetivo->comentario_origen_T1 }}</p>
								@endif-->
							</div>

							<div class="col-md-6">
                                <div class="card card-t1">
                                    <h5 class="card-header text-center">Comentarios {{ $destinatario->name }} {{ $destinatario->surname }} T1</h5>
                                    <div class="card-body">
                                        @if($estado->trimester_1 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_destino && $objetivo->completado == null)
                                            <textarea id="comentario_origen_T1" name="comentario_destino_T1" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_destino_T1 }}</textarea>
                                        @else
                                            <p class="text-justify text-dark h5" id="comentario_destino_T1" name="comentario_origen_T1">{{ $objetivo->comentario_destino_T1 }}</p>
                                        @endif
                                    </div>
                                </div>
								<!--<label for="comentario_destino_T1" class="font-weight-bolder col-md-12 mt-3 text-dark">Destinatario del objetivo {{$objetivo->tipo}} en el trimestre 1</label>
								@if($estado->trimester_1 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_destino)
									<textarea id="comentario_destino_T1" name="comentario_destino_T1" rows="5" class="ml-3 col-md-12">{{ $objetivo->comentario_destino_T1 }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_destino_T1" name="comentario_destino_T1">{{ $objetivo->comentario_destino_T1 }}</p>
								@endif-->
							</div>
						</div>

						<div class="row my-4">
							<div class="col-md-6">

                                <div class="card card-t2">
                                    <h5 class="card-header text-center">Comentarios {{ $creador->name }} {{ $creador->surname }} T2</h5>
                                    <div class="card-body">
                                        @if($estado->trimester_2 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen && $objetivo->completado == null)
                                            <textarea id="comentario_origen_T2" name="comentario_origen_T2" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_T2 }}</textarea>
                                        @else
                                            <p class="text-justify text-dark h5" id="comentario_origen_T2" name="comentario_origen_T2">{{ $objetivo->comentario_origen_T2 }}</p>
                                        @endif
                                    </div>
                                </div>


								<!--<label for="comentario_origen_T2" class="font-weight-bolder col-md-12 mt-3 text-dark">Creador del objetivo {{$objetivo->tipo}} en el trimestre 2</label>
								@if($estado->trimester_2 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_T2" name="comentario_origen_T2" rows="5" class="ml-3 col-md-11 h5">{{ $objetivo->comentario_origen_T2 }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_origen_T2" name="comentario_origen_T2">{{ $objetivo->comentario_origen_T2 }}</p>
								@endif-->
							</div>

							<div class="col-md-6">

                                <div class="card card-t2">
                                    <h5 class="card-header text-center">Comentarios {{ $destinatario->name }} {{ $destinatario->surname }} T2</h5>
                                    <div class="card-body">
                                        @if($estado->trimester_2 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_destino && $objetivo->completado == null)
                                            <textarea id="comentario_origen_T2" name="comentario_destino_T2" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_destino_T2 }}</textarea>
                                        @else
                                            <p class="text-justify text-dark h5" id="comentario_destino_T2" name="comentario_origen_T2">{{ $objetivo->comentario_destino_T2 }}</p>
                                        @endif
                                    </div>
                                </div>

								<!--<label for="comentario_destino_T2" class="font-weight-bolder col-md-12 mt-3 text-dark">Destinatario del objetivo {{$objetivo->tipo}} en el trimestre 2</label>
								@if($estado->trimester_2 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_destino )
									<textarea id="comentario_destino_T2" name="comentario_destino_T2" rows="5" class="ml-3 col-md-12">{{ $objetivo->comentario_destino_T2 }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_destino_T2" name="comentario_destino_T2">{{ $objetivo->comentario_destino_T2 }}</p>
								@endif-->
							</div>
						</div>

						<div class="row my-4">
							<div class="col-md-6">

                                <div class="card card-t3">
                                    <h5 class="card-header text-center">Comentarios {{ $creador->name }} {{ $creador->surname }} T3</h5>
                                    <div class="card-body">
                                        @if($estado->trimester_3 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen && $objetivo->completado == null)
                                            <textarea id="comentario_origen_T3" name="comentario_origen_T3" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_T3 }}</textarea>
                                        @else
                                            <p class="text-justify text-dark h5" id="comentario_origen_T3" name="comentario_origen_T3">{{ $objetivo->comentario_origen_T3 }}</p>
                                        @endif
                                    </div>
                                </div>


								<!--<label for="comentario_origen_T3" class="font-weight-bolder col-md-12 mt-3 text-dark">Creador del objetivo {{$objetivo->tipo}} en el trimestre 3</label>
								@if($estado->trimester_3 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_T3" name="comentario_origen_T3" rows="5" class="ml-3 col-md-11 h5">{{ $objetivo->comentario_origen_T3 }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_origen_T3" name="comentario_origen_T3">{{ $objetivo->comentario_origen_T3 }}</p>
								@endif-->
							</div>

							<div class="col-md-6">
                                <div class="card card-t3">
                                    <h5 class="card-header text-center">Comentarios {{ $destinatario->name }} {{ $destinatario->surname }} T3</h5>
                                    <div class="card-body">
                                        @if($estado->trimester_3 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_destino && $objetivo->completado == null)
                                            <textarea id="comentario_origen_T3" name="comentario_destino_T3" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_destino_T3 }}</textarea>
                                        @else
                                            <p class="text-justify text-dark h5" id="comentario_destino_T3" name="comentario_origen_T3">{{ $objetivo->comentario_destino_T3 }}</p>
                                        @endif
                                    </div>
                                </div>

								<!--<label for="comentario_destino_T3" class="font-weight-bolder col-md-12 mt-3 text-dark">Destinatario del objetivo {{$objetivo->tipo}} en el trimestre 3</label>
								@if($estado->trimester_3 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_destino)
									<textarea id="comentario_destino_T3" name="comentario_destino_T3" rows="5" class="ml-3 col-md-12">{{ $objetivo->comentario_destino_T3 }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_destino_T3" name="comentario_destino_T3">{{ $objetivo->comentario_destino_T3 }}</p>
								@endif-->
							</div>
						</div>

						<div class="row my-4">
							<div class="col-md-6">
                                <div class="card card-t4">
                                    <h5 class="card-header text-center">Comentarios {{ $creador->name }} {{ $creador->surname }} T4</h5>
                                    <div class="card-body">
                                        @if($estado->trimester_4 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen && $objetivo->completado == null)
                                            <textarea id="comentario_origen_T4" name="comentario_origen_T4" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_T4 }}</textarea>
                                        @else
                                            <p class="text-justify text-dark h5" id="comentario_origen_T4" name="comentario_origen_T4">{{ $objetivo->comentario_origen_T4 }}</p>
                                        @endif
                                    </div>
                                </div>

								<!--<label for="comentario_origen_T4" class="font-weight-bolder col-md-12 mt-3 text-dark">Creador del objetivo {{$objetivo->tipo}} en el trimestre 4</label>
								@if($estado->trimester_4 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_T4" name="comentario_origen_T4" rows="5" class="ml-3 col-md-11 h5">{{ $objetivo->comentario_origen_T4 }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_origen_T4" name="comentario_origen_T4">{{ $objetivo->comentario_origen_T4 }}</p>
								@endif-->
							</div>

							<div class="col-md-6">
                                <div class="card card-t4">
                                    <h5 class="card-header text-center">Comentarios {{ $destinatario->name }} {{ $destinatario->surname }} T4</h5>
                                    <div class="card-body">
                                        @if($estado->trimester_4 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_destino && $objetivo->completado == null)
                                            <textarea id="comentario_origen_T4" name="comentario_destino_T4" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_destino_T4 }}</textarea>
                                        @else
                                            <p class="text-justify text-dark h5" id="comentario_destino_T4" name="comentario_origen_T4">{{ $objetivo->comentario_destino_T4 }}</p>
                                        @endif
                                    </div>
                                </div>

                               <!-- <label for="comentario_destino_T4" class="font-weight-bolder col-md-12 mt-3 text-dark">Destinatario del objetivo {{$objetivo->tipo}} en el trimestre 4</label>
								@if($estado->trimester_4 == 'enabled' && auth()->user()->id == $objetivo->id_usuario_destino)
									<textarea id="comentario_destino_T4" name="comentario_destino_T4" rows="5" class="ml-3 col-md-12">{{ $objetivo->comentario_destino_T4 }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_destino_T4" name="comentario_destino_T4">{{ $objetivo->comentario_destino_T4 }}</p>
								@endif-->
							</div>
						</div>

						<div class="row my-4">
							<div class="col-md-6">
                                <div class="card card-conclusions">
                                    <h5 class="card-header text-center">Comentarios {{ $creador->name }} {{ $creador->surname }} conclusiones</h5>
                                    <div class="card-body">
                                        @if($estado->conclusions == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen && $objetivo->completado == null)
                                            <textarea id="comentario_origen_conclusiones" name="comentario_origen_conclusiones" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_origen_conclusiones }}</textarea>
                                        @else
                                            <p class="text-justify text-dark h5" id="comentario_origen_conclusiones" name="comentario_origen_conclusiones">{{ $objetivo->comentario_origen_conclusiones }}</p>
                                        @endif
                                    </div>
                                </div>
								<!--<label for="comentario_origen_conclusiones" class="font-weight-bolder col-md-12 mt-3 text-dark">Creador del objetivo {{$objetivo->tipo}} en las conclusiones</label>
								@if($estado->conclusions == 'enabled' && auth()->user()->id == $objetivo->id_usuario_origen)
									<textarea id="comentario_origen_conclusiones" name="comentario_origen_conclusiones" rows="5" class="ml-3 col-md-11 h5">{{ $objetivo->comentario_origen_conclusiones }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_origen_conclusiones" name="comentario_origen_conclusiones">{{ $objetivo->comentario_origen_conclusiones }}</p>
								@endif-->
							</div>

							<div class="col-md-6">

                                <div class="card card-conclusions">
                                    <h5 class="card-header text-center">Comentarios {{ $destinatario->name }} {{ $destinatario->surname }} conclusiones</h5>
                                    <div class="card-body">
                                        @if($estado->conclusions == 'enabled' && auth()->user()->id == $objetivo->id_usuario_destino && $objetivo->completado == null)
                                            <textarea id="comentario_origen_conclusiones" name="comentario_destino_conclusiones" rows="5" class="ml-3 col-md-12 h5">{{ $objetivo->comentario_destino_conclusiones }}</textarea>
                                        @else
                                            <p class="text-justify text-dark h5" id="comentario_destino_conclusiones" name="comentario_origen_conclusiones">{{ $objetivo->comentario_destino_conclusiones }}</p>
                                        @endif
                                    </div>
                                </div>


								<!--<label for="comentario_destino_conclusiones" class="font-weight-bolder col-md-12 mt-3 text-dark">Destinatario del objetivo {{$objetivo->tipo}} en las conclusiones</label>
								@if($estado->conclusions == 'enabled' && auth()->user()->id == $objetivo->id_usuario_destino)
									<textarea id="comentario_destino_conclusiones" name="comentario_destino_conclusiones" rows="5" class="ml-3 col-md-12">{{ $objetivo->comentario_destino_conclusiones }}</textarea>
								@else
									<p class="text-justify pl-3 text-dark h5" id="comentario_destino_conclusiones" name="comentario_destino_conclusiones">{{ $objetivo->comentario_destino_conclusiones }}</p>
								@endif-->
							</div>
						</div>
					@endforeach
				@endif

			</div>

			<div class="form-group row mb-0 mt-3">
				@if($objetivo->completado == null)
					@if(auth()->user()->id == $objetivo->id_usuario_origen || auth()->user()->id == $objetivo->id_usuario_destino)
	                <div class="col-md-6">
	                    <button type="submit" class="font-weight-bold btn btn-primary">Guardar cambios</button>
	                </div>
	                @endif
                @endif
            </div>
		</form>
	</div>
</div>
@endsection
