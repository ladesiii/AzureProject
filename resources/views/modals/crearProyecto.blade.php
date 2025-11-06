<!-- Modal Crear Proyecto -->
<div class="modal fade" id="modalCrearProyecto" tabindex="-1" aria-labelledby="modalCrearProyectoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content custom-modal-create">
      <!-- Header personalizado -->
      <div class="modal-header custom-modal-header">
        <h5 class="modal-title text-white fw-bold mb-0">CREAR PROYECTO</h5>
      </div>

      <!-- Cuerpo -->
      <form id="formCrearProyecto" method="POST" action="">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="nombreProyecto" class="form-label">Nombre del proyecto</label>
            <input type="text" class="form-control custom-input" id="nombreProyecto" name="nombre" placeholder="Ej. Nuevo CRM" required>
          </div>

          <div class="mb-3">
            <label for="usuarioBusqueda" class="form-label">Añadir usuarios</label>
            <select class="form-select custom-input" id="usuarioBusqueda" name="usuario">
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

