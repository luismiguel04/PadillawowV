@extends('layouts.app')

@section('template_title')
    Create Cuenta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title" style="color:#FFFFFF">Crear Cuenta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cuentas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('cuenta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
