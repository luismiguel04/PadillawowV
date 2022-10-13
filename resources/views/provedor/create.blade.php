@extends('layouts.app')

@section('template_title')
Create Provedor
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title" style="color:#FFFFFF">Crear Proveedor</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('provedors.store') }}" role="form"
                        enctype="multipart/form-data">
                        @csrf

                        @include('provedor.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
