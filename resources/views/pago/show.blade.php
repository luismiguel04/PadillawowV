@extends('layouts.app')

@section('template_title')
{{ $pago->name ?? 'Show Pago' }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Mostrar Pago</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('pagos.index') }}"> Regresar</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Usuario</strong>
                        {{ $pago->user->name }}
                    </div>
                    <div class="form-group">
                        <strong>Provedor Id:</strong>
                        {{ $pago->provedor->nombre }}
                    </div>
                    <div class="form-group">
                        <strong>Cuenta</strong>
                        {{ $pago->cuenta->cuenta }}
                        <strong>Observaciones</strong>
                        {{$pago->cuenta->observaciones }}
                    </div>
                    <div class="form-group">
                        <strong>Fecha:</strong>
                        {{ $pago->fecha }}
                    </div>
                    <div class="form-group">
                        <strong>Referencia:</strong>
                        {{ $pago->referencia }}
                    </div>
                    <div class="form-group">
                        <strong>Cliente:</strong>
                        {{ $pago->cliente }}
                    </div>
                    <div class="form-group">
                        <strong>Concepto:</strong>
                        {{ $pago->concepto }}
                    </div>
                    <div class="form-group">
                        <strong>Bl:</strong>
                        {{ $pago->bl }}
                    </div>
                    <div class="form-group">
                        <strong>Contenedor:</strong>
                        {{ $pago->contenedor }}
                    </div>
                    <div class="form-group">
                        <strong>Factura:</strong>
                        {{ $pago->factura }}
                    </div>
                    <div class="form-group">
                        <strong>Cantidad:</strong>
                        {{ $pago->cantidad }}
                    </div>
                    <div class="form-group">
                        <strong>Moneda:</strong>
                        {{ $pago->moneda }}
                    </div>
                    <div class="form-group">
                        <strong>Obeservacion:</strong>
                        {{ $pago->obeservacion }}
                    </div>

                    <div class="form-group">
                        <strong>Status:</strong>
                        {{ $pago->status }}
                    </div>
                    <div class="form-group">
                        <strong>obeservacion de revisión:</strong>
                        {{ $pago->obeservacionderev }}
                    </div>
                    <iframe src="{{('http://localhost/padillawow/public/vpagos/'). $pago->pago_path}}" width="100%"
                        height="800px">

                </div>
            </div>
        </div>
    </div>
</section>
@endsection