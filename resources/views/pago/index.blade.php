@extends('layouts.app')

@section('template_title')
Pagos pendientes
@endsection
@section('css')

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

<style>
.dataTables_length select {
    padding: 0px !important;
    width: 60px !important;

}
</style>

@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card  ">
                <div class="card-header ">
                    <div style="display: flex; justify-content: space-between; align-items: center;  ">

                        <span id="card_title" style="color:#FFFFFF">
                            {{ __('Pago pendientes') }}
                        </span>

                        <div class=" float-right">
                            <a href="creates" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Crear Nuevo') }}
                            </a>
                            <a href="{{ route('/imprimirpagos') }}" class="btn btn-danger" data-placement="left">
                                <i class="fas fa-file-pdf"></i>
                            </a>

                            <a href="{{ route('/exportarexcel') }}"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-success" data-placement="left">
                                <i class="fas fa-file-excel"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                {{-- <div class="row">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

                <div class="card-body">
                    <div class=" table-responsive">
                        <table id="example" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>

                                    <th>Usuario </th>
                                    <th>Provedor</th>
                                    <th>Cuenta</th>
                                    <th>Fecha</th>
                                    <th>Referencia</th>
                                    <th>Cliente</th>
                                    <th>Concepto</th>
                                    <th>Bl</th>
                                    <th>Contenedor</th>
                                    <th>Factura</th>
                                    <th>Factura PDF</th>
                                    <th>Solicitud PDF</th>
                                    <th>Cantidad</th>
                                    <th>Moneda</th>
                                    <th>Obeservacion</th>
                                    <th>Status</th>
                                    <th>Obeservacion de revisión</th>



                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pagos as $pago)

                                <tr>
                                    <td>{{ ++$i}}</td>

                                    <td>{{ $pago->user->name }}</td>
                                    <td>{{ $pago->provedor->nombre }}</td>
                                    <td>{{ $pago->cuenta->cuenta." ".$pago->cuenta->observaciones }}</td>
                                    <td>{{ $pago->fecha }}</td>
                                    <td>{{ $pago->referencia }}</td>
                                    <td>{{ $pago->cliente }}</td>
                                    <td>{{ $pago->concepto }}</td>
                                    <td>{{ $pago->bl }}</td>
                                    <td>{{ $pago->contenedor }}</td>
                                    <td>{{ $pago->factura }}</td>
                                    <td><a target=" _blank" href="{{('vpagos/'). $pago->pago_path}}"><img
                                                src="app/public/descargav.jpg"></a></td>
                                    <td><a target="_blank" href="{{('vpagos/'). $pago->solicitud_path}}"><img
                                                src="app/public/descargav.jpg"></a></td>
                                    <td>
                                        <slot>$</slot>{{ number_format($pago->cantidad, 2, ".", ",") }}
                                    </td>
                                    <td>{{ $pago->cuenta->moneda }}</td>
                                    <td>{{ $pago->obeservacion }}</td>
                                    <td>{{ $pago->status }}</td>
                                    <td>{{ $pago->obeservacionderev }}</td>




                                    <td>
                                        <form action="{{ route('pagos.destroy',$pago->id) }}" method="POST"
                                            class="formEliminar">
                                            <a class=" btn btn-sm btn-primary " title="Mostrar pago"
                                                href=" {{ route('pagos.show',$pago->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-success" title="Editar pago"
                                                href="edits/{{$pago->id}}"><i class="fa fa-fw fa-edit"></i> </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Eliminar pago" class="btn btn-sm btn-danger">



                                                <i class="fa fa-fw fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
            {!! $pagos->links() !!}
        </div>
    </div>
</div>

<br>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style=" display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title" style="color:#FFFFFF">
                            {{ __('Pago pagados') }}
                        </span>


                    </div>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped" style="width:100%">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Usuario </th>
                                    <th>Provedor</th>

                                    <th>Fecha</th>
                                    <th>Referencia</th>
                                    <th>Cliente</th>
                                    <th>Concepto</th>
                                    <th>Bl</th>
                                    <th>Contenedor</th>
                                    <th>Factura</th>
                                    <th>Comprobante</th>
                                    <th>Cantidad</th>
                                    <th>Moneda</th>




                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pagosp as $pago)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $pago->user->name }}</td>
                                    <td>{{ $pago->provedor->nombre }}</td>

                                    <td>{{ $pago->fecha }}</td>
                                    <td>{{ $pago->referencia }}</td>
                                    <td>{{ $pago->cliente }}</td>
                                    <td>{{ $pago->concepto }}</td>
                                    <td>{{ $pago->bl }}</td>
                                    <td>{{ $pago->contenedor }}</td>
                                    <td>{{ $pago->factura }}</td>
                                    <td>{{ $pago->comprobante_path}}</td>
                                    <td>
                                        <slot>$</slot>{{ number_format($pago->cantidad, 2, ".", ",") }}
                                    </td>
                                    <td>{{ $pago->cuenta->moneda }}</td>



                                    <td>
                                        <form action="{{ route('pagos.destroy',$pago->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('pagos.show',$pago->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> Mostrar</a>


                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $pagos->links() !!}
        </div>
    </div>
