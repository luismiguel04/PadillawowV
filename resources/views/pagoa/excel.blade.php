<div class="container-fluid" style="margin-left:50px;">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <img src="app/public/logo2.png">



                    </div>
                </div>

                {{-- <div class="row">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Usuario </th>
                                    <th>Provedor</th>
                                    <th>Cuenta</th>
                                    <th>Fecha</th>
                                    <th>Referencia</th>
                                    <th>Cliente</th>
                                    <th>Concepto</th>
                                    <th>Bl</th>
                                    <th>Contenedor</th>
                                    <th>Factura</th>

                                    <th>Cantidad</th>
                                    <th>Moneda</th>
                                    <th>Obeservacion</th>
                                    <th>Status</th>
                                    <th>Obeservacion de revisión</th>



                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pagos as $pago)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $pago->user->name }}</td>
                                    <td>{{ $pago->provedor->nombre }}</td>
                                    <td>{{ $pago->cuenta->cuenta." ".$pago->cuenta->observaciones }}</td>
                                    <td>{{ $pago->fecha }}</td>
                                    <td>{{ $pago->referencia }}</td>
                                    <td>{{ $pago->cliente }}</td>
                                    <td>{{ $pago->concepto }}</td>
                                    <td>{{ $pago->bl }}</td>
                                    <td>{{ $pago->contenedor }}</td>
                                    <td>{{ $pago->factura }}</td>
                                    <td>
                                        {{ number_format($pago->cantidad, 2, ".", ",") }}
                                    </td>
                                    <td>{{ $pago->cuenta->moneda }}</td>
                                    <td>{{ $pago->obeservacion }}</td>
                                    <td>{{ $pago->status }}</td>
                                    <td>{{ $pago->obeservacionderev }}</td>


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