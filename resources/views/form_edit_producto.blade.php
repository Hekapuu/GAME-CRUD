@extends('layouts.dashboard')

@section('estilos_especificos')

@section('title', 'Editar Producto')
@section('subtittle', 'Editar')


@section('content')
    <div class="container">

        <div class="col-lg-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="modal-title" id="crearAulaModalLabel">Editar Producto</h5>
                    <a href="{{ route('producto.show') }}"
                        class="btn-close text-dark display-5 position-absolute top-0 end-0 mt-2 me-2"
                        aria-label="Close">&times;</a>
                </div>
                <div class="card-body px-0 m-4 pb-2">

                    <form action="{{ route('producto.update', $producto) }}" method="POST">

                        @csrf

                        @method('put')

                        <div class="mb-3">
                            <label for="" class="form-label">Nombre del producto:</label>
                            <input type="text" class="form-control border px-2" id="nombre_producto"
                                name="nombre_producto" value="{{ $producto->nombre_producto }}"
                                placeholder="Ingrese el nombre del producto" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Descripción del producto:</label>
                            <input type="text" class="form-control border px-2" id="descripcion" name="descripcion"
                                value="{{ $producto->descripcion }}" placeholder="Ingrese descripción" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Precio:</label>
                            <input type="number" step="any" class="form-control border px-2" id="precio"
                                name="precio" value="{{ $producto->precio }}" placeholder="Precio" min="0" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Stock:</label>
                            <input type="number" class="form-control border px-2" id="stock" name="stock"
                                value="{{ $producto->stock }}" placeholder="Ingrese stock" min="0" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Stock mínimo:</label>
                            <input type="number" class="form-control border px-2" id="stock_minimo" name="stock_minimo"
                                value="{{ $producto->stock_minimo }}" placeholder="Ingrese stock mínimo" min="0"
                                required>
                        </div>

                        <div class="">
                            <a href="{{ route('producto.show') }}" class="btn btn-dark">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary" data-confirm-delete="true"
                                onclick="return confirmarGuardar()">Guardar</button>
                        </div>


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


@endsection
