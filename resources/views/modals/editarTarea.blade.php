<!-- Modal Editar Tarea -->
<div class="modal fade" id="modalEditarTarea{{ $tarea->id_tarea }}" tabindex="-1" aria-labelledby="modalEditarTareaLabel{{ $tarea->id_tarea }}" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content custom-modal-create">
			<!-- Header -->
			<div class="modal-header custom-modal-header">
				<h5 class="modal-title text-white fw-bold mb-0" id="modalEditarTareaLabel{{ $tarea->id_tarea }}">EDITAR TAREA</h5>
			</div>
			<!-- Body -->
			<form method="POST" action="{{ route('tareas.update', $tarea->id_tarea) }}">
				@csrf
				@method('PUT')
				<div class="modal-body">
					<div class="mb-3">
						<label for="editarNombreTarea{{ $tarea->id_tarea }}" class="form-label">Nombre de la tarea</label>
						<input type="text" class="form-control custom-input" id="editarNombreTarea{{ $tarea->id_tarea }}" name="nombre" placeholder="Ej. Diseñar mockups" value="{{ old('nombre', $tarea->nombre) }}" required>
					</div>
					<div class="mb-3">
						<label for="editarDescripcionTarea{{ $tarea->id_tarea }}" class="form-label">Descripción</label>
						<textarea class="form-control custom-input" id="editarDescripcionTarea{{ $tarea->id_tarea }}" name="descripcion" rows="3" placeholder="Detalles de la tarea" required>{{ old('descripcion', $tarea->descripcion) }}</textarea>
					</div>
					<div class="mb-3">
						<label for="editarTipoTarea{{ $tarea->id_tarea }}" class="form-label">Tipo de tarea</label>
						<select class="form-select custom-input" id="editarTipoTarea{{ $tarea->id_tarea }}" name="id_tipo" required>
							<option disabled>Selecciona un tipo</option>
							@isset($tiposTarea)
								@foreach($tiposTarea as $tipo)
									<option value="{{ $tipo->id_tipo }}" @selected(old('id_tipo', $tarea->id_tipo) == $tipo->id_tipo)>{{ $tipo->nombre ?? $tipo->tipo ?? '' }}</option>
								@endforeach
							@endisset
						</select>
					</div>
					<div class="row g-3">
						<div class="col-12 col-md-6 mb-3">
							<label for="editarFechaInicio{{ $tarea->id_tarea }}" class="form-label">Fecha de inicio</label>
							<input type="date" class="form-control custom-input" id="editarFechaInicio{{ $tarea->id_tarea }}" name="fecha_inicio" value="{{ old('fecha_inicio', optional($tarea->fecha_inicio)->format('Y-m-d')) }}" required>
						</div>
						<div class="col-12 col-md-6 mb-3">
							<label for="editarFechaFinal{{ $tarea->id_tarea }}" class="form-label">Fecha fin</label>
							<input type="date" class="form-control custom-input" id="editarFechaFinal{{ $tarea->id_tarea }}" name="fecha_final" value="{{ old('fecha_final', optional($tarea->fecha_final)->format('Y-m-d')) }}" required>
						</div>
					</div>
					<div class="mb-3">
						<label for="editarEstadoTarea{{ $tarea->id_tarea }}" class="form-label">Estado</label>
						<select class="form-select custom-input" id="editarEstadoTarea{{ $tarea->id_tarea }}" name="id_estado" required>
							<option disabled>Selecciona un estado</option>
							@isset($estados)
								@foreach($estados as $estado)
									<option value="{{ $estado->id_estado }}" @selected(old('id_estado', $tarea->id_estado) == $estado->id_estado)>{{ $estado->nombre ?? $estado->estado ?? ('Estado '.$estado->id_estado) }}</option>
								@endforeach
							@endisset
						</select>
					</div>
					<div class="mb-3">
						<label for="editarUsuarioAsignado{{ $tarea->id_tarea }}" class="form-label">Usuario asignado</label>
						<select class="form-select custom-input" id="editarUsuarioAsignado{{ $tarea->id_tarea }}" name="id_usuario" required>
							<option disabled>Selecciona un usuario</option>
							@isset($usuarios)
								@foreach($usuarios as $u)
									<option value="{{ $u->id_usuario }}" @selected(old('id_usuario', $tarea->id_usuario) == $u->id_usuario)>{{ $u->name ?? $u->nombre ?? '' }}</option>
								@endforeach
							@endisset
						</select>
					</div>
				</div>
				<!-- Footer -->
				<div class="modal-footer justify-content-end border-0 gap-2">
					<button type="submit" class="btn-auth btn-pill">GUARDAR</button>
					<button type="button" class="btn-auth btn-pill bg-danger text-white" data-bs-dismiss="modal">CANCELAR</button>
				</div>
			</form>
		</div>
	</div>
</div>
