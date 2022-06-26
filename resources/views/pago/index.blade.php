@extends('layouts.app')

@section('template_title')
Pagos pendientes
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Pago pendientes') }}
                        </span>

                        <div class="float-right">
                            <a href="creates" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Crear Nuevo') }}
                            </a>
                        </div>
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
                                    <th>Factura Path</th>
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
                                    <td><a target="_blank" href="{{('vpagos/'). $pago->pago_path}}">PDF</a></td>
                                    <td><strong>$</strong>{{ $pago->cantidad }}</td>
                                    <td>{{ $pago->moneda }}</td>
                                    <td>{{ $pago->obeservacion }}</td>
                                    <td>{{ $pago->status }}</td>
                                    <td>{{ $pago->obeservacionderev }}</td>


                                    <td>
                                        <form action="{{ route('pagos.destroy',$pago->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('pagos.show',$pago->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> Mostrar</a>
                                            <a class="btn btn-sm btn-success" href="edits/{{$pago->id}}"><i
                                                    class="fa fa-fw fa-edit"></i> Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-fw fa-trash"></i> Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $pagos->links() !!}
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Pago pagados') }}
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

                                    <th>Status</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pagosp as $pago)
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
                                    <td><strong>$</strong>{{ $pago->cantidad }}</td>
                                    <td>{{ $pago->moneda }}</td>

                                    <td>{{ $pago->status }}</td>

                                    <td>
                                        <form action="{{ route('pagos.destroy',$pago->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('pagos.show',$pago->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> Mostrar</a>
                                            <a class="btn btn-sm btn-success" href="edits/{{$pago->id}}"><i
                                                    class="fa fa-fw fa-edit"></i> Editar</a>

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $pagos->links() !!}
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Pagos Cancelados') }}
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

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pagosc as $pago)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $pago->user->name }}</td>
                                    <td>{{ $pago->provedor->nombre }}</td>
                                    <td>{{ $pago->cuenta->cuenta."".$pago->cuenta->observaciones }}</td>
                                    <td>{{ $pago->fecha }}</td>
                                    <td>{{ $pago->referencia }}</td>
                                    <td>{{ $pago->cliente }}</td>
                                    <td>{{ $pago->concepto }}</td>
                                    <td>{{ $pago->bl }}</td>
                                    <td>{{ $pago->contenedor }}</td>
                                    <td>{{ $pago->factura }}</td>
                                    <td><strong>$</strong>{{ $pago->cantidad }}</td>
                                    <td>{{ $pago->moneda }}</td>
                                    <td>{{ $pago->obeservacion }}</td>
                                    <td>{{ $pago->status }}</td>

                                    <td>
                                        <form action="{{ route('pagos.destroy',$pago->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('pagos.show',$pago->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> Mostrar</a>


                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $pagos->links() !!}
        </div>
    </div>
</div>

@endsection