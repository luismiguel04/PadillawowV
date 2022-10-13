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
                        <span class="card-title" style="color:#FFFFFF">Mostrar Pago</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('pagos.index') }}"> Regresar</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <strong>Usuario</strong>
                                {{ $pago->user->name }}
                            </div>
                            <div class="form-group">
                                <strong>Provedor:</strong>
                                {{ $pago->provedor->nombre }}
                            </div>
                            <div class="form-group">
                                <strong>Cuenta</strong>
                                {{ $pago->cuenta->cuenta }}

                            </div>
                            <div class="form-group">

                                <strong>Observaciones</strong>
                                {{$pago->cuenta->observaciones }}
                            </div>
                            <div class="form-group">

                                <strong>Moneda</strong>
                                {{$pago->cuenta->moneda }}
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
                        </div>
                        <div class="col-md-6">
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
				<slot>$</slot>{{ number_format($pago->cantidad, 2, ".", ",") }}
                            </div>
                            <div class="form-group">
                                <strong>Clave:</strong>
                                {{ $pago->cuenta->clave }}
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header" style="color:#FFFFFF">
                            Solicitud y factura
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <iframe id="container-form"
                                        src="{{('http://138.197.202.215/verpagos/'). $pago->pago_path}}" width="100%"
                                        height="600px"></iframe>


                                </div>
                                <div class="col-md-6">
                                    <iframe id="container-imagen"
                                        src="{{('http://138.197.202.215/verpagos/'). $pago->solicitud_path}}"
                                        width="100%" height="600px"></iframe>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container">
    <div class="main-container">
        <!--         <iframe id="container-form" src="{{('http://138.197.202.215/verpagos/'). $pago->pago_path}}" width="50%" height="50%"></iframe> -->

    </div>
</section>

@endsection
