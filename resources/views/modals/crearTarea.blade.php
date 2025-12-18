<!-- Modal Crear Tarea: formulario para crear una nueva tarea -->
<div class="modal fade" id="modalCrearTarea" tabindex="-1" aria-labelledby="modalCrearTareaLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content custom-modal-create">
			<!-- Header -->
			<div class="modal-header custom-modal-header">
				<h5 class="modal-title text-white fw-bold mb-0" id="modalCrearTareaLabel">CREAR TAREA</h5>
			</div>
			<!-- Body -->
			<form id="formCrearTarea" method="POST" action="{{ route('tareas.store') }}">
				@csrf
				<div class="modal-body">
					<!-- Campo: nombre -->
					<div class="mb-3">
						<label for="nombreTarea" class="form-label">Nombre de la tarea</label>
						<input type="text" class="form-control custom-input" id="nombreTarea" name="nombre" value="{{ old('nombre') }}" placeholder="Ej. Diseñar mockups" required>
					</div>
				<!-- Campo: descripción (opcional) -->
				<div class="mb-3">
					<label for="descripcionTarea" class="form-label">Descripción (opcional)</label>
					<textarea class="form-control custom-input" id="descripcionTarea" name="descripcion" rows="3" placeholder="Detalles de la tarea">{{ old('descripcion') }}</textarea>
				</div>
					<!-- Selector: tipo de tarea -->
					<div class="mb-3">
						<label for="tipoTarea" class="form-label">Tipo de tarea</label>
						<select class="form-select custom-input" id="tipoTarea" name="id_tipo" required>
							<option selected disabled>Selecciona un tipo</option>
							@isset($tiposTarea)
								@foreach($tiposTarea as $tipo)
									<option value="{{ $tipo->id_tipo }}" @selected(old('id_tipo') == $tipo->id_tipo)>{{ $tipo->nombre ?? $tipo->tipo ?? '' }}</option>
								@endforeach
							@endisset
						</select>
					</div>
					<!-- Fechas: inicio y fin -->
					<div class="row g-3">
						<div class="col-12 col-md-6 mb-3">
							<label for="fechaInicio" class="form-label">Fecha de inicio</label>
							<input type="date" class="form-control custom-input" id="fechaInicio" name="fecha_inicio" value="{{ old('fecha_inicio') }}" required>
						</div>
						<div class="col-12 col-md-6 mb-3">
							<label for="fechaFinal" class="form-label">Fecha fin</label>
							<input type="date" class="form-control custom-input" id="fechaFinal" name="fecha_final" value="{{ old('fecha_final') }}" required>
						</div>
					</div>
					<!-- Selector: estado -->
					<div class="mb-3">
						<label for="estadoTarea" class="form-label">Estado</label>
						<select class="form-select custom-input" id="estadoTarea" name="id_estado" required>
							<option selected disabled>Selecciona un estado</option>
							@isset($estados)
								@foreach($estados as $estado)
									<option value="{{ $estado->id_estado }}" @selected(old('id_estado', 1) == $estado->id_estado)>{{ $estado->nombre ?? $estado->estado ?? ('Estado '.$estado->id_estado) }}</option>
								@endforeach
							@endisset
						</select>
					</div>
				<!-- Selector: usuario asignado (opcional) -->
				<div class="mb-3">
					<label for="usuarioAsignado" class="form-label">Usuario asignado</label>
					<select class="form-select custom-input" id="usuarioAsignado" name="id_usuario">
						<option value="" selected>Sin asignar</option>
						@isset($usuarios)
							@foreach($usuarios as $u)
								<option value="{{ $u->id_usuario }}" @selected(old('id_usuario') == $u->id_usuario)>{{ $u->name ?? $u->nombre ?? '' }}</option>
							@endforeach
						@endisset
					</select>
				</div>
				{{-- Si estamos en contexto de proyecto, se envía oculto el id del proyecto --}}
				@if(isset($proyectoActual))
					<input type="hidden" name="id_proyecto" value="{{ $proyectoActual->id_proyecto }}">
				@else
					{{-- En la vista general, se muestra un selector para elegir el proyecto --}}
					<div class="mb-3">
						<label for="proyectoRelacionado" class="form-label">Proyecto</label>
							<select class="form-select custom-input" id="proyectoRelacionado" name="id_proyecto" required>
								<option value="" disabled selected>Selecciona un proyecto</option>
								@isset($proyectos)
									@foreach($proyectos as $proyecto)
										<option value="{{ $proyecto->id_proyecto }}" @selected(old('id_proyecto') == $proyecto->id_proyecto)>{{ $proyecto->nombre }}</option>
									@endforeach
								@endisset
							</select>
						</div>
					@endif
				</div>
				<!-- Footer -->
				<!-- Botones de acción del modal -->
				<div class="modal-footer justify-content-end border-0 gap-2">
					<button type="submit" class="btn-auth btn-pill">CREAR</button>
					<button type="button" class="btn-auth btn-pill bg-danger text-white" data-bs-dismiss="modal">CANCELAR</button>
				</div>
			</form>
		</div>
	</div>
</div>

