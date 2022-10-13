@extends('layouts.app')

@section('template_title')
Cuenta
@endsection
<!-- diseño -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">


<!-- datatable -->

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<!-- botton -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

<!-- cdn fontawesom -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header" class="fondoheader">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title" style="color:#FFFFFF">
                            {{ __('Cuenta') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('cuentas.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Crear Nueva') }}
                            </a>
                            <a href="{{ route('/imprimir') }}" class="btn btn-danger" data-placement="left">
                                <i class="fas fa-file-pdf"></i>
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
                        <table id=example class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Usuario</th>
                                    <th>Proveedor</th>
                                    <th>Banco</th>
                                    <th>Sucursal</th>
                                    <th>Dirección</th>
                                    <th>Cuenta</th>
                                    <th>Clabe</th>
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
                                        <form action="{{ route('cuentas.destroy',$cuenta->id) }}" method="POST" class="formEliminar">
                                            <a class="btn btn-sm btn-primary " href="{{ route('cuentas.show',$cuenta->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('cuentas.edit',$cuenta->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
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
                            text: "Esta seguro de eliminar la cuenta del proveedor!",
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

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">



@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!--datatable -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>



<script>
    $(document).ready(function() {
        $('#example').DataTable({
            language: {
                "lengthMenu": "Mostrar   _MENU_   registros ",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "sProcessing": "Procesando...",
            },

            "lengthMenu": [
                [2, 5, 10, 50, -1],
                [2, 5, 10, 50, "All"]
            ],
            dom: '<"top"lf>rt<"bottom"pi><"clear">',
            responsive: "true",
            buttons: [{
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i> ',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },



            ],


        })
    });
</script>
@endsection
