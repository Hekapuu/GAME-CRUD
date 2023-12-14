@extends('layouts.dashboard')

@section('estilos_especificos')

@section('title', 'Pedidos')
@section('subtittle', 'Pedidos')
@section('navegacion')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="">Pages</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page"> <a href="">Pedidos</a>
        </li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="header-card ms-3 mt-3">
            <h2 class="card-title">Pedidos</h2>
            <div class="mb-4">

                <button type="" class="btn btn-outline-primary float-right" data-bs-toggle="modal"
                    data-bs-target="#CreatePedido">
                    <i class="fas fa-plus-circle"></i>
                    Crear Pedido
                </button>

                @extends('modals.form_create_pedido')

            </div>
        </div>
        <div class="body-card">
            <div class="col-lg-12 mb-md-0 mt-4">
                {{-- Tabla datos iniciales --}}
                <div class="card">
                    <div class="card-body px-4 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0 display " id="myTable">
                                <thead class="table-bordered border-dark">
                                    <tr>
                                        <th scope="col" class="opacity-9">#</th>
                                        <th class="text-center text-dark text-sm font-weight-bolder opacity-7">
                                            Cliente
                                        </th>
                                        <th class="text-center text-dark text-sm font-weight-bolder opacity-7 ps-2">
                                            Fecha
                                        </th>
                                        <th class="text-center text-dark text-sm font-weight-bolder opacity-7 ps-2">
                                            Estado
                                        </th>
                                        <th class="text-center text-dark text-sm font-weight-bolder opacity-7 ps-2">
                                            Productos
                                        </th>
                                        <th class="text-center text-dark text-sm font-weight-bolder opacity-7 ps-2">
                                            ***
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedidos as $pedido)
                                        <tr>
                                            <td class="text-center">{{ $loop->index + 1 }}</td>
                                            <td class="text-center">{{ $pedido->cliente->nombre }}</td>
                                            <td class="text-center">{{ $pedido->fecha->format('d-m-Y') }}</td>
                                            <td class="text-center align-items-center">
                                                <form
                                                    action="{{ route('pedidos.cambiarEstado', ['pedido' => $pedido->id_pedido]) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-{{ $pedido->estado === 'Pendiente'
                                                            ? 'danger'
                                                            : ($pedido->estado === 'En proceso'
                                                                ? 'warning'
                                                                : ($pedido->estado === 'Concluido'
                                                                    ? 'success'
                                                                    : 'primary')) }}"
                                                        onclick="return confirm('¿Estás seguro?')">
                                                        {{ $pedido->estado }}
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-link" data-bs-toggle="collapse"
                                                    data-bs-target="#productosCollapse{{ $loop->index }}">
                                                    Ver más
                                                </button>
                                                <div class="collapse" id="productosCollapse{{ $loop->index }}">
                                                    @foreach ($pedido->productos as $producto)
                                                        {{ $producto->nombre_producto }} (Cantidad:
                                                        {{ $producto->pivot->cantidad }}),
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td class="align-middle text-sm text-center">
                                                <div class="d-flex justify-content-center">
                                                    {{-- EDITAR --}}
                                                    <div class="col-xs-6 col-md-auto">
                                                        <a href="{{ route('pedidos.edit', $pedido) }}"
                                                            class="btn btn-warning">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                                        </a>
                                                    </div>

                                                    <div class="col-xs-6 col-md-auto ms-2">
                                                        <a type="button" class="btn btn-danger ml-2"
                                                            href="{{ route('pedidos.destroy', $pedido) }}"
                                                            data-confirm-delete="true">
                                                            <i class="fa fa-times" aria-hidden="true"></i>
                                                        </a>

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
            </div>
        </div>
    </div>


@endsection
