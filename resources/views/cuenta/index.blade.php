@extends('layouts.app')

@section('template_title')
Cuenta
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title" style="color:#FFFFFF">
                            {{ __('Cuenta') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('cuentas.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                {{ __('Crear Nueva') }}
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

                                    <th>Usuario</th>
                                    <th>Provedor</th>
                                    <th>Banco</th>
                                    <th>Sucursal</th>
                                    <th>Dirección</th>
                                    <th>Cuenta</th>
                                    <th>Clave</th>
                                    <th>Swifts</th>
                                    <th>Aba</th>
                                    <th>Moneda</th>
                                    <th>Observaciones</th>
                                    <th>Status</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cuentas as $cuenta)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $cuenta->user->name }}</td>
                                    <td>{{ $cuenta->provedor->nombre }}</td>
                                    <td>{{ $cuenta->banco }}</td>
                                    <td>{{ $cuenta->sucursal }}</td>
                                    <td>{{ $cuenta->direccion }}</td>
                                    <td>{{ $cuenta->cuenta }}</td>
                                    <td>{{ $cuenta->clave }}</td>
                                    <td>{{ $cuenta->swifts }}</td>
                                    <td>{{ $cuenta->aba }}</td>
                                    <td>{{ $cuenta->moneda }}</td>
                                    <td>{{ $cuenta->observaciones }}</td>
                                    <td>{{ $cuenta->status }}</td>

                                    <td>
                                        <form action="{{ route('cuentas.destroy',$cuenta->id) }}" method="POST"
                                            class="formEliminar">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('cuentas.show',$cuenta->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> Mostrar</a>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('cuentas.edit',$cuenta->id) }}"><i
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
            {!! $cuentas->links() !!}
        </div>
    </div>
    <script>
    (function() {
        'use strict'
        var forms = document.querySelectorAll('.formEliminar')

        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {

                    event.preventDefault()
                    event.stopPropagation()
                    Swal.fire({
                        title: 'Eliminar cuenta',
                        text: "Esta seguro de eliminar el la cuenta del provedor!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, borrar cuenta!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                            Swal.fire(
                                'Borrado!',
                                'La cuenta ha sido borrado.',
                                'success'
                            )
                        }
                    })
                }, false)
            })
    })()
    </script>
</div>
@endsection