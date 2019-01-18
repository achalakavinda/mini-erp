<?php
    $User = \App\Models\User::find($Project->created_by_id);
    $Customers = \App\Models\Customer::where('id',$Project->customer_id)->pluck('name','id');
    $PROJECTJOBTYPE = \App\Models\ProjectJobType::where('project_id',$Project->id)->get();
    $WORKSHEETS =  DB::table('work_sheets')->select(DB::raw('sum(hr_cost) as cost,sum(work_hrs) as hrs,sum(hr_rate) as rate, user_id'))->where('project_id',$Project->id)->groupBy('user_id')->get();
?>

@extends('layouts.admin')
@section('style')
    {!! Html::style('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
@endsection
<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Project | {!! $Project->code !!}</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/project') }}" class="btn btn-success">Go Back</a>
            <a href="{!! url('/project') !!}/{!! $Project->id !!}/estimation" class="btn btn-danger">Budget <i class="fa fa-plus-square"></i></a>
            <a href="{{ url('/project') }}/{!! $Project->id !!}/actual-cost" class="btn btn-danger">Actual Cost <i class="fa fa-money"></i></a>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="col-md-2">
                        <div class="form-group">
                            {!! Form::label('code','Code',['class' => 'control-label']) !!}
                            {!! Form::text('code',$Project->code,['class'=>'form-control','id'=>'code','placeholder'=>'Code','disabled']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('customer','Customer',['class' => 'control-label']) !!}
                            {!! Form::text('customer',$Project->customer_name,['class'=>'form-control','id'=>'code','placeholder'=>'Code','disabled']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        @if($User)
                            <div class="form-group">
                                {!! Form::label('created_by','Created By',['class' => 'control-label']) !!}
                                {!! Form::text('created_by',ucwords($User->name),['class'=>'form-control','id'=>'code','placeholder'=>'Code','disabled']) !!}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('work_report','Employee Work Record',['class' => 'control-label']) !!}
                            <button type="button" class="form-control" data-toggle="modal" data-target="#modal-default">
                                Work Report <i class="fa fa-table"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>B.Hrs</th>
                            <th>B.Cost</th>
                            <th>B.Revenue</th>
                            <th>A.Hrs</th>
                            <th>A.Cost By Work</th>
                            <th>A.Cost By Overheads</th>
                            <th>SUM(A.Cost)</th>
                            <th>A.Revenue</th>
                            <th>Cost Variance</th>
                            <th>Recovery Ratio</th>
                            <th>status</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>{!! $Project->budget_number_of_hrs  !!}</td>
                            <td>{!! $Project->budget_cost  !!}</td>
                            <td>{!! $Project->budget_revenue  !!}</td>
                            <td>{!! $Project->actual_number_of_hrs  !!}</td>
                            <td>{!! $Project->actual_cost_by_work  !!}</td>
                            <td>{!! $Project->actual_cost_by_overhead  !!}</td>
                            <td>{!! $Project->actual_cost_by_work+$Project->actual_cost_by_overhead  !!}</td>
                            <td>{!! $Project->actual_revenue  !!}</td>
                            @if($Project->close)
                                <td>{!! $Project->cost_variance  !!}</td>
                                <td>{!! $Project->recovery_ratio  !!}</td>
                            @else
                                @include('admin.project.table.td')
                            @endif

                            <td><b>@if($Project->close)Close @else Pending @endif</b></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- BAR CHART -->
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Cost & Revenue Comparison</h3>
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
                                    <h3 class="box-title">Hours Comparison</h3>

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
                </div>


                <div class="box-body">
                    <div class="pull-right">
                        {!! Form::model($Project, ['method' => 'PATCH', 'action' => ['ProjectController@update', $Project->id],'class'=>'form-horizontal']) !!}
                        {!! Form::text('set_delete',"value",['style'=>'display:none']) !!}
                        <button type="submit" class="btn btn-sm btn-danger">Delete <i class="fa fa-trash"></i></button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
@endsection
<!-- /main section -->

@section('model')

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Employees work report</h4>
                </div>
                <div class="modal-body">
                    @include('admin.project._partials.showForm')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

@endsection

@section('style')
    {!! Html::style('admin/bower_components/morris.js/morris.css') !!}
    <style>
        tspan{
            font-size: 10px;
        }
    </style>
@endsection

@section('js')
    {!! Html::script('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}
    {!! Html::script('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}
    {!! Html::script('admin/bower_components/raphael/raphael.min.js') !!}
    {!! Html::script('admin/bower_components/morris.js/morris.min.js') !!}
    <script>
        $(document).ready(function () {
            //DONUT CHART
            new Morris.Donut({
                element: 'sales-chart',
                resize: true,
                data: [
                    {label: "Budgeted Hours", value: parseFloat({!! $Project->budget_number_of_hrs !!})},
                    {label: "Actual Hours", value: parseFloat({!! $Project->actual_number_of_hrs !!})},
                ],
                hideHover: 'auto'
            });

            //BAR CHART
            new Morris.Bar({
                element: 'bar-chart',
                resize: true,
                data: [
                    {y: 'Cost', a: parseFloat({!! $Project->budget_cost !!}), b: parseFloat({!! $Project->actual_cost_by_work+$Project->actual_cost_by_overhead !!})},
                    {y: 'Revenue', a: parseFloat({!! $Project->budget_revenue !!}), b: parseFloat({!! $Project->actual_revenue !!})},
                ],
                barColors: ['#00a65a', '#f56954'],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Budget', 'Actual'],
                hideHover: 'auto'
            });

            $(function () {
                $('#tableEmployee').DataTable({
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
                })
            })
        })
    </script>
@endsection
