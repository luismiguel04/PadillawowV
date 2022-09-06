@extends('layouts.app')

@section('template_title')
Editar Provedor
@endsection

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title" style="color:#FFFFFF">Editar Provedor</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('provedors.update', $provedor->id) }}" role="form"
                        enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('provedor.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection