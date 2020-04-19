@extends('layouts.admin')

@section('main-content-header')
        <!-- main header section -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Dashboard</h3>
            </div>
            @include('admin.header-widgets.dashboard-header')
        </div>
        <div class="box">
                <div style="padding: 10px" class="row">

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-aqua">
                            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Projects</span>
                                <span class="info-box-number">{!! DB::table('projects')->count() !!}</span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">
                    Number of Project Completed
                  </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>


                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Employees</span>
                                <span class="info-box-number">{!! DB::table('users')->count() !!}</span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">
                    Number Of Staff
                  </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        <!-- /.box -->
        <!-- /main header section -->
@endsection



@section('main-content')
    <!-- main section -->
    <div class="row">

        <div class="col-md-6">
            <!-- BAR CHART -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Distribution</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="bar-chart" style="height: 300px;"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-6">
            <!-- DONUT CHART -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Industry Category</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->



    </div>
    <!-- /.row -->
    <!-- /main section -->
@endsection


@section('style')
    {!! Html::style('admin/bower_components/morris.js/morris.css') !!}
@endsection

@section('js')
    {!! Html::script('admin/bower_components/raphael/raphael.min.js') !!}
    {!! Html::script('admin/bower_components/morris.js/morris.min.js') !!}
    <script>
        $(document).ready(function () {
            //DONUT CHART
            var donut = new Morris.Donut({
                element: 'sales-chart',
                resize: true,
                data: [
                    {label: "Finance, Insurance & Real", value: 1},
                    {label: "Agriculture, Fishing & Forestry", value: 30},
                    {label: "Construction", value: 24},
                    {label: "Manufacturing", value: 16},
                    {label: "Transportation & Communication", value: 12},
                    {label: "Wholesale", value: 4},
                    {label: "Estate Retail", value: 13},
                ],
                hideHover: 'auto'
            });

            //BAR CHART
            var bar = new Morris.Bar({
                element: 'bar-chart',
                resize: true,
                data: [
                    {y: 'External Audit', a: 1172246, b: 1053782},
                    {y: 'Tax Compliance', a: 849425, b: 802471},
                    {y: 'BPO', a: 526788, b: 409788},
                    {y: 'Company Secretarial', a: 463052, b: 378198},
                    {y: 'Internal Audit', a: 17053, b: 1179436},
                    {y: 'Winidng Up', a: 142548, b: 168268},
                    {y: 'Advisory', a: 533568, b: 313203},
                    {y: 'Others', a: 42305, b: 33818},
                    {y: 'Feasibility', a: 23684, b: 184061},
                ],
                barColors: ['#00a65a', '#f56954'],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Actual', 'Budget'],
                hideHover: 'auto'
            });
        })
    </script>
@endsection
