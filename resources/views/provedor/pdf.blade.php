<div class="container-fluid" style="margin: left 30px;">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            <img src="http://192.168.1.67/padillawow/public/app/public/logo2.png"
                                style="text-align: center" />


                            <h2 style="text-align: center">
                                {{ __('Provedores Padillawow') }}
                            </h2>
                        </span>


                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>Usuario</th>
                                    <th>No Provedor</th>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>Status</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($provedors as $provedor)


                                <tr>
                                    <td>{{ $provedor->user->name }}</td>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $provedor->nombre }}</td>
                                    <td>{{ $provedor->direccion }}</td>
                                    <td>{{ $provedor->status }}</td>


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