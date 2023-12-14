@extends('layouts.dashboard')

@section('estilos_especificos')

@section('title', 'Cliente')
@section('subtittle', 'Cliente')
@section('navegacion')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="">Pages</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page"> <a href="">Cliente</a>
        </li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <div class="col-lg-12 mb-md-3 mb-4">
            <div class="card">

                {{-- Titulo y boton:crear-cliente --}}
                <div class="header-card ms-3 mt-3">
                    {{-- {{ route('cliente.create') }} --}}
                    <h2 class="h2 text-dark d-inline-block">Clientes</h2>
                    <div class="mb-4">
                        <a href="" class="btn btn-outline-primary float-right" data-bs-toggle="modal"
                            data-bs-target="#crearAulaModal"><i class="fas fa-plus-circle"></i>
                            Crear Cliente</a>
                    </div>
                    @extends('modals.form_create_cliente')
                </div>

                <div class="body-card">
                    <div class="col-lg-12 mb-md-0 mt-4">
                        {{-- Tabla datos iniciales --}}
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="col-lg-6 col-7">
                                    <h5>Registro de clientes:</h5>
                                </div>
                            </div>
                            {{-- px-0  --}}
                            <div class="card-body px-4 pb-2">
                                <div class="table-responsive">
                                    <table class="table align-items-center display" data-toggle="table" id="myTable">
                                        <thead class="table-bordered border-dark">
                                            <tr>
                                                <th scope="col " class="opacity-9">#</th>
                                                <th class="text-center text-dark text-sm font-weight-bolder opacity-7">
                                                    {{-- text-uppercase --}}
                                                    Nombre</th>
                                                <th class="text-center text-dark text-sm font-weight-bolder opacity-7 ps-2">
                                                    Apellido</th>
                                                <th class="text-center text-dark text-sm font-weight-bolder opacity-7">
                                                    Correo</th>
                                                <th class="text-center text-dark text-sm font-weight-bolder opacity-7">
                                                    *</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clientes as $cliente)
                                                <tr>
                                                    {{--  --}}
                                                    <th scope="row" class="text-center">{{ $loop->index + 1 }}</th>
                                                    <td class="align-middle text-sm text-center ">
                                                        {{ $cliente->nombre }}
                                                    </td>

                                                    <td class="align-middle text-sm text-center">
                                                        {{ $cliente->apellido }}
                                                    </td>
                                                    <td class="align-middle text-sm text-center">
                                                        {{ $cliente->correo }}
                                                    </td>
                                                    <td class="align-middle text-sm text-center">
                                                        <div class="d-flex justify-content-center">
                                                            {{-- EDITAR --}}
                                                            <div class="col-xs-6 col-md-auto">
                                                                <a href="{{ route('cliente.edit', $cliente) }}"
                                                                    class="btn btn-warning">
                                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                                </a>
                                                            </div>

                                                            <div class="col-xs-6 col-md-auto ms-2">
                                                                {{-- DELETE --}}
                                                                <form action="{{ route('cliente.destroy', $cliente) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-danger ml-2"
                                                                        onclick="return confirmarEliminar()"
                                                                        aria-label="Close">
                                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                                    </button>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        {{-- Tablas de incubacion, calibracion y cinetica --}}
                        {{-- <livewire:calculator :experimento="$experimento" :incubaciones="$incubaciones" :cineticas="$cineticas" :calibraciones="$calibraciones"
                            :resultado="$resultado" /> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    <script>
        function confirmarEliminar() {
            return confirm('¿Estás seguro de eliminar este cliente?');
        }
    </script>
@endsection
