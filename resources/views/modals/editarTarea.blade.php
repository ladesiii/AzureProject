{{-- <!-- Modal Editar Tarea -->
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
					<input type="hidden" id="editarTareaId" name="tarea_id" value="">

					<div class="mb-3">
						<label for="editarNombreTarea" class="form-label">Nombre de la tarea</label>
						<input type="text" class="form-control custom-input" id="editarNombreTarea" name="nombre" placeholder="Ej. Diseñar mockups" value="" required>
					</div>

					<div class="mb-3">
						<label for="editarDescripcionTarea" class="form-label">Descripción</label>
						<textarea class="form-control custom-input" id="editarDescripcionTarea" name="descripcion" rows="3" placeholder="Detalles de la tarea" required></textarea>
					</div>

					<div class="mb-3">
						<label for="editarTipoTarea" class="form-label">Tipo de tarea</label>
						<select class="form-select custom-input" id="editarTipoTarea" name="id_tipo" required>
							<option disabled selected>Selecciona un tipo</option>
							@isset($tiposTarea)
								@foreach($tiposTarea as $tipo)
									<option value="{{ $tipo->id_tipo }}">
										{{ $tipo->nombre ?? $tipo->tipo ?? '' }}
									</option>
								@endforeach
							@endisset
						</select>
					</div>

					<div class="row g-3">
						<div class="col-12 col-md-6 mb-3">
							<label for="editarFechaInicio" class="form-label">Fecha de inicio</label>
							<input type="date" class="form-control custom-input" id="editarFechaInicio" name="fecha_inicio" value="" required>
						</div>
						<div class="col-12 col-md-6 mb-3">
							<label for="editarFechaFinal" class="form-label">Fecha fin</label>
							<input type="date" class="form-control custom-input" id="editarFechaFinal" name="fecha_final" value="" required>
						</div>
					</div>
					<div class="mb-3">
						<label for="editarEstadoTarea" class="form-label">Estado</label>
						<select class="form-select custom-input" id="editarEstadoTarea" name="id_estado" required>
							<option disabled selected>Selecciona un estado</option>
							@isset($estados)
								@foreach($estados as $estado)
									<option value="{{ $estado->id_estado }}">{{ $estado->nombre ?? $estado->estado ?? ('Estado '.$estado->id_estado) }}</option>
								@endforeach
							@endisset
						</select>
					</div>

					<div class="mb-3">
						<label for="editarUsuarioAsignado" class="form-label">Usuario asignado</label>
						<select class="form-select custom-input" id="editarUsuarioAsignado" name="id_usuario" required>
							<option disabled selected>Selecciona un usuario</option>
							@isset($usuarios)
								@foreach($usuarios as $u)
									<option value="{{ $u->id_usuario }}">
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
 --}}
