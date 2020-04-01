<?php
    $balance = 0;
    $debitTotal = 0;
    $creditTotal = 0;
?>

@extends('layouts.admin')
<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">General Ledger</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-app">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{!! url('general-ledger') !!}" class="btn btn-app">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{!! url('general-ledger/create') !!}" class="btn btn-app">
                <i class="main-action-btn-danger fa fa-plus"></i> New
            </a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <div class="col-md-6">
                        <!-- DONUT CHART -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Expenses Comparison</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body chart-responsive">
                                <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>

                    <!-- BAR CHART -->
                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Cost & Revenue Comparison</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body chart-responsive">
                                <div class="chart" id="bar-chart" style="height: 300px;"></div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Transaction Code</th>
                            <th>Description</th>
                            <th>Journal Reference</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Balance</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($GeneralLedger as $item)
                                <?php
                                    $credit = 0;
                                    $debit = 0;
                                    if($item->amount>0){
                                        $debit = $debit+$item->amount;
                                        $debitTotal = $debitTotal+$debit;
                                    }else{
                                        $credit = $credit+$item->amount;
                                        $creditTotal = $creditTotal+$credit;
                                    }
                                ?>
                                <tr>
                                    <td>{!! $item->id !!}</td>
                                    <td>{!! $item->created_at !!}</td>
                                    <td>{!! $item->gl_code !!}</td>
                                    <td>{!! $item->description !!}</td>
                                    <td>{!! $item->journal_code !!}</td>
                                    <td>@if($debit!=0)<b style="color: green">{!! $debit !!}</b>@endif</td>
                                    <td>@if($credit!=0)<b style="color: red">{!! -($credit) !!}</b>@endif</td>
                                    <td>{!! $balance = $balance+$item->amount !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->

@section('js')
    @include('layouts.components.dataTableJs.index')
    {!! Html::script('admin/bower_components/raphael/raphael.min.js') !!}
    {!! Html::script('admin/bower_components/morris.js/morris.min.js') !!}
    <script>
        $(document).ready(function () {
            //DONUT CHART
            new Morris.Donut({
                element: 'sales-chart',
                resize: true,
                data: [
                    {label: "Collections", value: parseFloat({!! $debitTotal !!})},
                    {label: "Payments", value: parseFloat({!! -($creditTotal) !!})},
                    {label: "Remains", value: parseFloat({!! $debitTotal+$creditTotal !!})},
                ],
                hideHover: 'auto'
            });

            //BAR CHART
            new Morris.Bar({
                element: 'bar-chart',
                resize: true,
                data: [
                    {y: 'Cash', a: parseFloat({!! $debitTotal !!}), b: parseFloat({!! -($creditTotal) !!})},
                ],
                barColors: ['#00a65a', '#f56954'],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Budget', 'Actual'],
                hideHover: 'auto'
            });

        });
    </script>

@endsection


