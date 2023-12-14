@extends('layouts.dashboard')

@section('estilos_especificos')

@section('title', 'Editar Pedido')
@section('subtittle', 'Editar')


@section('content')
    <div class="container">

        <div class="col-lg-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="modal-title" id="crearAulaModalLabel">Editar Pedido</h5>
                    <a href="{{ route('pedidos.index') }}"
                        class="btn-close text-dark display-5 position-absolute top-0 end-0 mt-2 me-2"
                        aria-label="Close">&times;</a>
                </div>
                <div class="card-body px-0 m-4 pb-2">

                    <form action="{{ route('pedidos.update', $pedido) }}" method="post" id="formPedido">

                        @csrf

                        @method('put')

                        <div class="mb-3">
                            <label for="cliente">Cliente:</label>
                            <input type="text" value="{{ $pedido->cliente->nombre }}">
                            <select name="cliente" id="cliente" class="form-control border px-2" required>
                                <option value="{{ $pedido->cliente->id_cliente }}" selected>{{ $pedido->cliente->nombre }}
                                </option>
                                @foreach ($clientes as $cliente)
                                    @if ($cliente->id_cliente !== $pedido->cliente->id_cliente)
                                        <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_pedido">Fecha del Pedido:</label>
                            <input type="date" class="form-control border px-2" id="fecha" name="fecha"
                                value="{{ $pedido->fecha->format('Y-m-d') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="productos">Productos:</label>
                            <div id="productos-container">
                                @foreach ($detallesPedido as $detalle)
                                    <div class="producto card mb-3 shadow-lg">
                                        <div class="card-body">
                                            <div class="mb-2">
                                                <label for="producto">Producto: {{ $loop->index + 1 }}</label>
                                                <select name="producto[]" class="form-control border px-2" required>
                                                    @foreach ($productos as $producto)
                                                        <option value="{{ $producto->id_producto }}"
                                                            {{ $producto->id_producto == $detalle->producto_id ? 'selected' : '' }}>
                                                            {{ $producto->nombre_producto }} - S/. {{ $producto->precio }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-2">
                                                <label for="cantidad">Cantidad:</label>
                                                <input type="number" name="cantidad[]" class="form-control border px-2"
                                                    required value="{{ $detalle->cantidad }}">
                                            </div>
                                            <button type="button" class="btn btn-danger mt-2"
                                                onclick="eliminarProducto(this)">Eliminar Producto</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-primary mt-2" onclick="agregarProducto()">Agregar
                                Producto</button>
                        </div>

                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal"
                            onclick="resetForm()">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>

                    </form>
                </div>

            </div>
        </div>

    </div>

    <script>
        function confirmarGuardar() {
            return confirm('¿Estás seguro de actualizar cambios?');
        }
    </script>

    <script>
        function eliminarProducto(btn) {
            // Elimina el contenedor del producto al que pertenece el botón
            var productoContainer = btn.closest('.producto');
            productoContainer.parentNode.removeChild(productoContainer);
        }
    </script>
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


@endsection
