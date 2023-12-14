@extends('layouts.dashboard')

@section('estilos_especificos')

@section('title', 'Editar Cliente')
@section('subtittle', 'Editar')


@section('content')
    <div class="container">

        <div class="col-lg-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="modal-title" id="crearAulaModalLabel">Editar Cliente</h5>
                    <a href="{{ route('cliente.show') }}"
                        class="btn-close text-dark display-5 position-absolute top-0 end-0 mt-2 me-2"
                        aria-label="Close">&times;</a>
                </div>
                <div class="card-body px-0 m-4 pb-2">

                    <form action="{{ route('cliente.update', $cliente) }}" method="POST">

                        @csrf

                        @method('put')

                        <div class="mb-3">
                            <label for="nombreAula" class="form-label">Nombre del cliente:</label>
                            <input type="text" class="form-control border px-2" id="nombre" name="nombre"
                                value="{{ $cliente->nombre }}" placeholder="Ingrese el nombre del aula" required>
                        </div>

                        <div class="mb-3">
                            <label for="nombreAula" class="form-label">Apellido del cliente:</label>
                            <input type="text" class="form-control border px-2" id="apellido" name="apellido"
                                value="{{ $cliente->apellido }}" placeholder="Carrera" required>
                        </div>

                        <div class="mb-3">
                            <label for="nombreAula" class="form-label">Correo:</label>
                            <input type="text" class="form-control border px-2" id="correo" name="correo"
                                value="{{ $cliente->correo }}" placeholder="Ingrese código de aula" required>
                        </div>

                        <div class="">
                            <a href="{{ route('cliente.show') }}" class="btn btn-dark">
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
