@extends('layouts.admin')

<!-- main header section -->
    @section('main-content-header')
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Dashboard</h3>
            </div>
            <div class="box-body">
                <a href="{{ url('/staff') }}" class="btn btn-success">Staff Register</a>
                <a href="{{ url('/customer') }}" class="btn btn-success">Customer</a>
                <a href="{{ url('/work-sheet') }}" class="btn btn-success">Work Sheet</a>
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
                        <h3 class="box-title">Projects</h3>
                    </div>
                    <!-- /.box-header -->
                    <div style="overflow: auto" class="box-body">
                        <table id="table" class="table table-responsive table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Code</th>
                                <th>Customer</th>
                                <th>Number OF Hrs</th>
                                <th>Budget</th>
                                <th>Quoted</th>
                                <th>Cost</th>
                                <th>Revenue</th>
                                <th>Recovery Ratio</th>
                                <th>status</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $Rows = \App\Models\Project::all();?>

                            @foreach($Rows as $row)
                                <?php
                                $Customer="";
                                $CM = \App\Models\Customer::find($row->customer_id );
                                if(!empty($CM)){
                                    $Customer = $CM->name;
                                }
                                ?>
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->code }}</td>
                                    <td>{{ $Customer }}</td>
                                    <td>{{ $row->number_of_hrs }}</td>
                                    <td>{{ $row->budget_cost }}</td>
                                    <td>{{ $row->quoted_price }}</td>
                                    <td>{{ $row->actual_cost }}</td>
                                    <td>{{ $row->revenue }}</td>
                                    <td>{{ $row->recovery_ratio }}</td>
                                    <td>{{ $row->close }}</td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" href="{{ url('/job-type') }}/{{ $row->id }}">view</a>
                                    </td>
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