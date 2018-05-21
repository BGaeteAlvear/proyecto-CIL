@extends('template.base')

@section('content-title', 'Dashboard')

@section('content-subtitle', 'Panel de Control' )

@section('breadcrumb')
    <li class="active">Dashboard</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12" id="messages"></div>
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-lg-12">
                    <div class="row">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
