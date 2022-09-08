@extends('layouts.app')

@section('template_title')
Update Pago
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title" style="color:#FFFFFF">Editar Pago</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pagos.update', $pago->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('pago.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
</section>

<script>
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    document.getElementById('provedor_id').addEventListener('change', (e) => {
        fetch('rcuentass', {
            method: 'POST',
            body: JSON.stringify({
                texto: e.target.value
            }),
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response => {
            return response.json()
        }).then(data => {
            var opciones = "<option value=''>Elegir</option>";
            for (let i in data.lista) {
                opciones += '<option value="' + data.lista[i].id + '">' + "Banco " + data.lista[i].banco +
                    " Moneda " + data.lista[i].moneda +
                    " Cuenta:" + data.lista[
                        i]
                    .cuenta + " Observaciones: " + data
                    .lista[i].observaciones + '</option>';
            }
            document.getElementById("cuenta_id").innerHTML = opciones;
        }).catch(error => console.error(error));
    })
</script>
@endsection