<?php
    $User = \App\Models\User::find($Project->created_by_id);
    $Customers = \App\Models\Customer::where('id',$Project->customer_id)->pluck('name','id');
    $PROJECTJOBTYPE = \App\Models\ProjectJobType::where('project_id',$Project->id)->get();
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
            <a href="{!! url('/project') !!}/{!! $Project->id !!}/budget-cost" class="btn btn-danger">Budget <i class="fa fa-plus-square"></i></a>
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
                <div class="box-header with-border">
                    <h4 class="box-title">Project Details</h4>
                </div>
                <div class="box-body">

                    <div class="col-md-12" style="overflow: auto">
                        <table id="table" class="table table-responsive table-bordered table-striped">
                            <thead>
                            <tr>
                                <th >Code</th>
                                <th>Company</th>
                                <th>Sector</th>
                                <th>Status</th>
                                <th>Created By</th>
                            </tr>
                            </thead>
                            <?php
                                $Sector = null;
                                $Status = null;
                                if($Project->sector_id){
                                    $sector_model = \App\Models\CustomerSector::find($Project->sector_id);
                                    if($sector_model){
                                        $Sector = $sector_model->name;
                                    }
                                }

                                $status_model = \App\Models\ProjectStatus::find($Project->status_id);
                                if($status_model){
                                    $Status = $status_model->name;
                                }

                            ?>
                            <tbody>
                            <tr>
                                <th>{!! $Project->code !!}</th>
                                <td>{!! $Project->customer_name  !!}</td>
                                <td>{!! $Sector !!}</td>
                                <td><b>{!! $Status !!}</b></td>
                                <td> @if($User){!! ucwords($User->name)  !!}@endif</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <button type="button" class="form-control" data-toggle="modal" data-target="#modal-default">
                                Work Report <i class="fa fa-table"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <a type="button" style="text-align: center; cursor: pointer" class="form-control"  href="{{ url('/project') }}/{!! $Project->id !!}/settings">
                                Project Settings <i class="fa fa-cogs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box box-primary">
                <div class="box-body">
                    <div class="col-md-12" style="overflow: auto">
                            <table id="table" class="table table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Budget Cost</th>
                                    <th>Actual Cost</th>
                                    <th>Profit Ratio</th>
                                    <th>Quoted Price</th>
                                    <th>Invoice Amount</th>
                                    <th>Receipt Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{!! number_format($Project->budget_cost_by_work+$Project->budget_cost_by_work+$Project->budget_cost_by_overhead,2) !!}</td>
                                    <td>{!! number_format($Project->actual_cost_by_work+$Project->actual_cost_by_work+$Project->actual_cost_by_overhead,2) !!}</td>
                                    <td>{!! number_format($Project->profit_ratio,2) !!}</td>
                                    <td>{!! number_format($Project->quoted_price,2) !!}</td>
                                    <td>{!! number_format($Project->invoicing_amount,2) !!}</td>
                                    <td>{!! number_format($Project->receipt_amount,2) !!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>

            <div class="box box-primary">
                {{--summery table--}}
                @include('admin.project.table.project_cost_summary_table')
                {{--/summery table--}}
            </div>
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

        <div class="col-md-6">
            <!-- DONUT CHART -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Hours Comparison</h3>
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
                    {y: 'Cost', a: parseFloat({!! $Project->budget_cost_by_work+$Project->budget_cost_by_work+$Project->budget_cost_by_overhead !!}), b: parseFloat({!! $Project->actual_cost_by_work+$Project->actual_cost_by_work+$Project->actual_cost_by_overhead !!})},
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
