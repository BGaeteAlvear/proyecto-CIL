@extends('template.base')

@section('content-title', 'Configuración')

@section('content-subtitle', 'Detalle Carrito de Compra')

@section('breadcrumb')
    <li>Mi Cuenta</li>
    <li class="active">Detalle Carrito de Compra</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12" id="messages"></div>
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div id="toolbar" class="btn-group">
                    </div>
                    <table
                            id="table"
                            data-toggle="table"
                            data-search="true"
                            data-ajax="ajaxRequest"
                            data-pagination="true"
                            data-striped="true"
                            data-show-refresh="true"
                            data-show-toggle="true"
                            data-show-columns="true"
                            data-show-export="true"
                            data-detail-formatter="detailFormatter"
                            data-minimum-count-columns="2"
                            data-show-pagination-switch="true"
                            data-id-field="id"
                            data-page-list="[5, 10, 20, 50, 100, 200]"
                            data-toolbar="#toolbar"
                           >
                        <thead>
                        <tr>

                            <th data-field="id.id" data-sortable="true">ID</th>
                            <th data-field="id.name" data-cell-style="cellStyle" data-sortable="true">Nombre</th>
                            <th data-field="id.qty" data-sortable="true">Cantidad</th>
                            <th data-field="id.price" data-cell-style="cellStyle" data-align="center" data-sortable="true" >Precio Unit</th>
                            <th data-field="controls" data-cell-style="cellStyle" data-switchable="false" data-formatter="operateFormatterControls" data-show-columns="false" data-tableexport-display="none"></th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('styles')

    <link rel="stylesheet" href="/assets/bootstraptable/dragtable.css">
    <link rel="stylesheet" href="/assets/bootstraptable/bootstrap-table-reorder-rows.css">
    <link rel="stylesheet" href="/assets/bootstraptable/bootstrap-table-fixed-columns.css">
    <link rel="stylesheet" href="/assets/bootstraptable/bootstrap-table.min.css">

@endsection

@section('scripts')
    <script src="/assets/bootstraptable/bootstrap-table.min.js"></script>
    <script src="/assets/bootstraptable/bootstrap-table-es-ES.min.js"></script>
    <script src="/assets/bootstraptable/bootstrap-table-export.min.js"></script>
    <script src="/assets/bootstraptable/tableExport.min.js"></script>

    <script>

        var items = [];

        // cargar datos
        function ajaxRequest(params){

            $.ajax({
                type: "GET",
                contentType : "application/json",
                url: "{{ route('games.cart-detail-all') }}",
                success: function(data) {
                    console.log(data);
                    params.success(data);
                    items = data;
                    $("#table").bootstrapTable({
                       exportHiddenColumns: ["active", "controls"],
                    });
                }
            });
        }



        // atributos de filas
        function cellStyle(value, row, index, field) {
            return {
                css: {"white-space": "nowrap"}
            };
        }

    </script>

@endsection
