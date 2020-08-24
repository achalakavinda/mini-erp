@extends('layouts.admin')

@section('main-content-header')
    <!-- main header section -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ config('appStrings.String_Staff_Index') }}</h3>
        </div>
        @include('layouts.components.header-widgets.dashboard-header')
        <div class="box-body">
            <a onclick="showMegaMenu()" href="#" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
            <a href="{!! url('staff') !!}" class="btn btn-menu">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a href="{!! url('staff/create') !!}" class="btn btn-menu">
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
                            <th>#ID</th>
                            <th>Emp No</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Cost</th>
                            <th>Hour Rate</th>
                            <th>Nic</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Employees as $employee)
                            <tr>
                                <td>{!! $employee->id !!}</td>
                                <td>{!! $employee->emp_no !!}</td>
                                <td>{!! $employee->User->name !!}</td>
                                <td>{!! $employee->address !!}</td>
                                <td>{!! $employee->cost  !!}</td>
                                <td>{!! $employee->hr_rates !!}</td>
                                <td>{!! $employee->nic !!}</td>
                                <td>{!! $employee->email !!}</td>
                                <td>
                                    <a href="{!! url('/staff') !!}/{!! $employee->user_id !!}/edit" >Edit <i class="fa fa-edit"></i></a>
                                    <a href="{!! url('/staff/profile') !!}/{!! $employee->user_id !!}" >Profile <i class="fa fa-user"></i></a>
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
