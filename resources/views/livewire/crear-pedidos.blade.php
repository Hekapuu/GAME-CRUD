<div>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-dark text-xs font-weight-bolder opacity-9">
                            X: Tiempo<br> (min) </th>
                        <th class="text-dark text-xs font-weight-bolder opacity-9 ps-2">
                            Muestra del<br> incubado(ml)
                        </th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($productos as $index => $producto)
                        <tr>
                            <td class="align-middle text-center text-sm text-center">
                                {{ $producto->nombre_producto }}
                            </td>
                            <td class="align-middle text-center text-sm text-center">
                                {{ $producto->precio }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>



        {{-- @if (Selected_id > 0) --}}
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="mb-4">
                                    Nombre del cliente: <strong>nombre del cliente</strong>
                                </h5>
                                <button type="button" wire:click="doAction(0)"
                                    class="btn btn-outline-secondary btn-rounded btn-icon float-right">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        {{-- @endif --}}
    </div>

</div>
