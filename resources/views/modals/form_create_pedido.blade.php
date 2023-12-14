<!-- Modal para el formulario de nuevo pedido -->
<div class="modal fade" id="CreatePedido" role="dialog" tabindex="-1" aria-labelledby="CrearPedidoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CrearPedidoLabel">Agregar nuevo pedido</h5>
        <button type="button" class="btn-close text-dark display-5" data-bs-dismiss="modal"
          aria-label="Close">&times;</button>
      </div>

      <div class="modal-body">

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('pedidos.store') }}" method="post" id="formPedido">

          @csrf

          <div class="mb-3">
            <label for="cliente">Cliente:</label>
            <select name="cliente" id="cliente" class="form-control border px-2" required>
              <option selected class="text-center" disabled>---- Elige una opción -------</option>
              @foreach ($clientes as $key => $cliente)
                <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="fecha_pedido">Fecha del Pedido:</label>
            <input type="date" class="form-control border px-2" id="fecha" name="fecha" required>
          </div>

          <div class="mb-3">
            <label for="productos">Productos:</label>
            <div id="productos-container">
              <!-- Contenedor dinámico para productos -->
              <div class="producto card mb-3 shadow-lg">
                <div class="card-body">
                  <div class="mb-2">
                    <label for="producto">Producto:</label>
                    <select name="producto[]" class="form-control border px-2" required>
                      @foreach ($productos as $key => $producto)
                        <option value="{{ $producto->id_producto }}">
                          {{ $producto->nombre_producto }} - S/.
                          {{ $producto->precio }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-2">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" name="cantidad[]" class="form-control border px-2" required>
                  </div>
                </div>
              </div>
            </div>
            <button type="button" class="btn btn-primary mt-2" onclick="agregarProducto()">Agregar
              Producto</button>
          </div>

          <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="resetForm()">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>

        </form>

        <!-- Plantilla para productos aquí va Livewire -->
        {{-- <livewire:crear-pedidos :pedidos="$pedidos" :productos="$productos" :clientes="$clientes" /> --}}

      </div>
    </div>
  </div>
</div>
</div>

<script>
  function agregarProducto() {
    // Clona el primer elemento del contenedor productos y lo agrega al contenedor
    var nuevoProducto = document.querySelector('#productos-container .producto').cloneNode(true);
    document.getElementById('productos-container').appendChild(nuevoProducto);
  }

  function resetForm() {
    // Limpia el formulario y los productos agregados dinámicamente
    document.getElementById('formPedido').reset();
    document.getElementById('productos-container').innerHTML = '';
  }
</script>
