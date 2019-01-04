@extends('layouts.admin')

<?php
    $Customers = \App\Models\Customer::where('id',$Project->customer_id)->pluck('name','id');
    $PROJECTJOBTYPE = \App\Models\ProjectJobType::where('project_id',$Project->id)->get();
    $WORKSHEETS =  DB::table('work_sheets')->select(DB::raw('sum(hr_cost) as cost,sum(work_hrs) as hrs,sum(hr_rate) as rate, user_id'))->where('project_id',$Project->id)->groupBy('user_id')->get();
?>

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Project | {!! $Project->code !!}</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/dashboard') }}" class="btn btn-success">Go Back</a>
            <a href="{{ url('/project') }}" class="btn btn-success">Project</a>
            <a href="{{ url('/project/create') }}" class="btn btn-success">New</a>
            <a href="{!! url('/project') !!}/{!! $Project->id !!}/estimation" class="btn btn-danger">Budget <i class="fa fa-plus-square"></i></a>
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
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Project | {!! $Project->code !!}</h3>
                </div>
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Customer</th>
                            <th>Job</th>
                            <th>B.Hrs</th>
                            <th>B.Cost</th>
                            <th>B.Revenue</th>
                            <th>A.Hrs</th>
                            <th>A.Cost</th>
                            <th>A.Revenue</th>
                            <th>Cost Variance</th>
                            <th>Recovery Ratio</th>
                            <th>status</th>
                        </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>{!! $Project->code !!}</td>
                                <td>{!! \App\Models\Customer::where('id',$Project->customer_id)->first()->name !!}</td>
                                <td>
                                    <?php
                                    foreach ($PROJECTJOBTYPE as $val){
                                        $JBTYPE =  \App\Models\JobType::find($val->jop_type_id);
                                        echo $JBTYPE->jobType;
                                    }
                                    ?>
                                </td>
                                <td>{!! $Project->budget_number_of_hrs  !!}</td>
                                <td>{!! $Project->budget_cost  !!}</td>
                                <td>{!! $Project->budget_revenue  !!}</td>
                                <td>{!! $Project->actual_number_of_hrs  !!}</td>
                                <td>{!! $Project->actual_cost  !!}</td>
                                <td>{!! $Project->actual_revenue  !!}</td>
                                <td>{!! $Project->cost_variance  !!}</td>
                                <td>{!! $Project->recovery_ratio  !!}</td>
                                <td>{!! $Project->close  !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                 @include('admin.project._partials.showForm')
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
@endsection
<!-- /main section -->