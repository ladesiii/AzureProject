<!-- Modal Gestionar Usuarios -->
<div class="modal fade" id="modalGestionarUsuarios" tabindex="-1" aria-labelledby="modalGestionarUsuariosLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content custom-modal-create">
      <!-- Header personalizado -->
      <div class="modal-header custom-modal-header">
        <h5 class="modal-title text-white fw-bold mb-0">GESTIONAR USUARIOS</h5>
      </div>

      <!-- Cuerpo -->
      <form id="formGestionarUsuarios" method="POST" action="">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <p class="fw-bold mb-2">Proyecto: <span id="nombreProyectoGestionar"></span></p>
          </div>

          <div class="mb-3">
            <label for="usuarioBusquedaGestionar" class="form-label">Añadir usuarios</label>
            <select class="form-select custom-input" id="usuarioBusquedaGestionar" name="usuario_add">
              <option selected disabled>Selecciona un usuario</option>
              @isset($usuarios)
                @foreach($usuarios as $u)
                  <option value="{{ $u->id }}">{{ $u->name ?? $u->nombre ?? '' }}</option>
                @endforeach
              @endisset
            </select>
          </div>

          <div class="mb-3">
            <label for="usuarioQuitarGestionar" class="form-label">Quitar usuarios</label>
            <select class="form-select custom-input" id="usuarioQuitarGestionar" name="usuario_remove">
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
