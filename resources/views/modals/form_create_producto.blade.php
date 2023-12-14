<!-- Modal para el formulario de nueva aula -->
<div class="modal fade" id="crearAulaModal" tabindex="-1" aria-labelledby="crearAulaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearAulaModalLabel">Agregar nuevo producto</h5>
                <button type="button" class="btn-close text-dark display-5" data-bs-dismiss="modal"
                    aria-label="Close">&times;</button>
            </div>

            <div class="modal-body">
                {{--  --}}
                <form action="{{ route('producto.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label for="nombre_producto" class="form-label">Nombre del producto: </label>
                        <input type="text" class="form-control border px-2" id="nombre_producto"
                            name="nombre_producto" placeholder="Ingrese nombre del producto" required>
                    </div>

                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio:</label>
                        <input type="number" step="any" class="form-control border px-2" id="precio"
                            name="precio" placeholder="Ingrese precio" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock:</label>
                        <input type="number" class="form-control border px-2" id="stock" name="stock"
                            placeholder="Ingrese stock" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="stock_minimo" class="form-label">Stock mínimo:</label>
                        <input type="number" class="form-control border px-2" id="stock_minimo" name="stock_minimo"
                            placeholder="Ingrese stock mínimo" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descrición:</label>
                        <input type="texto" class="form-control border px-2" id="descripcion" name="descripcion"
                            placeholder="Descripción / notas" min="0">
                    </div>


                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>

                </form>
            </div>
        </div>
    </div>
</div>
