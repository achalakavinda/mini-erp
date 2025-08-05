@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Customers</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{!! url('customer') !!}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{!! url('customer/create') !!}" class="btn btn-menu">
                <i class="main-action-btn-danger fa fa-plus"></i> New
            </a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /main header section -->
@endsection

@section('main-content')
    <!-- main section -->
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
                            <th>Address</th>
                            <th>NIC/Passport No</th>
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
    <!-- /main section -->
@endsection

@section('js')
    @include('layouts.components.dataTableJs.index')
@endsection
