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
                        <h3 class="box-title">Project Wise Summery</h3>
                    </div>
                    <!-- /.box-header -->
                    <div style="overflow: auto" class="box-body">
                        <table id="example1" class="table table-responsive table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Name Of Project</th>
                                <th>Budget Cost</th>
                                <th>Actual Cost</th>
                                <th>Revenue</th>
                                <th>Recovery Ratio</th>
                                <th>view</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                               <td>1</td>
                               <td>x</td>
                               <td>LKR 60,000</td>
                               <td>LKR 50,000</td>
                               <td>LKR 65,000</td>
                               <td>130%</td>
                               <td>
                                   <a href="#" class="btn btn-sm btn-danger">view</a>
                               </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>y</td>
                                <td>LKR 60,000</td>
                                <td>LKR 50,000</td>
                                <td>LKR 65,000</td>
                                <td>130%</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger">view</a>
                                </td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>z</td>
                                <td>LKR 60,000</td>
                                <td>LKR 50,000</td>
                                <td>LKR 65,000</td>
                                <td>130%</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger">view</a>
                                </td>
                            </tr>



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