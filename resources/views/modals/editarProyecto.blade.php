<!-- Modal Editar Proyecto -->
<div class="modal fade" id="modalEditarProyecto" tabindex="-1" aria-labelledby="modalEditarProyectoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content custom-modal-create">
      <!-- Header personalizado -->
      <div class="modal-header custom-modal-header">
        <h5 class="modal-title text-white fw-bold mb-0">EDITAR PROYECTO</h5>
      </div>

      <!-- Cuerpo -->
      <form id="formEditarProyecto" method="POST" action="">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label for="nombreProyectoEdit" class="form-label">Nombre del proyecto</label>
            <input type="text" class="form-control custom-input" id="nombreProyectoEdit" name="nombre" placeholder="Ej. Nuevo CRM" required>
          </div>

          <div class="mb-3">
            <label for="usuarioBusquedaEdit" class="form-label">Añadir usuarios</label>
            <select class="form-select custom-input" id="usuarioBusquedaEdit" name="usuario_add">
              <option selected disabled>Selecciona un usuario</option>
              @isset($usuarios)
                @foreach($usuarios as $u)
                  <option value="{{ $u->id }}">{{ $u->name ?? $u->nombre ?? '' }}</option>
                @endforeach
              @endisset
            </select>
          </div>

          <div class="mb-3">
            <label for="usuarioQuitarEdit" class="form-label">Quitar usuarios</label>
            <select class="form-select custom-input" id="usuarioQuitarEdit" name="usuario_remove">
              <option selected disabled>Selecciona un usuario</option>
              @isset($usuariosProyecto)
                @foreach($usuariosProyecto as $u)
                  <option value="{{ $u->id }}">{{ $u->name ?? $u->nombre ?? '' }}</option>
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
