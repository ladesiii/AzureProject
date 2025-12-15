<!-- Modal Eliminar Proyecto -->
<div class="modal fade" id="modalEliminarProyecto" tabindex="-1" aria-labelledby="modalEliminarProyectoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content custom-modal-create">
      <!-- Header personalizado -->
      <div class="modal-header custom-modal-header">
        <h5 class="modal-title text-white fw-bold mb-0">ELIMINAR PROYECTO</h5>
      </div>

      <!-- Cuerpo -->
      <!-- CAMBIO: La action se rellenará dinámicamente desde JS usando data-action del botón -->
      <form id="formEliminarProyecto" method="POST" action="#">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          <p class="text-center mb-4" style="font-size: 1.1rem;">
            ¿Estás seguro que quieres eliminar el proyecto<strong id="nombreProyectoEliminar"></strong>?
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

