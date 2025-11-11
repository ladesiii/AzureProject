<!-- Modal Crear Tarea -->
<div class="modal fade" id="modalCrearTarea" tabindex="-1" aria-labelledby="modalCrearTareaLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content custom-modal-create">
			<!-- Header -->
			<div class="modal-header custom-modal-header">
				<h5 class="modal-title text-white fw-bold mb-0" id="modalCrearTareaLabel">CREAR TAREA</h5>
			</div>
			<!-- Body -->
			<form id="formCrearTarea" method="POST" action="">
				@csrf
				<div class="modal-body">
					<div class="mb-3">
						<label for="nombreTarea" class="form-label">Nombre de la tarea</label>
						<input type="text" class="form-control custom-input" id="nombreTarea" name="nombre" placeholder="Ej. Diseñar mockups" required>
					</div>
					<div class="mb-3">
						<label for="descripcionTarea" class="form-label">Descripción</label>
						<textarea class="form-control custom-input" id="descripcionTarea" name="descripcion" rows="3" placeholder="Detalles de la tarea" required></textarea>
					</div>
					<div class="mb-3">
						<label for="tipoTarea" class="form-label">Tipo de tarea</label>
						<select class="form-select custom-input" id="tipoTarea" name="tipo_tarea" required>
							<option selected disabled>Selecciona un tipo</option>
							@isset($tiposTarea)
								@foreach($tiposTarea as $tipo)
									<option value="{{ $tipo->id }}">{{ $tipo->nombre ?? $tipo->tipo ?? '' }}</option>
								@endforeach
							@endisset
						</select>
					</div>
					<div class="row g-3">
						<div class="col-12 col-md-6 mb-3">
							<label for="fechaInicio" class="form-label">Fecha de inicio</label>
							<input type="date" class="form-control custom-input" id="fechaInicio" name="fecha_inicio" required>
						</div>
						<div class="col-12 col-md-6 mb-3">
							<label for="fechaFin" class="form-label">Fecha fin</label>
							<input type="date" class="form-control custom-input" id="fechaFin" name="fecha_fin" required>
						</div>
					</div>
					<div class="mb-3">
						<label for="usuarioAsignado" class="form-label">Usuario asignado</label>
						<select class="form-select custom-input" id="usuarioAsignado" name="usuario_id" required>
							<option selected disabled>Selecciona un usuario</option>
							@isset($usuarios)
								@foreach($usuarios as $u)
									<option value="{{ $u->id }}">{{ $u->name ?? $u->nombre ?? '' }}</option>
								@endforeach
							@endisset
						</select>
					</div>
				</div>
				<!-- Footer -->
				<div class="modal-footer justify-content-end border-0 gap-2">
					<button type="submit" class="btn-auth btn-pill">CREAR</button>
					<button type="button" class="btn-auth btn-pill bg-danger text-white" data-bs-dismiss="modal">CANCELAR</button>
				</div>
			</form>
		</div>
	</div>
</div>

