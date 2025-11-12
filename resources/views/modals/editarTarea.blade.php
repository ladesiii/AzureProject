<!-- Modal Editar Tarea -->
<div class="modal fade" id="modalEditarTarea" tabindex="-1" aria-labelledby="modalEditarTareaLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content custom-modal-create">
			<!-- Header -->
			<div class="modal-header custom-modal-header">
				<h5 class="modal-title text-white fw-bold mb-0" id="modalEditarTareaLabel">EDITAR TAREA</h5>
			</div>
			<!-- Body -->
			<form id="formEditarTarea" method="POST" action="">
				@csrf
				@method('PUT')
				<div class="modal-body">
					<input type="hidden" id="editarTareaId" name="tarea_id" value="{{ $tarea->id ?? '' }}">

					<div class="mb-3">
						<label for="editarNombreTarea" class="form-label">Nombre de la tarea</label>
						<input type="text" class="form-control custom-input" id="editarNombreTarea" name="nombre" placeholder="Ej. Diseñar mockups" value="{{ old('nombre', $tarea->nombre ?? '') }}" required>
					</div>

					<div class="mb-3">
						<label for="editarDescripcionTarea" class="form-label">Descripción</label>
						<textarea class="form-control custom-input" id="editarDescripcionTarea" name="descripcion" rows="3" placeholder="Detalles de la tarea" required>{{ old('descripcion', $tarea->descripcion ?? '') }}</textarea>
					</div>

					<div class="mb-3">
						<label for="editarTipoTarea" class="form-label">Tipo de tarea</label>
						<select class="form-select custom-input" id="editarTipoTarea" name="tipo_tarea" required>
							<option disabled {{ isset($tarea) ? '' : 'selected' }}>Selecciona un tipo</option>
							@isset($tiposTarea)
								@foreach($tiposTarea as $tipo)
									<option value="{{ $tipo->id }}"
										@if(isset($tarea) && (($tarea->tipo_tarea_id ?? $tarea->tipo_tarea ?? null) == $tipo->id)) selected @endif>
										{{ $tipo->nombre ?? $tipo->tipo ?? '' }}
									</option>
								@endforeach
							@endisset
						</select>
					</div>

					<div class="row g-3">
						<div class="col-12 col-md-6 mb-3">
							<label for="editarFechaInicio" class="form-label">Fecha de inicio</label>
							<input type="date" class="form-control custom-input" id="editarFechaInicio" name="fecha_inicio" value="{{ old('fecha_inicio', isset($tarea->fecha_inicio) ? \Illuminate\Support\Carbon::parse($tarea->fecha_inicio)->format('Y-m-d') : '') }}" required>
						</div>
						<div class="col-12 col-md-6 mb-3">
							<label for="editarFechaFin" class="form-label">Fecha fin</label>
							<input type="date" class="form-control custom-input" id="editarFechaFin" name="fecha_fin" value="{{ old('fecha_fin', isset($tarea->fecha_fin) ? \Illuminate\Support\Carbon::parse($tarea->fecha_fin)->format('Y-m-d') : '') }}" required>
						</div>
					</div>

					<div class="mb-3">
						<label for="editarUsuarioAsignado" class="form-label">Usuario asignado</label>
						<select class="form-select custom-input" id="editarUsuarioAsignado" name="usuario_id" required>
							<option disabled {{ isset($tarea) ? '' : 'selected' }}>Selecciona un usuario</option>
							@isset($usuarios)
								@foreach($usuarios as $u)
									<option value="{{ $u->id }}"
										@if(isset($tarea) && (($tarea->usuario_id ?? $tarea->user_id ?? null) == $u->id)) selected @endif>
										{{ $u->name ?? $u->nombre ?? '' }}
									</option>
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

