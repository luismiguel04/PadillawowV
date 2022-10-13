@extends('layouts.app')

@section('template_title')
Provedor
@endsection
<!-- diseño -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">


<!-- datatable -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<!-- botton -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

<!-- cdn fontawesom -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header" class="fondoheader">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title" style="color:#FFFFFF">

                            {{ __('Proveedores') }}

                        </span>

                        <div class="float-right">
                            <a href="{{ route('provedors.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                {{ __('Crear Nuevo') }}
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
                                    <th>No Proveedor</th>

                                    <th>Usuario</th>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>Status</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($provedors as $provedor)


                                <tr>
                                    <td>{{ ++$i }}</td>


                                    <td>{{ $provedor->user->name }}</td>
                                    <td>{{ $provedor->nombre }}</td>
                                    <td>{{ $provedor->direccion }}</td>
                                    <td>{{ $provedor->status }}</td>

                                    <td>

                                        <form action="{{ route('provedors.destroy',$provedor->id) }}" method="POST"
                                            class="formEliminar">
                                            <a class=" btn btn-sm btn-primary "
                                                href=" {{ route('provedors.show',$provedor->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> Mostrar</a>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('provedors.edit',$provedor->id) }}"><i
                                                    class="fa fa-fw fa-edit"></i> Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i>Eliminar </button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $provedors->links() !!}
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
                        title: 'Eliminar proveedor',
                        text: "Esta seguro de eliminar el proveedor!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, borrar proveedor!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                            Swal.fire(
                                'Borrado!',
                                'El proveedor ha sido borrado exitosamente.',
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

    $(document).ready(function () {
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
                [2,5, 10, 50, -1],
                [2,5, 10, 50, "All"]
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
