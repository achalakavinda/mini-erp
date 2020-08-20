@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Customers</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-app">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{!! url('customer') !!}" class="btn btn-app">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{!! url('customer/create') !!}" class="btn btn-app">
                <i class="main-action-btn-danger fa fa-plus"></i> New
            </a>
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
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>NIC/Passport No</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>DOB</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($Customers as $customer)
                                <tr>
                                    <td>{!! $customer->name !!}</td>
                                    <td>{!! $customer->contact !!}</td>
                                    <td>{!! $customer->address_1 !!}</td>
                                    <td>NIC:@if($customer->nic)  {{ $customer->nic }}@endif <br/> Pass:  @if($customer->passport)  {{ $customer->passport }}@endif </td>
                                    <td>{!! $customer->email !!}</td>
                                    <td>{!! $customer->dob !!}</td>
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

@section('js')
    @include('layouts.components.dataTableJs.index')
@endsection


