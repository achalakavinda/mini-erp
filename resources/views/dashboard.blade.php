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
                        <h3 class="box-title">Staff Registry</h3>
                    </div>
                    <!-- /.box-header -->
                    <div style="overflow: auto" class="box-body">
                        <table id="example1" class="table table-responsive table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Full Name</th>
                                <th>Employee Number</th>
                                <th>Category</th>
                                <th>Hour Rate</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                               <td>1</td>
                               <td>Rakitha</td>
                               <td>152</td>
                               <td>Partner</td>
                               <td>RS. 70,000</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Sugith</td>
                                <td>75</td>
                                <td>Supervisor</td>
                                <td>RS. 5,000</td>
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