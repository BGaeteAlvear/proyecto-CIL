@extends('template.base')

@section('content-title', 'Dashboard')

@section('content-subtitle', 'Panel de Control' )

@section('breadcrumb')
    <li class="active">Dashboard</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-ionic-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">TOTAL DE JUEGOS</span>
                    <span class="info-box-number">
                        <small></small></span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-ionic-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">NODOS SIN ASIGNAR</span>
                    <span class="info-box-number">
                        <small></small></span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-information-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">PLATAFORMAS REGISTRADAS</span>
                    <span class="info-box-number">
                        <small></small></span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="ion ion-ios-list-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">JUEGOS EN STOCK</span>
                    <span class="info-box-number">
                        <small></small></span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-person-stalker"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">TOTAL CLIENTES</span>
                    <span class="info-box-number">
                        <small></small></span>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Resumen de Juegos Stock y Juegos Vendidos</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div style="color:white; margin-bottom: 10px; text-align: center;">
                        <span style="background: #f39c12 ; padding: 5px 10px;">En Stock</span>
                        <span style="background: #00a65a; padding: 5px 10px;">Vendidos</span>
                    </div>
                    <div class="chart">
                        <canvas id="barChart" style="height:236px"></canvas>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Resumen Ventas</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="pieChart" style="height:260px"></canvas>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

@endsection

@section('styles')


@endsection


@section('scripts')
    
@endsection
