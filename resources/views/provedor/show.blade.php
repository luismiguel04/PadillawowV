@extends('layouts.app')

@section('template_title')
{{ $provedor->name ?? 'Show Provedor' }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title" style="color:#FFFFFF">Mostrando Provedor</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('provedors.index') }}"> Regresar</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Usuario:</strong>
                        {{ $provedor->user->name }}
                    </div>
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $provedor->nombre }}
                    </div>
                    <div class="form-group">
                        <strong>Dirección:</strong>
                        {{ $provedor->direccion }}
                    </div>
                    <div class="form-group">
                        <strong>Status:</strong>
                        {{ $provedor->status }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection