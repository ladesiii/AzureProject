<!-- Modal Eliminar Tarea -->
<div class="modal fade" id="modalEliminarTarea" tabindex="-1" aria-labelledby="modalEliminarTareaLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content custom-modal-create">
			<!-- Header personalizado -->
			<div class="modal-header custom-modal-header">
				<h5 class="modal-title text-white fw-bold mb-0" id="modalEliminarTareaLabel">ELIMINAR TAREA</h5>
			</div>

			<!-- Cuerpo -->
			<form id="formEliminarTarea" method="POST" action="">
				@csrf
				@method('DELETE')
				<input type="hidden" name="tarea_id" id="eliminarTareaId" value="{{ $tarea->id ?? '' }}">
				<div class="modal-body">
					<p class="text-center mb-4" style="font-size: 1.1rem;">
						¿Estás seguro que quieres eliminar la tarea <strong id="nombreTareaEliminar">{{ $tarea->nombre ?? '' }}</strong>?
					</p>
				</div>

				<!-- Footer -->
				<div class="modal-footer justify-content-end border-0 gap-2">
					<button type="submit" class="btn-auth btn-pill bg-danger text-white">ELIMINAR</button>
					<button type="button" class="btn-auth btn-pill" data-bs-dismiss="modal">CANCELAR</button>
				</div>
			</form>
		</div>
	</div>
</div>

