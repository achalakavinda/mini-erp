<?php
    $User = \App\Models\User::find($Project->created_by_id);
    $Customers = \App\Models\Customer::where('id',$Project->customer_id)->pluck('name','id');
    $PROJECTJOBTYPE = \App\Models\ProjectJobType::where('project_id',$Project->id)->get();
?>

@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Project | {!! $Project->code !!}</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/project') }}" class="btn btn-success">Go Back</a>
        </div>
        <!-- /.box-body -->


        <div style="padding: 10px" class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Projects</span>
                        <span class="info-box-number">Pending</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                         Project Pending
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Employees</span>
                        <span class="info-box-number">20</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                        Staff Contribution
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-clock-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Hours</span>
                        <span class="info-box-number">20</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                        Work Hours
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-dollar"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Profit</span>
                        <span class="info-box-number">20</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                        Gross Profit
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
        </div>


        <div class="col-md-12">
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
        </div>

        <div class="col-md-6">

            <div class="box box-primary">
                {{--summery table--}}
                @include('admin.project.table.project_cost_summary_table')
                {{--/summery table--}}
            </div>
        </div>


        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Cost & Revenue Comparison</h3>

                </div>
                <div class="box-body">

                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </div>
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