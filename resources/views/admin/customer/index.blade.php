@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Customers</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/dashboard') }}" class="btn btn-success">Go Back</a>
            <a href="{{ url('/customer') }}" class="btn btn-success">Customer</a>
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
                    <a href="{{ url('/customer/create') }}" class="btn btn-sm btn-danger">New <i class="fa fa-plus-square"></i></a>
                </div>
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="example1" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Firm File No :</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>View <i class="fa fa-paper-plane"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($Customers as $customer)
                                <tr>
                                    <td>{!! $customer->file_no !!}</td>
                                    <td>{!! $customer->name !!}</td>
                                    <td>{!! $customer->contact !!}</td>
                                    <td>{!! $customer->email !!}</td>
                                    <td>
                                        <a href="{!! url('/customer/') !!}/{!! $customer->id !!}"><i class="fa fa-paper-plane"></i></a>
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
