<!-- Modal para el formulario de nueva aula -->
<div class="modal fade" id="crearAulaModal" tabindex="-1" aria-labelledby="crearAulaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearAulaModalLabel">Agregar un nuevo cliente </h5>
                <button type="button" class="btn-close text-dark display-5" data-bs-dismiss="modal"
                    aria-label="Close">&times;</button>
            </div>

            <div class="modal-body">

                <form action="{{ route('cliente.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label for="nombreAula" class="form-label">Nombre: </label>
                        <input type="text" class="form-control border px-2" id="nombre" name="nombre"
                            placeholder="Ingrese su nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="nombreAula" class="form-label">Apellidos:</label>
                        <input type="text" class="form-control border px-2" id="apellido" name="apellido"
                            placeholder="Ingrese sus apellidos" required>
                    </div>

                    <div class="mb-3">
                        <label for="nombreAula" class="form-label">Correo:</label>
                        <input type="text" class="form-control border px-2" id="correo" name="correo"
                            placeholder="Ingrese correo" required>
                    </div>


                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>

                </form>
            </div>
        </div>
    </div>
</div>
