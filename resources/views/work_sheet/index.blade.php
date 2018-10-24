@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Work Sheet</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/dashboard') }}" class="btn btn-success">Go Back</a>
            <a href="{{ url('/work-sheet') }}" class="btn btn-success">Work Sheet</a>
            <a href="{{ url('/work-sheet/create') }}" class="btn btn-success">New</a>
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
                <div class="box-header">
                    <h3 class="box-title">Work Sheet</h3>
                </div>
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="example1" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Date</th>
                            <th>Employee</th>
                            <th>Project</th>
                            <th>Company</th>
                            <th>No of Hrs</th>
                            <th>Cost</th>
                            <th>view</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($WorkSheet as $row)

                            <?php
                                $Customer_name = "";
                                $Project_name = "";
                                $Staff_name = "";
                                $customer  = \App\Models\Customer::find($row->customer_id);
                                $project  = \App\Models\Project::find($row->project_id);
                                $user = \App\Models\User::find($row->user_id);

                                if(!empty($customer)){
                                    $Customer_name = $customer->name;
                                }
                                if(!empty($project)){
                                    $Project_name = $project->code;
                                }
                                if(!empty($user)){
                                    $Staff_name = $user->name;
                                }
                            ?>

                            <tr>
                                <td>{!! $row->id !!}</td>
                                <td>{!! $row->date !!}</td>
                                <td>{!! $Staff_name !!}</td>
                                <td>{!! $Project_name !!}</td>
                                <td>{!! $Customer_name !!}</td>
                                <td>{!! $row->work_hrs !!}</td>
                                <td>{!! $row->hr_cost !!}</td>
                                <td></td>
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