</div>
<br>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title" style="color:#FFFFFF">
                            {{ __('Pagos Cancelados') }}
                        </span>


                    </div>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-striped" style="width:100%">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Usuario </th>
                                    <th>Provedor</th>

                                    <th>Fecha</th>
                                    <th>Referencia</th>
                                    <th>Cliente</th>
                                    <th>Concepto</th>
                                    <th>Bl</th>
                                    <th>Contenedor</th>
                                    <th>Factura</th>
                                    <th>Cantidad</th>
                                    <th>Moneda</th>
                                    <th>Obeservacion de la cancelación</th>



                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pagosc as $pago)

                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $pago->user->name }}</td>
                                    <td>{{ $pago->provedor->nombre }}</td>

                                    <td>{{ $pago->fecha }}</td>
                                    <td>{{ $pago->referencia }}</td>
                                    <td>{{ $pago->cliente }}</td>
                                    <td>{{ $pago->concepto }}</td>
                                    <td>{{ $pago->bl }}</td>
                                    <td>{{ $pago->contenedor }}</td>
                                    <td>{{ $pago->factura }}</td>
                                    <td>
                                        <slot>$</slot>{{ number_format($pago->cantidad, 2, ".", ",") }}
                                    </td>
                                    <td>{{ $pago->cuenta->moneda }}</td>
                                    <td>{{ $pago->obeservacionderev }}</td>


                                    <td>
                                        <form action="{{ route('pagos.destroy',$pago->id) }}" method="POST">




                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('pagos.show',$pago->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> Mostrar</a>


                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $pagos->links() !!}
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
                    title: 'Eliminar pago',
                    text: "Esta seguro de eliminar el pago!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, borrar registro!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                        Swal.fire(
                            'Borrado!',
                            'TÚ pago ha sido borrado.',
                            'exitosamente'
                        )
                    }
                })
            }, false)
        })
})()
</script>

@endsection
@section('script')

<!-- diseño -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!-- datatable -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>



<!-- bottones -->
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>





<script>
/*   tabla 1 pendientes */

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
            [2, 10, 50, -1],
            [2, 10, 50, "All"]
        ],
        dom: '<"top"lBf>rt<"bottom"pi><"clear">',

        responsive: "true",
        buttons: [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },



        ],


    });
});

/* tabla 2 pagados */

$(document).ready(function() {
    $('#example2').DataTable({
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
            [2, 10, 50, -1],
            [2, 10, 50, "All"]
        ],
        dom: '<"top"lBf>rt<"bottom"pi><"clear">',

        responsive: "true",
        buttons: [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },



        ],


    });
});


/* tabla 3 cancelados */


$(document).ready(function() {
    $('#example3').DataTable({
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
            [2, 10, 50, -1],
            [2, 10, 50, "All"]
        ],
        dom: '<"top"lBf>rt<"bottom"pi><"clear">',

        responsive: "true",
        buttons: [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },



        ],


    });
});
</script>


@endsection