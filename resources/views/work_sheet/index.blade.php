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
                            <th>Company</th>
                            <th>No of Hrs</th>
                            <th>Cost</th>
                            <th>view</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>09-11-2018</td>
                                <td>X</td>
                                <td>10</td>
                                <td>10,000</td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="{{ url('work-sheet') }}/1">view</a>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>09-11-2018</td>
                                <td>y</td>
                                <td>12</td>
                                <td>10,500</td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="{{ url('work-sheet') }}/2">view</a>
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