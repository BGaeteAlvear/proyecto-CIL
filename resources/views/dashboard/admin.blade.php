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
                    <span class="info-box-number">{{$total_nodes}}
                        <small></small></span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-ionic-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">NODOS SIN ASIGNAR</span>
                    <span class="info-box-number">{{$nodes_unassigned}}
                        <small></small></span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-information-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">PLATAFORMAS REGISTRADAS</span>
                    <span class="info-box-number">{{$nodes_in_review}}
                        <small></small></span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="ion ion-ios-list-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">JUEGOS EN STOCK</span>
                    <span class="info-box-number">{{$nodes_suggested}}
                        <small></small></span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-person-stalker"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">TOTAL CLIENTES</span>
                    <span class="info-box-number">{{$constructores}}
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
    <script src="/assets/chart-js/Chart.js"></script>
    <script>
        $(function () {

            var constructores = [];
            var asignados = [];
            var aprobados = [];
            var nodos_estados;

            $.ajax({
                url: '{{ route('dashboard.get-asigna-vs-aprob') }}',
                success: function (result) {
                    result.forEach(function (data) {
                        constructores.push(data.fullname);
                        asignados.push(data.nodos_assigned);
                        aprobados.push(data.nodes_aproved)
                    });

                    renderChartAsignVsAprob();
                }
            });

            $.ajax({
                url: '{{ route('dashboard.get-nodes-statuses') }}',
                success: function (result) {
                    nodos_estados = result;
                    renderPieChart();
                }
            });



            function renderChartAsignVsAprob() {
                var areaChartData = {
                    labels: constructores,
                    datasets: [
                        {
                            label: 'Asignados',
                            fillColor: '#f39c12 ',
                            strokeColor: '#f39c12 ',
                            pointColor: '#f39c12 ',
                            pointStrokeColor: '#c1c7d1',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(220,220,220,1)',
                            data: asignados
                        },
                        {
                            label: 'Aprobados',
                            fillColor: 'rgba(60,141,188,0.9)',
                            strokeColor: 'rgba(60,141,188,0.8)',
                            pointColor: '#3b8bba',
                            pointStrokeColor: 'rgba(60,141,188,1)',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data: aprobados
                        }
                    ]
                };

                var barChartCanvas = $('#barChart').get(0).getContext('2d');
                var barChart = new Chart(barChartCanvas);
                var barChartData = areaChartData;
                barChartData.datasets[1].fillColor = '#00a65a';
                barChartData.datasets[1].strokeColor = '#00a65a';
                barChartData.datasets[1].pointColor = '#00a65a';
                var barChartOptions = {
                    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                    scaleBeginAtZero: true,
                    //Boolean - Whether grid lines are shown across the chart
                    scaleShowGridLines: true,
                    //String - Colour of the grid lines
                    scaleGridLineColor: 'rgba(0,0,0,.05)',
                    //Number - Width of the grid lines
                    scaleGridLineWidth: 1,
                    //Boolean - Whether to show horizontal lines (except X axis)
                    scaleShowHorizontalLines: true,
                    //Boolean - Whether to show vertical lines (except Y axis)
                    scaleShowVerticalLines: true,
                    //Boolean - If there is a stroke on each bar
                    barShowStroke: true,
                    //Number - Pixel width of the bar stroke
                    barStrokeWidth: 2,
                    //Number - Spacing between each of the X value sets
                    barValueSpacing: 5,
                    //Number - Spacing between data sets within X values
                    barDatasetSpacing: 1
                    //String - A legend template
                };

                barChartOptions.datasetFill = false;
                barChart.Bar(barChartData, barChartOptions)
            }

            function renderPieChart() {

                var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
                var pieChart = new Chart(pieChartCanvas);

                var PieData = [
                    {
//                        Aprobado
                        value: nodos_estados[0]['count'],
                        color: '#168cda',
                        highlight: '#168cda',
                        label: nodos_estados[0]['name']
                    },
                    {
//                        Asignado
                        value: nodos_estados[1]['count'],
                        color: '#c1b700',
                        highlight: '#c1b700',
                        label: nodos_estados[1]['name']
                    },
                    {
//                        En Construcción
                        value: nodos_estados[2]['count'],
                        color: '#005e2f',
                        highlight: '#005e2f',
                        label: nodos_estados[2]['name']
                    },
                    {
//                        En Reconstrucción
                        value: nodos_estados[3]['count'],
                        color: '#00a757',
                        highlight: '#00a757',
                        label: nodos_estados[3]['name']
                    },
                    {
//                        En Revisión
                        value: nodos_estados[4]['count'],
                        color: '#f39c12',
                        highlight: '#f39c12',
                        label: nodos_estados[4]['name']
                    },
                    {
//                        No Asignado
                        value: nodos_estados[5]['count'],
                        color: '#d2d6de',
                        highlight: '#d2d6de',
                        label: nodos_estados[5]['name']
                    },
                    {
//                        Publicado
                        value: nodos_estados[6]['count'],
                        color: '#004b95',
                        highlight: '#004b95',
                        label: nodos_estados[6]['name']
                    },
                    {
//                        Rechazado
                        value: nodos_estados[7]['count'],
                        color: '#f32b18',
                        highlight: '#f32b18',
                        label: nodos_estados[7]['name']
                    }
                ];

                var pieOptions = {
                    //Boolean - Whether we should show a stroke on each segment
                    segmentShowStroke: true,
                    //String - The colour of each segment stroke
                    segmentStrokeColor: '#fff',
                    //Number - The width of each segment stroke
                    segmentStrokeWidth: 2,
                    //Number - The percentage of the chart that we cut out of the middle
                    percentageInnerCutout: 50, // This is 0 for Pie charts
                    //Number - Amount of animation steps
                    animationSteps: 100,
                    //String - Animation easing effect
                    animationEasing: 'easeOutBounce',
                    //Boolean - Whether we animate the rotation of the Doughnut
                    animateRotate: true,
                    //Boolean - Whether we animate scaling the Doughnut from the centre
                    animateScale: false,
                    //Boolean - whether to make the chart responsive to window resizing
                    responsive: true,
                    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                    maintainAspectRatio: true

                };

                pieChart.Doughnut(PieData, pieOptions)
            }
        });

    </script>
@endsection
