@extends('layouts.app')

@section('template_title')
Update Cuenta
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title" style="color:#FFFFFF">Editar Cuenta</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('cuentas.update', $cuenta->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('cuenta.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection